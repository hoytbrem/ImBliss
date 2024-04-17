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
            window.location.replace("login.php");
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
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>
    <title>Account</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <?php include("partial/every-page.html"); ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 border-end">
            <div class="d-flex flex-column align-items-center">
                <img src="../images/main/test-image.jpeg" class="test-img">
                <a href="./edit-account.php">Edit Account</a>
            </div>
            <div class="d-flex flex-column p-3 py-5">

                <!-- Added Username in the account page. Username is simply the first name on the account. -->
                <span class="font-weight-bold"><?php echo $username ?></span>
                <span class="text-secondary"><?php echo $userAccount["user_email"]?></span>
                <span class="text-secondary"><?php echo $userAccount["user_street_address"]." ". $userAccount["user_city"] .", ". $userAccount["user_state"]?></span>
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