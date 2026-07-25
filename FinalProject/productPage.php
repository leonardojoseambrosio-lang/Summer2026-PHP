      <!-- Product Page -->
       <!--Title-->
    <h1 class="title-general"><?php echo $product->product_name; ?></h1>
    <!--Products-->
    <main class="product-detail" id="product-detail">
        <article class="product-detail-card">
            <div class="product-detail-image">
                <img src="<?php echo $product->product_image; ?>" alt="<?php echo $product->product_name; ?>">
            </div>
            <div class="product-detail-description">
            <h2 class="subTitle">Description:</h2>
            <p class="product-detail-paragraph">
               <?php echo $product->full_description; ?>
            </p>
            </div>
        </article>
        <div class="product-detail-price">
            <p>Price: <?php echo "U$ " . number_format($product->product_price, 2, '.', ''); ?><p>
            <button class="product-card-btn" type="button">Buy</button>   
        </div>
        
    </main>