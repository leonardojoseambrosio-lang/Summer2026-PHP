        <!-- Shop Page / Game Store-->
       <!--Title-->
    <h1 class="title-general">New Games With a Classic Soul</h1>
    <!--Products-->
    <main class="product-container" id="products">

        <?php
        foreach ($products as $product){
            $name = htmlspecialchars($product->product_name);
            $shortDescription = htmlspecialchars($product->short_description);
            $price = htmlspecialchars($product->product_price);
            $image = htmlspecialchars($product->product_image);
            ?>
        
        <article class="product-card">
            <div class="product-card-image">
                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
            </div>
            <span class="product-card-badge"><a href="productPage.php?id=<?php echo $product->product_id; ?>" title="Galaxy Adventure">Read More</a></span>
            <h2 class="product-card-title"><?php echo $name; ?></h2>
            <p class="product-card-body">
                <?php echo $shortDescription; ?>
            </p>
             <p class="product-card-price"><?php echo $price; ?></p>
            <button class="product-card-btn" type="button">Buy</button>
            <?php } ?>
    </main>