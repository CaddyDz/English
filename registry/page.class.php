<?php
  /**
   * Page object
   * @author Salim Djerbouh
   * @version 0.1
   */
  class page
  {
    // page title
    private $title = '';
    // template tags
    private $tags = array();
    // tags which should be processed after the page has been parsed
    // reason: what if there are teplate tags within the database content, we must parse the page, then parse it again for post parse tags
    private $postParseTags = array();
    // template bits
    private $bits = array();
    // the page content
    private $content = "";
    private $apd = array();
    /**
     * Create our page object
     */
     function __construct(Registry $registry)
     {
       $this->registry = $registry;
     }

     /**
      * Get the page title from the page
      * @return String
      */
      public function getTitle()
      {
        return $this->title;
      }
      /**
       * Set the page title
       * @param String $title the page title
       * @return void
       */
       public function setTitle($title)
       {
         $this->title = $title;
       }
       /**
        * Set the page content
        * @param String $content the page content
        * @return void
        */
        public function setContent($content)
        {
          $this->content = $content;
        }
       /**
        * Add a template tag, and its replacement value/data to the page
        * @param String $key the key to store within the tags array
        * @param String $data the replacement data (may also be an array)
        * @return void
        */
        public function addTag($key, $data)
        {
          $this->tags[$key] = $data;
        }
        public function removeTag($key)
        {
          unset($this->tags[$key]);
        }
        /**
         * Get tags associated with the page
         * @return void
         */
         public function getTags()
         {
           return $this->tags;
         }
         /**
          * Add post parse tags: as per adding tags
          * @param String $key the key to store within the array
          * @param String $data the replacement data
          * @return void
          */
          public function addPPTag($key, $data)
          {
            $this->postParseTags[$key] = $data;
          }
          /**
           * Get tags to be parsed after the first batch have been parsed
           * @return array
           */
           public function getPPTags()
           {
             return $this->postParseTags;
           }
           /**
            * Add a template bit to the page, doesn't actually add the content just yet
            * @param String the tag where the template is added
            * @param String the template file name
            * @return void
            */
            public function addTemplateBit($tag, $bit)
            {
              $this->bits[$tag] = $bit;
            }
            /**
             * Adds additional parsing data
             * A.P.D is used in parsing loops. we may want to have an extra biti of data depending on iterations value
             * for example on a form list, we may want a specific item to be "selected"
             * @param String block the condition applies to
             * @param String tag within the block the condition applied to
             * @param String condition : what the tag must equal
             * @param String extratag : if the tag value = condition then we have an extra tag called extratag
             * @param String data : if the tag value = condition then extra tag is replaced with this value
             */
            public function addAdditionalParsingData($block, $tag, $condition, $extratag, $data)
            {
              $this->apd[$block] = array($tag => array('condition' => $condition, 'tag' => $extratag, 'data' => $data));
            }
            /**
             * Get the template bits to be entered into the page
             * @return array the array of template tags and template file names
             */
             public function getBits()
             {
               return $this->bits;
             }
             public function getAdditionalParsingData()
             {
               return $this->apd;
             }
             /**
              * Gets a chunck of page content
              * @param String the tag wrapping the block (<!-- START tag --> block <!-- END tag -->)
              * @return String the block of content
              */
              public function getBlock($tag)
              {
                // echo $tag;
                // TODO: fix regex
                preg_match('#<!-- START ' . $tag . ' -->(.+?)<!-- END ' . $tag . ' -->', $this->content, $tor);
                $tor = str_replace('<!-- START ' . $tag . ' -->',  $tor[0]);
                $tor = str_replace('<!-- END ' . $tag . ' -->', $tor[0]);
                return $tor;
              }
              public function getContent()
              {
                return $this->content;
              }

              public function getContentToPrint()
              {
                $this->content = preg_replace('#{form_(.+?)}#si', '', $this->content);
                $this->content = preg_replace('#{nbd_(.+?)#si}', '', $this->content);
                $this->content = str_replace('</body>', '<!-- Generated by our Fantastic Social Network --></body>', $this->content);
                return $this->content;
              }
              /**
               * Set the URL path
               * @param String the url path
               */
              public function setURLPath($path)
              {
                $this->urlPath = $path;
              }
              /**
               * Gets data from the current URL
               * @return void
               */
              public function getURLData()
              {
                $urldata = (isset($_GET['page'])) ? $_GET['page'] : '';
                $this->urlPath = $urldata;
                if ($urldata == '') {
                  $this->urlBits[] = '';
                  $this->urlPath = '';
                } else {
                  $data = explode('/', $urldata);
                  while (!empty($data) && strlen(reset($data)) === 0) {
                    array_shift($data);
                  } while (!empty($data) && strlen(end($data)) === 0) {
                    array_pop($data);
                  }
                  $this->urlBits = $this->array_trim($data);
                }
              }
              public function getURLBits()
              {
                return $this->urlBits;
              }
              public function getURLBit($whichBit)
              {
                return (isset($this->urlBits[$whichBit])) ? $this->urlBits[$whichBit] : 0 ;
              }
              public function getURLPath()
              {
                return $this->urlPath;
              }
              public function buildURL($bits, $qs, $admin)
              {
                $admin = ($admin == 1) ? $this->registry->getSetting('admin_folder') . '/' : '';
                $the_rest = '';
                foreach ($bits as $bit) {
                  $the_rest .= $bit . '/';
                }
                $the_rest = ($qs != '') ? $the_rest . '?&' . $qs : $the_rest;
                return $this->registry->getSetting('siteurl') . $admin . $the_rest;
              }
              
  }

 ?>
