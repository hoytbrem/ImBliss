<?php session_start(); ?>
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
    <?php include("./partial/nav.html"); ?>
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

                <span class="font-weight-bold">Username</span>
                <span class="text-secondary">email@example.com</span>
                <span class="text-secondary">Address</span>
                <span class="text-secondary">Password</span>
                <span class="text-secondary">Payment</span>
                <span class="text-secondary">Subscription</span>
                <button class="btn btn-primary">Logout</button>
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