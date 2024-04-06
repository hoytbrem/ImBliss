<?php
    $message = "";
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
        $userID = $_SESSION["user-id"];
        $fName = $_SESSION["fName"];
    } else {
        $fName = "Not Logged In";
    }

    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true){
        $isAdmin = "true";
    } else{
        $isAdmin = "false";
    }

?>

<body class="container-fluid">
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
</body>