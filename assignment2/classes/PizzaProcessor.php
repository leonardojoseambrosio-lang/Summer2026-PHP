<?php
class PizzaProcessor{
    private $order;

    public function __construct($pdo){
        $this->order = new PizzaOrder($pdo);
    }

    public function processOrder(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'] ??;
            $toppings = implode(", ", $_POST['toppings'] ?? []);
            $crust = $_POST['crust'] ?? '';
            $sauce = $_POST['sauce'] ?? '';

            if($this->order->receiveOrder($name, $toppings, $crust, $sauce)){
                return "Your order has been received!";
            }else{
                return "Error: your order hasn't been processed..."
            }
        }
        return null;
    }
}

?>