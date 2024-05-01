<?php 

session_start();

$cart_items = json_decode(file_get_contents("php://input"), true);
setcookie("cart_items", $cart_items, time() + (86400 * 30));

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
            $item_id = $results[$index]["item_id"];
            $price = number_format((float)$results[$index]["price"], 2, '.', '');
            // Iterating over the JSON data
            foreach ($cart_items as $cart_item) {
                if ($cart_item["_item_id"] == $item_id) {
                    $check_id = $cart_item["_item_id"];
                    $checking_price = number_format((float)$cart_item["_price"], 2, '.', '');
                    if ($checking_price != $price) {
                        try{
                            echo "false {$checking_price} (JSON) vs. {$price} (PHP)";
                            exit;
                        } catch (Exception $e) {

                        }
                    } else if ($checking_price == $price) {
                        //echo "Validated: {$checking_price} (JSON) vs. {$price} (PHP)";
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

