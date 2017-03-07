<?php
   /**
    * Database management / access class: basic abstraction
    *
    * @author Salim Djerbouh
    * @version 0.1
    */
    class Mysqldb {
    /**
    * Allows multiple database connections
    * each connection is stored as an element in the array, and the active connection is maintained in a variable (see below)
    */
    private $connections = array();
    /**
    * Tells the DB object which connection to use
    * setActiveConnection($id) allows us to change this
    */
    private $activeConnection = 0;
    /**
    * Queries which have been executed and the results cached for later, primarily for use within the template engine
    */
    private $queryCache = array();
    /**
    * Data which has been prepared and then cached for later usage, primarily within the template engine
    */
    private $dataCache = array();
    /**
    * Number of queries made during execution process
    */
    private $queryCounter = 0;
    /**
    * Record of the last query
    */
    private $last;
    /**
    * Reference to the registry object
    */
    private $registry;
    /**
    * Construct our database object
    */
    public function __construct(Registry $registry) {
      $this->registry = $registry;
    }
     /**
      * Create a new database connection
      * @param String database hostname
      * @param String database username
      * @param String database password
      * @param String database we are using
      * @return int the id of the new connection
      */
    public function newConnection($host, $user, $password, $database){
      $this->connections[] = new mysqli($host, $user, $password, $database);
      $connection_id = count($this->connections) - 1;
      if (mysqli_connect_errno()) {
        trigger_error('Error connecting to host. ' .$this->connections[$connection_id]->error, E_USER_ERROR);
      }
      return $connection_id;
    }
    /**
     * Change which database connection is actively used for the next operation
     * @param int the new connection id
     * @return void
     */
    public function setActiveConnection(int $new) {
      $this->activeConnection = $new;
    }
    /**
     * Execute a query string
     * @param String the query
     * @return void
     */
    public function executeQuery($queryStr){
      if (!$result = $this->connections[$this->activeConnection]->query($queryStr)) {
        trigger_error('Error executing query: ' . $queryStr . ' - '.$this->connections[$this->activeConnection]->error, E_USER_ERROR);
      } else {
        $this->last = $result;
      }
    }
    /**
     * Get the rows from the most recently executed query, excluding cached queries
     * @return array
     */
    public function getRows(){
      return $this->last->fetch_array(MYSQLI_ASSOC);
    }
    public function numRows()
    {
      return $this->last->num_rows;
    }
   /**
    * Gets the number of affected rows from the previous query
    * @return int the number of affected rows
    */
    public function affectedRows()
    {
      return $this->last->affected_rows;
    }
   /**
    * Delete records from the database
    * @param String the table to remove rows from
    * @param String the condition for which rows are to be removed
    * @param int the number of rows to be removed
    * @return void
    */
    public function deleteRecords($table, $condition, $limit)
    {
      $limit = ($limit == '') ? '' : ' LIMIT ' . $limit;
      $delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
      $this->executeQuery($delete);
    }
   /**
    * Update records in the database
    * @param String the table
    * @param array of changes field => value
    * @param String the condition
    * @return bool
    */
    public function updateRecords($table, $changes, $condition)
    {
      $update = "UPDATE " . $table . " SET ";
      foreach ($changes as $field => $value) {
        $update .= "`" . $field . "`='{$value}',";
      }

      // remove our trailing ,
      $update = substr($update, 0, -1);
      if ($condition != '') {
        $update .= "WHERE " . $condition;
      }
      $this->executeQuery($update);

      return true;
    }
   /**
    * Insert records into the database
    * @param String the database table
    * @param array data to insert field => value
    * @return bool
    */
    public function insertRecords($table, $data)
    {
      // setup some variables for fields and values
      $fields = "";
      $values = "";

      // populate them
      foreach ($data as $f => $v) {
        $fields .= "`$f`,";
        $values .= (is_numeric($v) && (intval($v) == $v)) ? $v."," : "'$v',";
      }

      // remove our trailing ,
      $fields = substr($fields, 0, -1);
      // remove our trailing ,
      $values = substr($values, 0, -1);

      $insert = "INSERT INTO $table ({$fields}) VALUES({values})";
      // echo $insert;
      $this->executeQuery($Insert);
      return true;
    }

   /**
    * Sanitize data
    * @param String the data to be sanitized
    * @return String the sanitized data
    */
    public function sanitizeData($value)
    {
      // Stripslashes
      if (get_magic_quotes_gpc()) {
        $value = stripslashes($value);
      }

      // Quote value
      if (version_compare(phpversion(), "4.3.0") == "-1") {
        $value = $this->connections[$this->activeConnection] ->escape_string($value);
      } else {
        $value = $this->connections[$this->activeConnection]->real_escape_string($value);
      }
      return $value;
    }
   /**
    * Deconstruct the object
    * close all of the database connections
    */
    public function __deconstruct()
    {
      foreach ($this->connections as $connections) {
        $connection->close();
      }
    }
}
?>
