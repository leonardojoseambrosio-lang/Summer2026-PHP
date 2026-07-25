<?php
    require_once "./classes/config.php";
    require_once "./classes/Database.php";
    require_once "./classes/Products.php";

    $database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    $shopPage = new Products($database);
    $products = $shopPage->getAllProducts();
    
    require "./templates/header.php";
    require "./templates/shopPage.php";
    require "./templates/footer.php";
?>