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
        <!-- Main content -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="p-3">
                <a class="btn btn-primary" href="admin-user-list.php">User List</a>
            </div>
            <div class="p-3">
                <a class="btn btn-primary" href="imbliss-admin/admin-product-control.php">Add Product</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <?php include("./partial/footer.html"); ?>
</body>

</html>