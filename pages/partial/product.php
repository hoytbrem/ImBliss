<?php
$categoryOrder = ["bars", "variety pack", "energy bites", "granola", "merch"];

require_once("../../src/php/connect-db.php");

$sql = "SELECT item.*, meta.alt_text as meta_alt_text FROM item INNER JOIN meta ON item.meta_id = meta.meta_id ORDER BY item.name";

$statement = $db->prepare($sql);

if ($statement->execute()) {
    $item = $statement->fetchAll();
    $statement->closeCursor();
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
