<?php
    require_once "./classes/config.php";
    require_once "./classes/Database.php";
    require_once "./classes/Products.php";

    $database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
       
    //shopPage.php variables 
    $productObject = new Products($database);
    $products = $productObject->getAllProducts();

    //productPage.php variables
    $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $product = $productObject->getSingleProduct($productId);
    


    require "./templates/header.php";

       //require different pages (main)
       $page = isset($_GET['page']) ? $_GET['page'] : 'shopPage';
       require $page . ".php";

    require "./templates/footer.php";
?>