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

    <?php include("./partial/footer.html"); ?>
</body>

</html>