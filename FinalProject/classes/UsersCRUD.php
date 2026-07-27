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

        // Function to create a new user
        public function createUser($data){
                //check if password and password confirmation are equals
                if(($data['user_password']) === ($data['user_password_confirm'])){
                //password hash
                $password_hash = password_hash($data['user_password'], PASSWORD_DEFAULT);
                }else{
                    throw new Exception("The passwords are not the same.");
                }

            try {
                $conn = $this->db->connect();
                
                $stmt = $conn->prepare("
                    INSERT INTO users_final_project 
                    (user_name, user_email, user_password, permission) 
                    VALUES (:user_name, :user_email, :user_password, :permission)
                ");

                return $stmt->execute([
                    ':user_name'      => $data['user_name'] ?? '',
                    ':user_email' => $data['user_email'] ?? '',
                    ':user_password'  => $password_hash,
                    ':permission'     => $data['permission'] ?? '',
                ]);
            }
            catch(PDOException $error){
                throw new Exception("User creation error: " . $error->getMessage());
            }

        }

        //Function to delete a product
        public function deleteUser($id){
            try{
            $conn = $this->db->connect();
            $stmt = $conn->prepare("DELETE FROM users_final_project WHERE user_id = :id");

            return $stmt->execute([':id' => $id]);
            }
            catch(PDOException $error){
                throw new Exception("Delete user error: " . $error->getMessage());
            }

        }

        // Function to edit user
        public function editUser($data){
            
            // Check if a new password was inputed
            if(!empty($data['user_password'])){

                    $password_hash = password_hash($data['user_password'], PASSWORD_DEFAULT);

                    $sql = "UPDATE users_final_project 
                    SET user_name = :user_name,
                        user_email = :user_email,
                        user_password = :user_password,
                        permission = :permission
                        WHERE user_id = :user_id";

                $parameters =  [':user_id' => $data['user_id'] ?? 0,
                                ':user_name' => $data['user_name'] ?? '',
                                ':user_email' => $data['user_email'] ?? '',
                                ':user_password' => $password_hash,
                                ':permission' => $data['permission'] ?? ''
                                ];

                }else{
                    $sql = "UPDATE users_final_project 
                    SET user_name = :user_name,
                        user_email = :user_email,
                        permission = :permission
                        WHERE user_id = :user_id";

                $parameters =  [':user_id' => $data['user_id'] ?? 0,
                                ':user_name' => $data['user_name'] ?? '',
                                ':user_email' => $data['user_email'] ?? '',
                                ':permission' => $data['permission'] ?? ''
                                ];
                }


            try {                
                
                $conn = $this->db->connect();
                $stmt = $conn->prepare($sql);
                
                return $stmt->execute($parameters);
            }
            catch(PDOException $error){
                throw new Exception("User edit error: " . $error->getMessage());
            }

        }
    }
?>