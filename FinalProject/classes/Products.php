<?php
    class Products{
        private $db;

        public function __construct(Database $db){
            $this->db = $db;
        }

        public function getAllProducts(): array{

            try{
                $conn = $this->db->connect();
                $stmt = $conn->prepare("SELECT product_id, product_name, short_description, full_description, product_price, product_image FROM product_final_project");
                $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $error){
                throw new Exception("Product error: " . $error->getMessage());
            }

        }
    }
?>