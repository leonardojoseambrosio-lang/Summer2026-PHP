        <!-- Create/Delete-->
       <!--Title-->
    <h1 class="title-general">Create/Delete</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to crete/delete products
            </p>
        </article>
        <!--Contact form-->
        <form class="contact-form"  action="index.php" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Add a New Game</h2>
                <label for="product_name">Title: </label>
                <input type="text" id="product_name" name="product_name" required>
                
                <label for="short_description">Short Description: </label>
                <input type="text" id="short_description" name="short_description" required>

                <label for="full_description">Full Description: </label>
                <textarea id="full_description" name="full_description" required></textarea>

                <label for="product_image">Select an image: </label>
                <input type="text" id="product_image" name="product_image" value="./assets/" required>

                <label for="product_price">Price (U$): </label>
                <input type="text" id="product_price" name="product_price" required>


                <label for="quantity_in_stock">Quantity in stock: </label>
                <input type="text" id="quantity_in_stock" name="quantity_in_stock" required>

                <button type="submit" class="fieldset-btn">Submit</button>
            </fieldset>
        </form>
    </main>