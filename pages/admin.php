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
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Admin", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
</head>

<body class="container-fluid">
    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); renderCart($dirLevel); // Cart ?>
    <!-- Main content -->
    <div class="col-md-2" style="margin-top: 115px;"></div>
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