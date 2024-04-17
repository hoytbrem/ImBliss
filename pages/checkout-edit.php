<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php 
$_SESSION["cart_items"] = "somethin";
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}src/php/grab-cart-variables.php"); grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist.
    ?>
    <?php include("partial/every-page.html"); ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main>
        <div class="container">
            <div class="row">
                <!-- Left side -->
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Checkout</h4>
                        <a href="#">Back to shopping</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Continue as Guest</h5>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Shipping</h5>
                            <p>Address details</p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Delivery</h5>
                            <p>Delivery option</p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Payment</h5>
                            <p>Payment details</p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <h5>Everything look good?</h5>
                    <button type="submit" class="btn btn-primary mb-3">Place Order</button>
                </div>
                <!-- Right side -->
                <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Order Summary</h4>
                        <a href="#">Edit</a>
                    </div>
                    <!-- Order items go here -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax</span>
                            <span>$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>$0.00</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Estimated Total</h5>
                        <h5>$0.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>
