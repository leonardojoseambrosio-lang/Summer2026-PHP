<form action="index.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Toppings:</label>
        <input type="checkbox" name="toppings[]" value="Pepperoni">Pepperoni</input>
        <input type="checkbox" name="toppings[]" value="Cheese">Cheese</input>
        <input type="checkbox" name="toppings[]" value="Chiken">Chicken</input>
        <input type="checkbox" name="toppings[]" value="Bacon">Bacon</input>

    <label>Crust:</label>
        <select name="crust">
            <option value="Tradicional">Tradicional</option>
            <option value="Cheddar">Cheddar</option>
            <option value="Cream Cheese">Cream Cheese</option>
        </select>
    </label>

    <label>Sauce:</label>
        <select name="sauce">
            <option value="Tomato Sauce">Tomato Sauce</option>
            <option value="Pesto">Pesto</option>
            <option value="White Sauce">White Sauce</option>
        </select>
    </label>

    <button type="submit">Send Order</button>

</form>