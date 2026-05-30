<?php

// Blueprint for executing basic API fetches
class FreeToGame{
private $targetUrl;
private $targetCategory;
private $targetSortBy;
public $maxPage = 0;

public function __construct($incomingUrl, $category, $sortBy){
    $this->targetUrl = $incomingUrl;
    $this->targetCategory = $category;
    $this->targetSortBy = $sortBy;

}


//Pulls game datasets from the API

public function fetchCurrentCategoryAndSortBy($selectedPage = 1){
    //Constructing string with newly assigned class proprieties
    $endpointUrl = "{$this->targetUrl}" . "/games?" . "category={$this->targetCategory}&" . "sort-by={$this->targetSortBy}";

    $rawJsonString = @file_get_contents($endpointUrl);

    if($rawJsonString == false){
        return [];
    }

    $allGames = json_decode($rawJsonString);

    if (!is_array($allGames)) {
        return [];
    }


    
    

    // Content per page
    $gamesPerPage = 12;
    $maxNumList = count($allGames); // Maximum number of itens in the list
    $this->maxPage = ceil($maxNumList/$gamesPerPage); // calculate the total number of pages
    
    $page = intval($selectedPage);
    
    if($page <1){
        $page=1;
    }

    if($page > $this->maxPage){
    $page = $this->maxPage;

    }

    $offset = ($page - 1) * $gamesPerPage;

    return array_slice($allGames, $offset, $gamesPerPage);
}

}


?>