<?php
  /**
   * English Dz Social Network
   * @author Salim Djerbouh
   * Registry Class
   */
  class Registry {
    /**
    * Array of objects
    */
    private $objects;
    /**
    * Array of settings
    */
    private $settings;
    public function __construct(Registry $registry, $id=0,  $username='',$password='') {
      $this->registry = $registry;
      if ($id=0 && $username != '' && $password != '') {
        $user = $this->registry->getObject('db')->sanitizeData($username);
        $hash = md5($password);
        $sql = "SELECT * FROM users WHERE username='{$user}' AND password_hash='{$hash}' AND deleted=0";
        $this->registry->getObject('db')->executeQuery($sql);
        if ($this->registry->getObject('db')->numRows() == 1) {
          $data = $this->registry->getObject('db')->getRows();
          $this->id = $data['ID'];
          $this->username = $data['username'];
          $this->active = $data['active'];
          $this->banned = $data['banned'];
          $this->admin = $data['admin'];
          $this->email = $data['email'];
          $this->pwd_reset_key = $data['pwd_reset_key'];
          $this->valid = true;
        }
      }
      elseif ($id > 0) {
        $id = intval($id);
        $sql = "SELECT * FROM users WHERE ID='{$id}' AND deleted=0";
        $this->registry->getObject('db')->executeQuery($sql);
        if ($this->registry->getObject('db')->numRows() == 1) {
          $data = $this->registry->getObject('db')->getRows();
          $this->id = $data['ID'];
          $this->username = $data['username'];
          $this->active = $data['active'];
          $this->banned = $data['banned'];
          $this->admin = $data['admin'];
          $this->email = $data['email'];
          $this->pwd_reset_key = $data['pwd_reset_key'];
          $this->valid = true;
        }
      }
    }
    public function checkForAuthebtication()
    {
      $this->registry->getObject('template')->getPage()->addTag('error', '');
      if (isset($_SESSION['sn_auth_session_uid']) && intval($_SESSION['sn_auth_session_uid']) > 0) {
        $this->sessionAuthentication(intval($_SESSION['sn_auth_sn_auth_session_uid']));
        if ($this->loggedIn == true) {
          $this->registry->getObject('template')->getPage()->addTag('error', '');
        }
        else {
          $this->registry->getObject('template')->getPage()->addTag('error', '<strong><p>Error: Your username or password was not correct, please try again</p><strong>');
        }
      }
      elseif (isset($_POST['sn_auth_user']) && $_POST['sn_auth_user'] != '' && isset($_POST['sn_auth_pass']) && $_POST['sn_auth_pass'] != '') {
        $this->postAuthenticate($_POST['sn_auth_user'], $_POST['sn_auth_pass']);
        if ($this->loggedIn == true) {
          $this->registry->getObject('template')->getPage()->addTag('error', '');
        }
        else {
          $this->registry->getObject('template')->getPage()->addTag('error', '<p><strong>Error: Your username or password was not correct, please try again<strong></p>');
        }
      }
      elseif (isset($_POST['login'])) {
        $this->registry->getObject('template')->getPage()->addTag('error', '<strong><p>Error: You must enter a username and a password</p><strong>');
      }
    }
     /**
      * Create a new object and store it in the registry
      * @param String $object the object file prefix
      * @param String $key pair for the object
      * @return void
      */
      public function createAndStoreObject($object, $key) {
        require_once($object . '.class.php');
        $this->$objects[$key] = new $object($this);
      }
       /**
        * Store Setting
        * @param String $setting the setting data
        * @param String $key the key pair for the settings array
        * @return void
        */
        public function storeSetting($setting, $key) {
          $this->settings[$key] = $setting;
        }
       /**
        * Get a setting from the registries store
        * @param String $key the settings array key
        * @return String the setting data
        */
        public function getSetting($key) {
          return $this->settings[$key];
        }
        /**
        * Get an object from the registries store
        * @param String $key the objects array key
        * @return Object
        */
        public function getObject($key) {
          return $this->objects[$key];
        }
    }
    session_start();
    DEFINE("FRAMEWORK_PATH", dirname(__FILE__) . "/");
    require('registry/registry.class.php');
    $registry = new Registry();
    // setup our core registry objects
    $registry->createAndStoreObject('template', 'template');
    $registry->createAndStoreObject('mysqldb', 'db');
    // $registry->createAndStoreObject('authenticate', 'authenticate');
    $registry->createAndStoreObject('urlprocessor', 'url');
    // database settings
    include(FRAMEWORK_PATH . 'config.php');
    // create a database connection
    $registry->getObject('db')->newConnection($configs['db_host_sn'], $configs['db_user_sn'], $configs['db_pass_sn'], $configs['db_name_sn']);
    // store settings in our registry
    $settingsSQL = "SELECT `key`, `value` FROM settings";
    $registry->getObject('db')->executeQuery($settingsSQL);
    while ($setting = $registry->getObject('db')->getRows()) {
      $registry->storeSetting($setting['value'], $setting['key']);
    }
    // process authentication
    // coming in stage 3
    /**
     * Once we have some template files, we can build a default template
     * $registry->getObject('template')->buildFromTemplates('header.tpl.php', 'main.tpl.php', 'footer.tpl.php');
     * $registry->getObject('template')->parseOutput();
     * print $registry->getObject('template')->getPage()->getContentToPrint();
     */

 ?>
