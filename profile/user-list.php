<?php
    session_start();
    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true) {
        } else {
            ?>
                <script>
                    window.location.replace("login.php");
                </script>
            <?php
        }

    $userMessage = "";
    require_once("process/connect-db.php");
    $sql = "SELECT * FROM user";
    $statement = $db->prepare($sql);

    if($statement->execute()){
        $userID = $statement->fetchAll();
        $statement->closeCursor();
        $userMessage = "<h3>All users displayed successfully</h3>";
    }else{
        $userMessage = "<h3>Error retrieving users.</h3>";
    }
?>

<!DOCTYPE html>
<html lang="en">
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
    <body class="container-fluid">

    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart    ?>

    <!-- Navigation Bar -->
    <nav id="navbar">
        <div id="navbar-left">
            <!-- Logo -->
            <a id=" navbar-logo">
                <img src="../images/main/test-image.jpeg" class="test-img">
            </a>
            <!-- Navigation Links -->
            <ul id="navbar-links">
                <li>Home</li>
                <li>Products</li>
                <li>About Us</li>
                <li>Contact</li>
            </ul>
        </div>
        <!-- Search Bar / Account / Cart-->
        <div id="navbar-right">
            <ul id="navbar-buttons">
                <li>
                    <input type="text" placeholder="Search">
                </li>
                <?php 
                    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
                        $username = $_SESSION["fName"];
                        echo "
                        <li>
                            <a href='../profile/user-profile.php'>$username</a>
                        </li>
                        ";
                    }else{
                        echo "
                        <li>
                            <a href='../profile/create-account.php'>
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a href='../profile/login.php'>
                                Log In
                            </a>
                        </li>
                        ";
                    }
                ?>
                <li>
                    <!-- Open Shopping Cart -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <div class="card-header imbliss-cart-card-header">
                            <i class="bi bi-cart align-self-right" id="cart-header-icon"></i>Cart
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <main>
    </main>
    <footer>
        <div id="footer-logo">
            <img src="../images/main/test-image.jpeg" class="test-img">
        </div>
        <div id="footer-links">
            <ul>
                <li>Contact Us</li>
                <li>Privacy Policy</li>
                <li>My Account</li>
                <li>Shop</li>
            </ul>
        </div>
        <div id="footer-contacts">
            <ul>
                <li>+1-510-555-0204</li>
                <li>ImBliss@gmail.com</li>
            </ul>
        </div>
    </footer>
</body>
</html>