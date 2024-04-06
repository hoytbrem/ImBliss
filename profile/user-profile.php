<?php
    session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        } else {
            ?>
            <script>
                window.location.replace("login.php");
            </script>
        <?php
        }

    $username = $_SESSION["fName"];
?>


<!DOCTYPE html>
<html>
    <head>
        <?php // <!-- Header Includes -->
        include ("../src/php/function-helpers.php"); // Various helpful functions    ?>

        <?php // <!-- "Global" variables --> 
        $dirLevel = getDirLevel(1); // this will return "../"   ?>

        <title>Home</title>
        <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
        <meta name="description"
            content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
        <meta name="keywords" content="healthy, snacks, nutritious" />

        <!-- Bootstrap Core -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="../theme/style.css">

        <!-- Scripts -->
        <script src="script.js"></script>
    </head>
    <body>
        <p><a href="">Update Profile</a></p>
        <p><a href="">Past Orders</a></p>
        <?php 
            if(isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true){
                echo "<p><a href='user-list.php'>User List</a></p>";
            }
        ?>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>