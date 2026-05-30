<?php

/**
 * API Controller
 */ 

require_once "./config/config.php";
require_once "./classes/FreeToGame.php";

//variable to activePage
$activePage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//Instance using newly class
$FreeToGameInstance = new FreeToGame(FreeToGame_Base_URL,"action-rpg","relevance");
$actionRPGList = $FreeToGameInstance->fetchCurrentCategoryAndSortBy($activePage);

// Get the maxPage value from the FreeToGame instance
$maxPageView = $FreeToGameInstance->maxPage;

// Include the view (isolated markup layer)
require_once "./views/view.php";