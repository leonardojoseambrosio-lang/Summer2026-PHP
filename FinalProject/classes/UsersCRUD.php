<?php
    class UsersCRUD{
        private $db;

        public function __construct(Database $db){
            $this->db = $db;
        }
        // Function to get all users
        public function getAllUsers(): array{

            try{
                $conn = $this->db->connect();
                $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password, permission, created FROM users_final_project");
                $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $error){
                throw new Exception("Users error: " . $error->getMessage());
            }

        }

        //Function to get a single user
        public function getSingleUser($user_id){
             try{
                $conn = $this->db->connect();
                $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password, permission, created FROM users_final_project WHERE user_id = :user_id");
                $stmt->execute([':user_id' => $user_id]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);

                return $result ? $result : null;
            }
            catch(PDOException $error){
                throw new Exception("Users error: " . $error->getMessage());
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

        //Function to delete a product
        public function deleteProduct($id){
            try{
            $conn = $this->db->connect();
            $stmt = $conn->prepare("DELETE FROM product_final_project WHERE product_id = :id");

            return $stmt->execute([':id' => $id]);
            }
            catch(PDOException $error){
                throw new Exception("Delete product error: " . $error->getMessage());
            }

        }

         // Function to edit product
        public function editProduct($data){
            try {
                $conn = $this->db->connect();
                
                $stmt = $conn->prepare("
                    UPDATE product_final_project 
                    SET product_name = :product_name,
                        short_description = :short_description,
                        full_description = :full_description,
                        product_price = :product_price,
                        product_image = :product_image,
                        quantity_in_stock = quantity_in_stock + :add_stock

                        WHERE product_id = :product_id;

                ");
                
                return $stmt->execute([
                    ':product_id'        => $data['product_id'] ?? 0,
                    ':product_name'      => $data['product_name'] ?? '',
                    ':short_description' => $data['short_description'] ?? '',
                    ':full_description'  => $data['full_description'] ?? '',
                    ':product_price'     => $data['product_price'] ?? 0,
                    ':product_image'     => $data['product_image'] ?? './assets/',
                    ':add_stock'         => $data['add_stock'] ?? 0
                ]);
            }
            catch(PDOException $error){
                throw new Exception("Product edit error: " . $error->getMessage());
            }

        }
    }
?>