<?php
//SESSION start
session_start();

// Restric user access restric pages through URL
$page = $_GET['page'] ?? 'home';
//Restrict pages
$restricPages = ['adminCreateOrDeleteProduct', 'createOrDeleteUsers'];

// Checking permission
if (in_array($page, $restricPages)) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit;
    }
}

// Edit pages - only Admin can access
$restricPagesAdmin = ['adminEditProduct', 'editUser'];

// Checking permission
if (in_array($page, $restricPagesAdmin)) {
    if (!isset($_SESSION['user_id']) || $_SESSION['permission'] !== 'admin') {
        header("Location: index.php?page=home");
        exit;
    }
}


//Seccess or Error Messages
$errorMessage = "";
$successMessage = "";

    require_once "./classes/config.php";
    require_once "./classes/Database.php";
    require_once "./classes/Products.php";
    require_once "./classes/UsersCRUD.php";

    //Instantiate Database
    $database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    
    // ### PRODUCTS ###

    //Instantiate productObject to connect to the database
    $productObject = new Products($database);
        
    //Calling function to create a new product (adminCreateOrDeleteProduct.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create_new_product'])){
            try{
                $productObject->createProduct($_POST);
                $successMessage = "Product created successfully!";
                unset($_POST);
            }
            catch (Exception $error){
                $errorMessage = $error->getMessage();
            }
        }    
    }

    //Calling function to delete product (adminCreateOrDelete.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['delete_product'])){
        $productId = $_POST['delete_product'];
        $productObject->deleteProduct($productId);
        }    
    }

    //Calling function to edit product (adminEditProduct.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['edit_product'])){
            try{
                $productObject->editProduct($_POST);
                $successMessage = "Product updated successfully!";
            }
            catch (Exception $error){
                $errorMessage = $error->getMessage();
            }
        }    
    }

    //Get all products in the list (shopPage.php, adminCreateOrDeleteProduct.php)
    $products = $productObject->getAllProducts();

    //Get a single product using id as reference (productPage.php, adminEditProduct.php)
    $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $product = $productObject->getSingleProduct($productId);


    // ### USERS ###

    //Instantiate UsersCRUD to connect to the database
    $usersObject = new UsersCRUD($database);

    //Calling function to create a new user (createOrDeleteUsers.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create_new_user'])){
            try{
                $usersObject->createUser($_POST);
                $successMessage = "User created successfully!";
                unset($_POST);
            }
            catch (Exception $error){
                $errorMessage = $error->getMessage();
            }
        }    
    }

    //Calling function to delete user (createOrDeleteUsers.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['delete_user'])){
        $userId = $_POST['delete_user'];
        $usersObject->deleteUser($userId);
        }    
    }

    //Calling function to edit user (editUser.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['edit_user'])){
            try{
                $usersObject->editUser($_POST);
                $successMessage = "User updated successfully!";
            }
            catch (Exception $error){
                $errorMessage = $error->getMessage();
            }
        }    
    }

    //Get all users in the list (createOrDeleteUsers.php)
    $users = $usersObject->getAllUsers();

    //Get a single user using id as reference (editUser.php)
    $userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $user = $usersObject->getSingleUser($userId);
    

    // ### LOGIN/REGISTER

    //Calling function to register a new user (the same function to create a new user) (register.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['register_user'])){
            try{
                $usersObject->createUser($_POST);
                $successMessage = "User registered successfully!";

                header("Location: index.php?page=login&success=created");
                exit;
            }
            catch (Exception $error){
                $errorMessage = $error->getMessage();
            }
        }    
    }

    //Calling function login to create a SESSION
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['login'])){
            try{
                $usersObject->login($_POST);
                header("Location: index.php?page=home");

            }
            catch(Exception $e){
                $errorMessage = $e->getMEssage();
            }
        }
    }

    //Calling logout function
    if($_GET['page'] === 'logout'){
        $usersObject->logout();
        header("Location: index.php?page=home");
        exit;
    }

    // ### Templates ###
    require "./templates/header.php";

       //require different pages (main)
       $page = isset($_GET['page']) ? $_GET['page'] : 'home';
       require $page . ".php";

    require "./templates/footer.php";
?>