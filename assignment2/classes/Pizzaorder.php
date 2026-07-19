<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class PizzaOrder{
    private $database;

    public function __construct($pdo){
        $this->database = $pdo;
    }

    public function receiveOrder($name, $toppings, $crust, $sauce){
        $sql = "INSERT INTO pizza_orders (username, toppings, crust, sauce) VALUES (:username, :toppings, :crust, :sauce)";

        $stmt = $this->database->prepare($sql);

        return $stmt->execute([
            ':username' => $name,
            ':toppings' => $toppings,
            ':crust' => $crust,
            ':sauce' => $sauce
        ]);
    }

}

?>