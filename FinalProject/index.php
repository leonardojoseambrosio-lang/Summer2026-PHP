<?php
//SESSION start
session_start();

// FORÇAR O PHP A FALAR O ERRO NA TELA:
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


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
        if(isset($_POST['create_new']) && $_POST['create_new'] === 'create_new_product'){
        $productObject->createProduct($_POST);
        header("Location: index.php?page=adminCreateOrDeleteProduct");
        exit;
        }    
    }

    //Calling function to delete product (adminCreateOrDelete.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['delete_product'])){
        $productId = $_POST['delete_product'];
        $productObject->deleteProduct($productId);
        header("Location: index.php?page=adminCreateOrDeleteProduct");
        exit;
        }    
    }

    //Calling function to edit product (adminEditProduct.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['edit_product'])){
        $productObject->editProduct($_POST);
        header("Location: index.php?page=adminCreateOrDeleteProduct");
        exit;
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
    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create_new_user'])){
            try{
                $usersObject->createUser($_POST);
                $successMessage = "User created successfully!";
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