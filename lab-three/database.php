<?php 
    class database{
        // replace values with the information you received in the email
        private $host = "172.31.22.43"
        private $username = "Leonardo200657215";
        private $password = "NvgfI2bdUg";
        private $database = "Leonardo200657215";

        /**
         * Constructor Method
         */

        public function _construct(){
            if(!isset($this->connection)){
                $this->connection = new mysqli($this->host, $this->username, $this->password,$this->database);
                if(!$this->connection){
                    echo '<p>Could not connect to the database</p>';
                    exit;
                }
            }
            return $this->connection;
        }
    }
?>