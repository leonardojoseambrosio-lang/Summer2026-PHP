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
    <header>
        <!-- Navigation Bar-->
        <nav class= "nav-game">
            <div class="nav-icon">
                <img class="nav-joystick-icon" alt="joystick icon" src="./assets/joystickicon.jpg"> 
                 Virtua816
            </div>
            <div class="nav-menu">
                <a href="index.php?page=home" title="Home">Home</a>
                <a href="index.php?page=aboutUs" title="About Us">About Us</a>
                <a href="index.php?page=shopPage" title="Game Store">Game Store</a>
                <a href="index.php?page=contactUs" title="Contact Us">Contact Us</a>
             </div>

             <?php if(isset($_SESSION['user_id'])) : ?>
            <img class="profileicon" alt="Profile Icon" src="./assets/geralt-profileicon.png">
                    <span class="nav-profile"><?php echo htmlspecialchars($_SESSION['user_name']); ?> </span>
                    <details class="profile-accordion">
                        <summary class="accordion-summary">&#9965; Panel</summary>
                            <div class="accordion-links">
                                <a href="index.php?page=adminCreateOrDeleteProduct">Manage Products</a>
                                <a href="index.php?page=createOrDeleteUsers">Manage Users</a>
                                <a href="index.php?page=logout">Logout</a>
                            </div>
                    </details>
            <?php else: ?>
            <div class="nav-profile">
                 <a href="index.php?page=login">Login/Register</a>
            </div>
            <?php endif; ?>
        </nav>
    </header>