<?php
    class Products{
        private $db;

        public function __construct(Database $db){
            $this->db = $db;
        }
        // Function to get all products
        public function getAllProducts(): array{

            try{
                $conn = $this->db->connect();
                $stmt = $conn->prepare("SELECT product_id, product_name, short_description, full_description, product_price, product_image, quantity_in_stock FROM product_final_project");
                $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $error){
                throw new Exception("Product error: " . $error->getMessage());
            }

        }

        //Function to get a single product
        public function getSingleProduct($product_id){
             try{
                $conn = $this->db->connect();
                $stmt = $conn->prepare("SELECT product_id, product_name, short_description, full_description, product_price, product_image, qunatity_in_stock FROM product_final_project WHERE product_id = :product_id");
                $stmt->execute([':product_id' => $product_id]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);

                return $result ? $result : null;
            }
            catch(PDOException $error){
                throw new Exception("Product error: " . $error->getMessage());
            }

        }

        // Function to create a new product
        public function createProduct($data){
            try {
                $conn = $this->db->connect();
                
                $stmt = $conn->prepare("
                    INSERT INTO product_final_project 
                    (product_name, short_description, full_description, product_price, product_image, quantity_in_stock) 
                    VALUES (:product_name, :short_description, :full_description, :product_price, :product_image, :quantity_in_stock)
                ");

                return $stmt->execute([
                    ':product_name'      => $data['product_name'] ?? '',
                    ':short_description' => $data['short_description'] ?? '',
                    ':full_description'  => $data['full_description'] ?? '',
                    ':product_price'     => $data['product_price'] ?? 0,
                    ':product_image'     => $data['product_image'] ?? './assets/',
                    ':quantity_in_stock' => $data['quantity_in_stock'] ?? 0
                ]);
            }
            catch(PDOException $error){
                throw new Exception("Product creation error: " . $error->getMessage());
            }

        }
    }
?>