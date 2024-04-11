<?php
// this regex will remove all underscores from property names replace(/"_([^"]+)":/g, '"$1":'));

// SQL to grab cart data.
$justCartItem = $_GET["justCart"] ?? true;
include ("connect-db.php");

if ($justCartItem) {
    $sql = "SELECT
            item.item_id, item.name, item.price, item.totalPrice, item.description, item.category, item.image, 
            meta.alt_text
            FROM item
            INNER JOIN meta
            ON item.meta_id = meta.meta_id";
            
    $statement = $db->prepare($sql);

    if ($statement->execute()) {
        $results = $statement->fetchAll();
        $statement->closeCursor();
        $success = true;
    } else {
        $success = false;
    }

    echo json_encode($results);
}