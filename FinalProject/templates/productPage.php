<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Final Project Phase One - Home Page">
    <meta name="author" content="Leonardo Jose Ambrosio">
       <title>Final Project - Phase One</title>
       <link href="./css/style.css" rel="stylesheet">
       <link rel="icon" type="image/jpeg" href="./assets/joystickicon.jpg">
</head>
<body>
    <!-- Navigation Bar-->
    <nav class= "nav-game">
        <div class="nav-icon">
            <img class="nav-joystick-icon" alt="joystick icon" src="./assets/joystickicon.jpg"> 
            Virtua816
        </div>
        <div class="nav-menu">
        <a href="./index.html" title="Home">Home</a>
        <a href="./aboutUs.html" title="About Us">About Us</a>
        <a href="./shopPage.html" title="Game Store">Game Store</a>
        <a href="./contactUS.html" title="Contact Us">Contact Us</a>
        </div>
        <button class="nav-alerts">&#128490; Alerts</button>
        <div class="nav-profile"><img class="profileicon" alt="Profile Icon" src="./assets/geralt-profileicon.png">
        Leon_WH &#9661;
        </div>
    </nav>
        <!-- Product Page -->
       <!--Title-->
    <h1 class="title-general"> Galaxy Adventures</h1>
    <!--Products-->
    <main class="product-detail" id="product-detail">
        <article class="product-detail-card">
            <div class="product-detail-image">
                <img src="./assets/GalaxyAdventure.png" alt="Galaxy Adventures">
            </div>
            <div class="product-detail-description">
            <h2 class="subTitle">Description:</h2>
            <p class="product-detail-paragraph">
               In a vast and dangerous universe, Noah is no ordinary hero—he is a husband on an impossible mission. 
               Galaxy Adventures brings the nostalgia of classic 16-bit RPGs to life. Journey through distant galaxies, 
               interact with alien civilizations, and uncover the truth behind the disappearance of the person you love most.
            </p>
            </div>
        </article>
        <div class="product-detail-price">
            <p>Price: U$50.99<p>
            <button class="product-card-btn" type="button">Buy</button>   
        </div>
        
    </main>
        <footer class="contact-container">
        <!--Company informations-->
        <div class = "contact-info">
        <h2>Information: </h2>
        <p>816 Georgian Game, Barrie, ON</p>
        <p>Canada</p>
        <p>Phone: 444-555-6677</p>
        <p>Email: contact@virtua816.com.ca</p>
        <p>&copy; 2026 Virtua816 Game Studio</p>
        </div>
        <!--Company icon/logo-->
            <div class="nav-icon-footer">
                <img class="nav-joystick-icon" alt="Virtua816 icon" src="./assets/joystickicon.jpg"> 
                Virtua816
            </div>
    </footer>
        
   
    
</body>
</html>