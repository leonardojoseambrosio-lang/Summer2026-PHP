<?php
// db_config.php
class BookDatabase {
    private $host = "172.31.22.43";
    private $db   = "Leonardo200657215";
    private $user = "Leonardo200657215";
    private $pass = "NvgfI2bdUg"; 
    private $pdoInstance = null;

    public function __construct($host, $db, $user, $pass){
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;

    }

    

    public function getConnection() {
        if ($this->pdoInstance !== null) {
            return $this->pdoInstance;
        }

        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // LAB TASK #1: Review the fetch mode configuration below. 
            // Does it match how index.php expects to read the data?
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            // LAB TASK #2: There is a critical syntax error on the line below 
            // preventing the PDO instance from initializing. Fix it.
            $this->pdoInstance =new PDO($dsn, $this->user, $this->pass, $options);
            return $this->pdoInstance;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}