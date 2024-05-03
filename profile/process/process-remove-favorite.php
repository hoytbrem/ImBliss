<?php
session_start();
if (!isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] != true) {
?>
    <script>
        alert("Please sign in to use favorites button");
    </script>
<?php
    header("Location: ../../pages/product-page.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = htmlspecialchars($_POST["item_id"]);
    $success = true;
} else {
    echo "<h4> Error getting information</h4>";
    exit;
}

require_once("../../src/php/connect-db.php");

$sql = "DELETE FROM user_item_favorite WHERE user_id = :user_id AND item_id = :item_id";

$statement = $db->prepare($sql);

$statement->bindValue(":user_id", $_SESSION["user-id"]);
$statement->bindValue(":item_id", $item_id);

if ($statement->execute()) {
    $statement->closeCursor();
    // Message that will display for the user letting them know their account was created
    $userMessage = "<h4>The account has been created! You will be redirected in 5 seconds.</h4>";
    header("Location: ../../pages/product-page.php");
    exit;
} else {
    $userMessage = "<h4>Error Creating Account</h4>";
    header("Location: ../../pages/product-page.php?error=delete");
    exit;
}

?>