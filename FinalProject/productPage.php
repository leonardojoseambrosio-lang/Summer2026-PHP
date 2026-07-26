      <!-- Product Page -->
       <!--Title-->
      <?php
        //Variables
        $name = htmlspecialchars($product->product_name);
        $image = htmlspecialchars($product->product_image);
        $fullDescription = htmlspecialchars($product->full_description);
        $price = number_format(htmlspecialchars($product->product_price), 2, '.', '');
      ?>

    <h1 class="title-general"><?php echo $name; ?></h1>
    <!--Products-->
    <main class="product-detail" id="product-detail">
        <article class="product-detail-card">
            <div class="product-detail-image">
                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
            </div>
            <div class="product-detail-description">
            <h2 class="subTitle">Description:</h2>
            <p class="product-detail-paragraph">
               <?php echo $fullDescription; ?>
            </p>
            </div>
        </article>
        <div class="product-detail-price">
            <p>Price: <?php echo "U$ " . $price; ?><p>
            <button class="product-card-btn" type="button">Buy</button>   
        </div>
        
    </main>