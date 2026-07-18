<?php
    class Database{
        private string $host = '';
        private string $db_name = '';
        private string $username = '';
        private string $password = '';

        // the ?PDO menas it can either hold a real PDO connection object or be null
        private ?PDO $conn = null;
        public function connect(){
            if($this->conn !== null){
                return $this->conn;
            }
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
    }

?>
