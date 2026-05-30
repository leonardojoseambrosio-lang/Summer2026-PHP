<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Assigment One - API">
        <meta name="robots" content="noindex, nofollow">
        <title>Assigment 1 | PHP - Action-RPG-Free-to-Play</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header class="game-header">
            <div class="game-icon">
                <img title="D20-icon" alt="Dice 20 - Icon" class="icon" src="./assets/D20.jpg">
                Free Action <br> RPG Game
            </div>
            <nav class="nav-game">
                <a id="Home" title="Home" href="#Home">Home</a>
                <a id="Home" title="Home" href="#Home">Team</a>
                <a id="Home" title="Home" href="#Home">Support</a>
                <a id="Home" title="Home" href="#Home">Other</a>
            <nav>
        </header>

       <main class="game-main">
            
            <section class='game-list-title'>
                <h1>Action-RPG List</h1>
                <p>(Page <?php echo $activePage; ?>)</p>
            </section>
            
            <section class="game-list-section">
            <?php 
            // The loop now consumes the custom variables and propieties
            foreach($actionRPGList as $singleRPGObject){
                $title = htmlspecialchars($singleRPGObject->title ?? "Unknown Title");
                $publisher = htmlspecialchars($singleRPGObject->publisher ?? "Unknown Publisher");
                $developer = htmlspecialchars($singleRPGObject->developer ?? "Unknown Delveloper");
                $release = htmlspecialchars($singleRPGObject->release_date ?? "N/A");
                $gameImage = $singleRPGObject->thumbnail ?? null;

                $imgUrl = $gameImage
                    ? htmlspecialchars($gameImage)
                    : "https://via.placeholder.com/100x150.png?text=No+Image";
                    ?>

                    <div class="game-div">
                    <img class='game-img' src='<?php echo $gameImage; ?>' alt='<?php echo $title; ?> Image'>
                        <div class="game-div-info">
                            <h3><?php echo $title; ?></h3>
                             <p><?php echo "Developer: " . $developer; ?></p>
                            <p><?php echo "Publisher: " . $publisher; ?></p>
                            <p><?php echo "Release: " . $release; ?></p>
                        </div>    
                    </div>
            <?php
            }
            ?>

            </section>       
            

            <!-- Semantic Pagination Container -->
            <section class="game-pagination">
                <div class="game-div-pagination">
                    <?php
                    $previousPage = max(1, $activePage -1);
                    $nextPage = min($maxPageView, $activePage +1);
                  
                    if($activePage > 1){
                    echo "<button class='btn-pagination'>";
                        echo "<a href='?page={$previousPage}' class ='back'>&larr; Back</a>";
                    echo "</button>";
                    }
                    if($activePage < $maxPageView){
                    echo "<button class='btn-pagination'>";
                        echo "<a href='?page={$nextPage}' class='next'>Next &rarr;</a>";
                    echo "</button>";
                    }
                    ?>
                </div>
            </section>

        </main>
        <footer class="game-footer">
            <p>26S Intro to Web Prog using PHP - 01</p>
            <p>(COMP1006-26S-30624)</p>
            <p>Assignment One - API</p>
            <p><?php echo date("Y/F/d - h:i:s"); ?></p>
        </footer>
    </body>
</html>