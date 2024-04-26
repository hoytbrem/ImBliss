<?php
    session_start();
    // Checking that user is logged in
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        $username = $_SESSION["fName"];
        $isAdmin = false;
        // Checking if user is an admin
        if(isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true){
            $isAdmin = true;
        }
    } else {
    ?>
<script>
//window.location.replace("login.php");        UNCOMMENT THIS LATER IM JUST DOING THIS SO I CAN WORK ON THE PAGE SORRY IF I FORGET
</script>
<?php
    }

    require_once("../src/php/connect-db.php");

    $sql = "select * from user where user_id = :user_id";
    $statement = $db->prepare($sql);
    $statement->bindValue(":user_id", $_SESSION["user-id"]);
    
    if ($statement->execute()) {
        $userAccount = $statement->fetch();
        $statement->closeCursor();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Account", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" href="../theme/account/account.css">
</head>

<body>
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>

    <div class="row" style="margin-top: 70px;">
        <!-- Sidebar -->
        <div class="col-md-2 border-end" style="padding: 0; background: #F4F1F0">
            <div class="d-flex flex-column align-items-center"
                style="background-image: url('../images/account/white-background.jpg');">
                <img src="../images/account/2nuxnskx.bmp" class="pfp" alt="your profile picture">
                <a href="./edit-account.php" id="edit-account"><img src="../images/account/pencil.svg"> Edit Account</a>
            </div>
            <div class="d-flex flex-column p-5" id="users-data">

                <!-- Added Username in the account page. Username is simply the first name on the account. -->
                <span class="font-weight-bold"><?php echo $username ?></span>
                <span class="text-secondary"><?php echo $userAccount["user_email"]?></span>
                <span
                    class="text-secondary"><?php echo $userAccount["user_street_address"]." ". $userAccount["user_city"] .", ". $userAccount["user_state"]?></span>
                <!-- <span class="text-secondary"><?php echo $userAccount["user_state"]?></span> -->
                <!-- <span class="text-secondary"><?php echo $userAccount["user_subscription"]?></span> -->
                <!-- Checks if the user is an admin
                If they are, they will see the link that leads them to the user list.
                With this list an admin is able to make another user an admin -->
                <?php
                    if($isAdmin){
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
                <h2>Favorites</h2>
                <!-- Favorites content goes here -->
            </div>
        </div>
    </div>

    <?php include("./partial/footer.html"); ?>
</body>

</html>