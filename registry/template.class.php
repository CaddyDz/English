<?php
    /**
     * Template management
     * @author Salim Djerbouh
     * @version 0.1
     */
    class template {
      /**
       * Include our page class, and build a page object to manage the content and structure of the page
       * @param Object our registry object
       */
       public function __construct(Registry $registry)
       {
         $this->registry = $registry;
         include(FRAMEWORK_PATH . '/registry/page.class.php');
         $this->page = new Page($this->registry);
       }
      /**
       * Set the content of the page based on a number of templates
       * pass template file locations as individual arguments
       * @return void
       */
       public function buildFromTemplate()
       {
         $bits = func_get_args();
         $content = "";
         foreach ($bits as $bit) {
           if (strpos($bit, 'views/') === false) {
             $bit = 'views/' . $this->registry->getSetting('view') . '/templates/' . $bit;
           }
           if (file_exists($bit) == true) {
             $content .= file_get_contents($bit);
           }
         }
         $this->page->setContent($content);
       }
      /**
       * Add a template bit from a view to our page
       * @param String $tag the tag where we insert the template e.g.{hello}
       * @param String $bit the template bit (path to file, or just the filename)
       * @return void
       */
       public function addTemplateBit($tag, $bit)
       {
         if (strpos($bit, 'views/') === false) {
           $bit = 'views/' . $this->registry->getSetting('view') . '/templates/' . $bit;
         }
         $this->page->addTemplateBit($tag, $bit);
       }
      /**
       * Take the template bits from the view and insert them into our page content
       * Updates the pages content
       * @return void
       */
       private function repkaceBits()
       {
         $bits = $this->page->getBits();
         // loop through template bits
         foreach ($bits as $tag => $template) {
           $templateContent = file_get_contents($template);
           $newContent = str_replace('{' . $tag . '}', $templateContent, $this->page->getContent());
           $this->page->setContent($newContent);
         }
       }
      /**
       * Replace tags in our page with content
       * @return void
       */
      private function replaceTags($pp = false)
      {
        // get the tags in the page
        if ($pp == false) {
          $tags = $this->page->getTags();
        } else {
          $tags = $this->page->getPPTags();
        }
        // go through them all
        foreach ($tags as $tag => $data) {
          //if the tag is an array, then we need to do more than a simple find and replace!
          if (is_array($data)) {
            if($data[0] == 'SQL'){
              // it is a cached query...replace tags from the database
              $this->replaceDBTags($tag, $data[1]);
            } elseif ($data[0] == 'DATA') {
              // it is some cached data...replace tags from cached data
              $this->replaceDataTags($tag, $data[1]);
            }
          }
          else {
            // replace the content
            $newContent = str_replace('{' . $tag . '}', $data, $this->page->getContent());
            // update the pages content
            $this->page->setContent($newContent);
          }
        }
      }
     /**
      * Replace content on the page with data from the database
      * @param String $tag the tag defining the area of content
      * @param int $cachedId the queries ID in the query cache
      * @return void
      */
      private function replaceDBTags($tag, $cachedId)
      {
        $block = '';
        $blockOld = $this->page->getBlock($tag);
        $apd = $this->page->getAdditionalParsingData();
        $apdkeys = array_keys($apd);
        // foreach record relating to the query..
        while ($tags = $this->registry->getObject('db')->resultsFromCache($cachedId)) {
              $blockNew = $blockOld;
              // Do we have APD tags?
              if (in_array($tag, $apdkeys)) {
                // Yes we do!
                foreach ($tags as $ntag => $data) {
                  $blockNew = str_replace("{" . $ntag . "}", $data, $blockNew);
                  // Is this tag the one with extra parsing to be done?
                  if (array_key_exists($ntag, $apd[$tag])) {
                    // Yes it is
                    $extra = $apd [$tag][$ntag];
                    // Does the tag equal the condition?
                    if ($data == $extra['condition']) {
                      // Yep! Replace the extratag with the data
                      $blockNew = str_replace("{" . $extra['tag'] . "}", '', $blockNew);
                    }
                  }
                }
              }
              else {
                // Create a new block of content with the results replaced into it
                foreach ($tags as $ntag => $data) {
                  $blockNew = str_replace("{" . $ntag . "}", $data, $blockNew);
                }
              }
              $block .= $blockNew;
        }
        $pageContent = $this->page->getContent();
        // remove the separator in the template, cleaner HTML
        $newContent = str_replace('<!-- START ' . $tag . ' -->' . $blockOld . '<!-- END ' . $tag . ' -->', $block, $pageContent);
        // update the page content
        $this->page->setContent($newContent);
      }
     /**
      * Replace content on the page with data from the cache
      * @param String $tag the tag defining the area of content
      * @param int $cacheId the datas ID in the data cache
      * @return void
      */
      private function replaceDataTags($tag, $cacheId)
      {
        $blockOld = $this->page->getBlock($tag);
        $block = '';
        $tags = $this->registry->getObject('db')->dataFromCache($cacheId);
        foreach ($tags as $key => $tagsdata) {
          $blockNew = $blockOld;
          foreach ($tagsdata as $taga => $data) {
            $blockNew = str_replace("{" . $taga . "}", $data, $blockNew);
          }
          $block .= $blockNew;
        }

        $pageContent = $this->page->getContent();
        $newContent = str_replace('<!-- START '.$tag.' -->'.$blockOld.'<!-- END '.$tag.' -->', $block, $pageContent);
        $this->page->setContent($newContent);
      }
     /**
      * Convert an array of data into some tags
      * @param array the data
      * @param string a prefix which is added to field name to create the tag name
      * @return void
      */
      public function dataToTags($data, $prefix)
      {
        foreach ($data as $key => $content) {
          $this->page->addTag($prefix, $key, $content);
        }
      }
     /**
      * Take the title we set in the page object, and insert them into the view
      */
      public function parseTitle()
      {
        $newContent = str_replace('<title>', '<title>' . $this->page->getTitle(), $this->page->getContent());
        $this->page->setContent($newContent);
      }
     /**
      * Parse the page object into some output
      * @return void
      */
      public function parseOutput()
      {
        $this->replaceBits();
        $this->replaceTags(false);
        $this->replaceBits();
        $this->replaceTags(true);
        $this->parseTitle();
      }
    }
 ?>
