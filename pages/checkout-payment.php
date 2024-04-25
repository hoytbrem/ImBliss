<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php // <!-- Header Includes -->
    $_SESSION["cart_items"] = "somethin";
    include("../src/php/function-helpers.php"); // Various helpful functions    
    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"  
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php");
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}src/php/grab-cart-variables.php");
    grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist. 
    ?>
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
                        <h4 class="mb-0">Continue as Guest</h4>
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
                    <h5>What's your payment information?</h5>
                    <form>
                        <h6>Enter your card information</h6>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Card number">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Exp">
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" placeholder="CSV">
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" placeholder="Zip">
                            </div>
                        </div>
                        <a href="#" class="mb-3">Cancel</a>
                        <button type="submit" class="btn btn-primary mb-3">Review Order</button>
                    </form>
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