        <!-- Create/Delete-->
       <!--Title-->
     <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
    <h1 class="title-general">Create/Delete Products</h1>
     <?php else: ?>
    <h1 class="title-general">Products</h1>
     <?php endif; ?>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                Area to crete/delete products
            </p>
        </article>
        <!--Create or Delete Product-->

        <!--Create a New Product-->
        <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
        <form class="contact-form"  action="index.php?page=adminCreateOrDeleteProduct" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Add a New Game</h2>
                <label for="product_name">Title: </label>
                <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($_POST['product_name'] ?? ''); ?>" required>
                
                <label for="short_description">Short Description: </label>
                <input type="text" id="short_description" name="short_description" value="<?php echo htmlspecialchars($_POST['short_description'] ?? ''); ?>" required>

                <label for="full_description">Full Description: </label>
                <textarea id="full_description" name="full_description" required><?php echo htmlspecialchars($_POST['full_description'] ?? ''); ?></textarea>

                <label for="product_image">Select an image: </label>
                <input type="text" id="product_image" name="product_image" value="<?php echo htmlspecialchars($_POST['product_image'] ?? './assets/'); ?>" required>

                <label for="product_price">Price (U$): </label>
                <input type="text" id="product_price" name="product_price" value="<?php echo htmlspecialchars($_POST['product_price'] ?? ''); ?>" required>


                <label for="quantity_in_stock">Quantity in stock: </label>
                <input type="text" id="quantity_in_stock" name="quantity_in_stock" value="<?php echo htmlspecialchars($_POST['quantity_in_stock'] ?? ''); ?>" required>

                <button type="submit"  class="fieldset-btn" name="create_new_product" value="create_new_product">Add Product</button>
                <!-- Messages about product creation -->
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
            </fieldset>
        </form>
        <?php endif; ?>

        <table class="product-table">

        <!--List Product - Delete and Edit option-->
            <h2>Product List</h2>

            <thead class="table-head">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
                    <th>Delete/Edit</th>
                     <?php endif; ?>
                </tr>
            </thead>
            <tbody class="table-body">
                
                <?php
                //Foreach to list all products
                foreach ($products as $product){
                $id = htmlspecialchars($product->product_id);
                $title = htmlspecialchars($product->product_name);
                $price = number_format(htmlspecialchars($product->product_price), 2, '.', '');
                $stock = htmlspecialchars($product->quantity_in_stock);
            ?>
                <tr>
                    <td><?php echo $id?></td>
                    <td><?php echo $title?></td>
                    <td><?php echo $price?></td>
                    <td><?php echo $stock?></td>
                     <?php if (isset($_SESSION['user_id']) && $_SESSION['permission'] === 'admin'): ?>
                    <td>
                        <form action="index.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            <button type="submit"  class="" name="delete_product" value="<?php echo $id?>">Delete</button> 
                            <a href="index.php?page=adminEditProduct&id=<?php echo $id; ?>">Edit</a>
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php } //forach end?>
            </tbody>
        </table>
    </main>