<?php 

session_start();

$cart_items = json_decode(file_get_contents("php://input"), true);
$_SESSION["cart_items"] = $cart_items;

if ($cart_items == null) {
    echo "true";
    exit;
}

$validateItems = ($_SERVER["REQUEST_METHOD"] == "POST" && count($cart_items) > 0) ? true : false;
include ("connect-db.php");

if ($validateItems) {
    $sql = "SELECT item.item_id, item.price
            FROM item
            INNER JOIN meta
            ON item.meta_id = meta.meta_id";

    $statement = $db->prepare($sql);

    if ($statement->execute()) {
        $results = $statement->fetchAll();
        $statement->closeCursor();

        // validating the results.
        for ($index = 0; $index < count($results); $index++) {
            $item_id = $results[$index]["item_id"] ?? $results[$index]["_item_id"];
            $price = (float)$results[$index]["price"] ?? (float)$results[$index]["_price"];
            // Iterating over the JSON data
            foreach ($_SESSION["cart_items"] as $cart_item) {
                if ($cart_item["item_id"] == $item_id || $cart_item["_item_id"] == $item_id) {
                    $check_id = $cart_item["item_id"] ?? $cart_item["_item_id"];
                    $checking_price = (float)$cart_item["price"] ?? (float)$cart_item["_price"];
                    if ($checking_price != $price) {
                        try{
                            echo "false";
                            exit;
                        } catch (Exception $e) {

                        }
                    } 
                }
            }
        }

        $success = true;

        echo 'true';
        exit;
    } else {
        echo 'false';
        $success = false;
        exit;
    }
}

