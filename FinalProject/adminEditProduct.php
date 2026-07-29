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
        <form class="contact-form"  action="index.php?page=adminEditProduct&id=<?php echo $id; ?>" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Edit Game Info</h2>
                <!-- Hidden input to add the id to the $_POST-->
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">

                <label for="product_name">Title: </label>
                <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($_POST['product_name'] ?? $title) ?>" required>
                
                <label for="short_description">Short Description: </label>
                <input type="text" id="short_description" name="short_description" value="<?php echo htmlspecialchars($_POST['short_description'] ?? $shortDescription) ?>" required>

                <label for="full_description">Full Description: </label>
                <textarea id="full_description" name="full_description" required><?php echo htmlspecialchars($_POST['full_descriptiom'] ?? $fullDescription)  ?></textarea>

                <label for="product_image">Select an image: </label>
                <input type="text" id="product_image" name="product_image" value="<?php echo htmlspecialchars($_POST['product_image'] ?? $image)  ?>"required>

                <label for="product_price">Price (U$): </label>
                <input type="text" id="product_price" name="product_price" value="<?php echo htmlspecialchars($_POST['product_price'] ?? $price) ?>" required>


                <label for="quantity_in_stock">Quantity to add in stock: </label>
                <input type="text" id="quantity_in_stock" name="add_stock" value="0" required>
                <p>Quantity in stock: <?php echo $stock ?> </p>

                <button type="submit"  class="fieldset-btn" name="edit_product" value="edit_product">Edit Product</button>
                  <!-- Messages about product edition -->
                 <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <p> <?php echo htmlspecialchars($successMessage); ?> </p>
                </div>
                <?php 
                    endif; ?>

                <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <p> <?php echo htmlspecialchars($errorMessage); ?> </p>
                </div>
                <?php endif; ?>
                    <!-- Link to return to Create / Delete Products -->
                     <a href="index.php?page=adminCreateOrDeleteProduct"> Return </a>
            </fieldset>
        </form>
    </main>