<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["item_id"]))
        header("Location: ../../pages/index.php");

    $item_id = $_GET["item_id"];
    include("connect-db.php");

    $sql = "SELECT item_id, name, price, description, category, image, rating, totalPrice FROM item
            WHERE item_id = :item_id";
    
    $statement = $db->prepare($sql);
    $statement->bindValue(":item_id", $item_id);

    if ($statement->execute()) {
        $item = $statement->fetch();
        $statement->closeCursor();

        echo json_encode($item);
    }
}