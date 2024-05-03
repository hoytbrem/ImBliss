<?php
session_start();
include("../../src/php/function-helpers.php");
    $dirLevel = getDirLevel(2);
    
$categoryOrder = ["bars", "variety pack", "energy bites", "granola", "merch"];

$loginStatus = false;

require_once("$dirLevel/src/php/connect-db.php");

$searchQuery = isset($_GET["search_query"]) ? $_GET["search_query"] : null;

//First Query
if($searchQuery !== null){
    $searchQuery = $_GET["search_query"];
    $sql1 = "SELECT item.*, meta.alt_text as meta_alt_text, meta.keywords, meta.description FROM item INNER JOIN meta ON item.meta_id = meta.meta_id WHERE item.name LIKE :searchQuery OR item.description LIKE :searchQuery OR meta.keywords LIKE :searchQuery OR meta.description LIKE :searchQuery ORDER BY item.name";
    $statement1 = $db->prepare($sql1);
    $statement1->bindValue(":searchQuery", "%".$searchQuery."%");
}else{
    $sql1 = "SELECT item.*, meta.alt_text as meta_alt_text FROM item INNER JOIN meta ON item.meta_id = meta.meta_id ORDER BY item.name";
    $statement1 = $db->prepare($sql1);
}

if ($statement1->execute()) {
    $item = $statement1->fetchAll();
    $statement1->closeCursor();
}

//Second Query
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
    $sqlFavorite = "SELECT DISTINCT item_id FROM user_item_favorite WHERE user_id = :user_id";
    $statementFavorite = $db->prepare($sqlFavorite);
    $statementFavorite->bindValue(":user_id", $_SESSION["user-id"]);
    
    if ($statementFavorite->execute()) {
        $favoriteItemCheck = true;
        $favoriteItems = $statementFavorite->fetchAll();
        $statementFavorite->closeCursor();
    }

}

if (isset($_GET['sort'])) {
    $sort = true;
    if ($_GET['sort'] === 'low-to-high') {
        usort($item, function ($a, $b) {
            return $a['price'] - $b['price'];
        });
    } elseif ($_GET['sort'] === 'high-to-low') {
        usort($item, function ($a, $b) {
            return $b['price'] - $a['price'];
        });
    }
} else {
    $sort = false;
}

$selectedFilters = isset($_GET['filters']) ? json_decode($_GET['filters']) : [];

$selectedFilters = json_decode($_GET['filters']);

$filteredData = array_filter($item, function ($i) use ($selectedFilters) {
    return in_array($i['category'], $selectedFilters);
});

// Filter Logic
switch (true) {
    // If there are filters and no sort, it will display all of the items from the selected categories, in category order, in alphabetical order.
    case ($selectedFilters != null && !$sort):
        foreach ($categoryOrder as $co) {
            foreach ($filteredData as $i) {
                if ($i["category"] == $co) {
                    include("product-card-info.php");
                }
            }
        }
        break;
// If there are filters and a sort, it will display all of the items from the selected categories, in sort order.
    case ($selectedFilters != null && $sort):
        foreach ($filteredData as $i) {
            include("product-card-info.php");
        }
        break;
// If there are no filters and a sort, it will display all of the items, in sort order.
    case (!$selectedFilters && $sort):
        foreach ($item as $i) {
            include("product-card-info.php");
        }
        break;
// If there are no filters and no sort, it will display all of the items, in category order, in alphabetical order.
    default:
        foreach ($categoryOrder as $co) {
            foreach ($item as $i) {
                if ($i["category"] == $co) {
                    include("product-card-info.php");
                }
            }
        }
        break;
}