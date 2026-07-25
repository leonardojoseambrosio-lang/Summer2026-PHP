<?php 
  /**
   * Database connection Class
   */
  class Database{
    private $host;
    private $dbName;
    private $username;
    private $password;
     // the ?PDO menas it can either hold a real PDO connection object or be null
        private ?PDO $conn = null;

        public function __construct($host, $dbName, $username, $password) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }
        public function connect(){
            if($this->conn !== null){
                return $this->conn;
            }
            try{
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
            }
            catch (PDOException $e){
              throw new Exception("Error to connect the database: " . $e->getMessage());
            }
        }
  }
?>