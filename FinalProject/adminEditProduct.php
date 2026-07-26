        <!-- Edit Product-->
        
            <?php
                //Product variables
                $id = htmlspecialchars($product->product_id);
                $title = htmlspecialchars($product->product_name);
                $shortDescription = htmlspecialchars($product->short_description);
                $fullDescription = htmlspecialchars($product->full_description);
                $image = htmlspecialchars($product->product_image);
                $price = number_format(htmlspecialchars($product->product_price), 2, '.', '');
                $stock = htmlspecialchars($product->quantity_in_stock);
            ?>

       <!--Title-->
    <h1 class="title-general">Edit</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to edit the product: <?php echo $title ?>
            </p>
        </article>
        <!--Area do Edit Product Info-->
        <form class="contact-form"  action="index.php" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Edit Game Info</h2>
                <!-- Hidden input to add the id to the $_POST-->
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">

                <label for="product_name">Title: </label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $title ?>" required>
                
                <label for="short_description">Short Description: </label>
                <input type="text" id="short_description" name="short_description" value="<?php echo $shortDescription ?>" required>

                <label for="full_description">Full Description: </label>
                <textarea id="full_description" name="full_description" required><?php echo $fullDescription ?></textarea>

                <label for="product_image">Select an image: </label>
                <input type="text" id="product_image" name="product_image" value="<?php echo $image ?>"required>

                <label for="product_price">Price (U$): </label>
                <input type="text" id="product_price" name="product_price" value="<?php echo $price ?>" required>


                <label for="quantity_in_stock">Quantity to add in stock: </label>
                <input type="text" id="quantity_in_stock" name="add_stock" value="0" required>
                <p>Quantity in stock: <?php echo $stock ?> </p>

                <button type="submit"  class="fieldset-btn" name="edit_product" value="edit_product">Edit Product</button>
            </fieldset>
        </form>
    </main>