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
                $stmt = $conn->prepare("SELECT product_id, product_name, short_description, full_description, product_price, product_image, quantity_in_stock FROM product_final_project WHERE product_id = :product_id");
                $stmt->execute([':product_id' => $product_id]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);

                return $result ? $result : null;
            }
            catch(PDOException $error){
                throw new Exception("Product error: " . $error->getMessage());
            }

        }

         private function validateData($data){
            
            $conn = $this->db->connect();
            
            $productId = $data['product_id'] ?? 0; //to edit assign the product_id if it is a creation, the id is 0
            
            //connect to the database to validade if there is a product with the same name
            $stmt = $conn->prepare("SELECT product_name FROM product_final_project WHERE product_name = :product_name AND product_id != :product_id");
            $stmt->execute([':product_name' => $data['product_name'] , ':product_id' => $productId]);
            
            if ($stmt->fetch()) {
                throw new Exception("This product name is already registered: " . $data['product_name']);
                }

            //check if price and stock are numbers
            $productPrice = $data['product_price'] ?? 0;
            if(!is_numeric($productPrice)){
                throw new Exception("Incorrect value to price (must be a number).");
            }

            $productStock = $data['quantity_in_stock'] ?? ($data['add_stock'] ?? 0);
            if(filter_var($productStock, FILTER_VALIDATE_INT) === false){
                throw new Exception("Incorrect value to stock (must be integer).");
            }

                return true;
            }
                


        // Function to create a new product
        public function createProduct($data){

            //if the $data is valid, creates the product
            $this->validateData($data); 

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

            //if the $data is valid, edit the product
            $this->validateData($data); 

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