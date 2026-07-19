<?php
require_once 'classes/Database.php';
require_once 'classes/PizzaOrder.php';
require_once 'classes/PizzaProcessor.php';

$db = new Database();
$pdo = $db->connect();
$processor = new PizzaProcessor($pdo);
$checkMessage = $processor->processOrder();

include 'templates/header.php';
include 'templates/form.php';
include 'templates/footer.php';
?>