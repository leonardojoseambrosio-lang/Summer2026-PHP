CREATE TABLE IF NOT EXISTS pizza_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    toppings VARCHAR(255) NOT NULL,
    crust VARCHAR(255) NOT NULL,
    sauce VARCHAR(255) NOT NULL
);

SELECT * FROM pizza_orders;