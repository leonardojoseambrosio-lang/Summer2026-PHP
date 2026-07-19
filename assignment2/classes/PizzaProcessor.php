<?php
class PizzaProcessor{
    private $order;

    public function __construct($pdo){
        $this->order = new PizzaOrder($pdo);
    }

    public function processOrder(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['username'] ?? '';
            $toppings = implode(", ", $_POST['toppings'] ?? []);
            $crust = $_POST['crust'] ?? '';
            $sauce = $_POST['sauce'] ?? '';

            return $this->order->receiveOrder($name, $toppings, $crust, $sauce);
        }
        return null;
    }
}

?>