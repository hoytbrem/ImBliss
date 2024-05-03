<?php
session_start();
// Checking that user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    $username = $_SESSION["fName"];
    $isAdmin = false;
    // Checking if user is an admin
    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true) {
        $isAdmin = true;
    }
} else {
?>
    <script>
        window.location.replace("login.php");
    </script>
<?php
}

require_once("../src/php/connect-db.php");

//First Query
$sql = "select * from user where user_id = :user_id";
$statement = $db->prepare($sql);
$statement->bindValue(":user_id", $_SESSION["user-id"]);

if ($statement->execute()) {
    $userAccount = $statement->fetch();
    $statement->closeCursor();
}

// Second Query
$sqlFavorite = "SELECT item.*, meta.alt_text as meta_alt_text FROM item
    INNER JOIN meta ON item.meta_id = meta.meta_id
    WHERE item.item_id IN(
        SELECT DISTINCT item_id
        FROM user_item_favorite
        WHERE user_id = :user_id
    )
    ORDER BY item.name;";
$statementFavorite = $db->prepare($sqlFavorite);
$statementFavorite->bindValue(":user_id", $_SESSION["user-id"]);

if ($statementFavorite->execute()) {
    $favoriteItemCheck = true;
    $favoriteItems = $statementFavorite->fetchAll();
    $statementFavorite->closeCursor();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // <!-- Header Includes -->
    include("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php");
    renderHeader("Account", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" href="../theme/account/account.css">
</head>

<body>
    <div class="container-fluid">
        <?php include("./partial/nav.php"); ?>
        <?php // <!-- Other Includes -->
        include("./partial/cart.php");
        renderCart($dirLevel); // Cart 
        ?>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 border-end" style="padding: 0; background: #F4F1F0">
                <div class="d-flex flex-column align-items-center" style="background-image: url('../images/account/white-background.jpg');">
                    <img src="../images/account/2nuxnskx.bmp" class="pfp" alt="your profile picture">
                    <a href="./edit-account.php" id="edit-account"><img src="../images/account/pencil.svg"> Edit Account</a>
                </div>
                <div class="d-flex flex-column p-5" id="users-data">

                    <!-- Added Username in the account page. Username is simply the first name on the account. -->
                    <span class="font-weight-bold"><?php echo $username ?></span>
                    <span class="text-secondary"><?php echo $userAccount["user_email"] ?></span>
                    <span class="text-secondary"><?php echo $userAccount["user_street_address"] . " " . $userAccount["user_city"] . ", " . $userAccount["user_state"] ?></span>
                    <!-- <span class="text-secondary"><?php echo $userAccount["user_state"] ?></span> -->
                    <!-- <span class="text-secondary"><?php echo $userAccount["user_subscription"] ?></span> -->
                    <!-- Checks if the user is an admin
                    If they are, they will see the link that leads them to the user list.
                    With this list an admin is able to make another user an admin -->
                    <?php
                    if ($isAdmin) {
                    ?>
                        <a href="admin.php">Admin Panel</a>
                    <?php
                    }
                    ?>
                    <!-- Had to put in form for button to lead to logout -->
                    <form action="logout.php">
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <!-- Main content -->
            <div class="col-md-10">
                <div class="p-3">
                    <h2>Order History</h2>
                    <!-- Order history content goes here -->
                </div>
                <div class="p-3">

                    <!-- Displays the Favorite Items -->
                    <h2>Favorites</h2>
                    <div class="row">
                        <?php
                        if ($favoriteItemCheck) {
                            foreach ($favoriteItems as $i) {
                        ?>
                                <div class="col-md-5 card shadow m-3 py-3 px-2">
                                    <div class="row">
                                        <div class="col-md-6 card-body mx-auto">
                                            <img src="../images/product-images/<?php echo $i["image"]; ?>" class="img-fluid rounded-start" alt="<?php echo $i["meta_alt_text"]; ?>" />
                                        </div>
                                        <div class="col-md-6 mx-auto">
                                            <h4 class="card-title"><Strong><?php echo $i["name"]; ?></Strong></h4>
                                            <p class="card-text" style="font-family: sans-serif;"><?php echo $i["description"]; ?></p>
                                            <div class="d-flex justify-content-between">
                                                <form action="view-product.php" method="GET">
                                                    <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                                    <button type="submit" class="btn view-button">View</a>
                                                </form>
                                                <button onclick='addItem(<?php echo $i["item_id"]; ?>)' class="btn add-to-cart-button">Add to Cart</button>
                                                <strong class="mt-1">$<?php echo number_format($i["price"], 2); ?></strong>
                                                <?php
                                                if ($favoriteItemCheck && in_array($i["item_id"], array_column($favoriteItems, "item_id"))) {
                                                ?>
                                                    <form action="../profile/process/process-remove-favorite.php" method="POST">
                                                        <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                                        <button id="item-favorite" class="btn"><img src="../images/products/filled-heart.svg" alt="Picture of an empty favorite heart"></button>
                                                    </form>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include("./partial/footer.html"); ?>

    </div>
</body>

</html>