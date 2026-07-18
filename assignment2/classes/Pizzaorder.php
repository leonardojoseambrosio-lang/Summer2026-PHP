<?php

class PizzaOrder{
    private $database;

    public function __construct($pdo){
        $this->database = $pdo;
    }

    public function receiveOrder($name, $toppings, $crust, $sauce){
        $sql = "INSERT INTO pizza_orders (name, toppings, crust, sauce) VALUES (:name, :toppings, :crust, :sauce)";

        $stmt = $this->database->prepare($sql);

        return $stmt->execute([
            ':name' => $name,
            ':toppings' => $toppings,
            ':crust' => $crust,
            ':sauce' => $sauce
        ]);
    }

}

?>