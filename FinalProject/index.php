<?php
    require_once "./classes/config.php";
    require_once "./classes/Database.php";
    require_once "./classes/Products.php";

    $database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    
    //Instantiate productObject to connect to the database
    $productObject = new Products($database);
    
    //shopPage.php variables 
    $products = $productObject->getAllProducts();

    //productPage.php variables
    $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $product = $productObject->getSingleProduct($productId);
    
    //Calling function to create a new product (adminCreateOrDelete.php)
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['action']) && $_POST['action'] === 'create_new_product'){
        $productObject->createProduct($_POST);
        header("Location: index.php?page=adminCreateOrDelete");
        exit;
        }    
    }

    require "./templates/header.php";

       //require different pages (main)
       $page = isset($_GET['page']) ? $_GET['page'] : 'shopPage';
       require $page . ".php";

    require "./templates/footer.php";
?>