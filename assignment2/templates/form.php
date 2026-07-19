<main class="order-form">
    <form class="order-form" action="index.php" method="POST">
        
        <div class="input-container">
            <label>Name:</label>
            <input type="text" name="username" required>
        </div>

        <div class="checkbox-container">
            <label>Toppings:</label>
                <div class="container-option">
                    <input type="checkbox" name="toppings[]" value="Pepperoni">Pepperoni</input>
                </div> 
                <div class="container-option"> 
                    <input type="checkbox" name="toppings[]" value="Cheese">Cheese</input>
                </div>
                <div class="container-option">
                    <input type="checkbox" name="toppings[]" value="Chiken">Chicken</input>
                </div>
                <div class="container-option">
                    <input type="checkbox" name="toppings[]" value="Bacon">Bacon</input>
                </div>
        </div>

        <div class="select-container">   
            <label>Crust:</label>
                <select name="crust">
                    <option value="Tradicional">Tradicional</option>
                    <option value="Cheddar">Cheddar</option>
                    <option value="Cream Cheese">Cream Cheese</option>
                </select>
            </label>
        </div>    

        <div class="select-container">  
            <label>Sauce:</label>
                <select name="sauce">
                    <option value="Tomato Sauce">Tomato Sauce</option>
                    <option value="Pesto">Pesto</option>
                    <option value="White Sauce">White Sauce</option>
                </select>
            </label>
        </div>

        <button class="submit-btn" type="submit">Send Order</button>

    </form>

<?php
    if ($checkMessage !== null) {
        if ($checkMessage === true) {
            $lastName = $_POST['username'];
            echo '<div class="order-received">
                    <span>' . htmlspecialchars($lastName) . ', your order has been received!</span>
                  </div>';
        } else {
            echo '<div class="order-error">
                    <span>Error to process the order... try again!</span>
                  </div>';
        }
    }
    ?>
</main>