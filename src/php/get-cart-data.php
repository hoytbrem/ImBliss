<?php
// this regex will remove all underscores from property names replace(/"_([^"]+)":/g, '"$1":'));

// SQL to grab cart data.

session_start();

$cart_items = json_decode(file_get_contents("php://input"), true);
$_SESSION["cart_items"] = $cart_items;

//$_SESSION["test"] = json_decode($_SESSION["test"]);

//echo $_SESSION["test"];
$validateItems = ($_SERVER["REQUEST_METHOD"] == "POST" && count($_SESSION["cart_items"]) > 0) ? true : false;
include ("connect-db.php");

if ($validateItems) {
    $_SESSION["cart_test"] = "Cart item!";
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

        // validating the results.
        for ($index = 0; $index < count($results); $index++) {
            $item_id = $results[$index]["item_id"];
            $price = (float)$results[$index]["price"];
            // Iterating over the JSON data
            foreach ($_SESSION["cart_items"] as $cart_item) {
                if ($cart_item["item_id"] == $item_id) {
                    $cart_item["price"] = (float)$cart_item["price"];
                    if ($cart_item["price"] != $price) {
                        throw new ErrorException("Cart is dirty");
                    } 
                }
            }
        }

        $success = true;
    } else {
        $success = false;
    }


    echo json_encode($cart_items);
} else { // just an old copy underneath, doesnt do anything yet.
    $_SESSION["cart_test"] = "Cart item!";
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
    echo json_encode($cart_items);
}


