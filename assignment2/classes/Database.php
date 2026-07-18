<?php
    class Database{
        private string $host = '172.31.22.43';
        private string $db_name = 'Leonardo200657215';
        private string $username = 'Leonardo200657215';
        private string $password = 'NvgfI2bdUg';

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