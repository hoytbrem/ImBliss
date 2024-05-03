<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Checkout Address", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); renderCart($dirLevel); // Cart ?>
    <main>
        <div class="container">
            <div class="row">
                <!-- Left side -->
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Checkout</h4>
                        <a href="#">Back to shopping</a>
                    </div>
                    <h5>Where's this order going?</h5>
                    <form>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected>Choose country</option>
                                <!-- Country options go here -->
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" placeholder="Apt/Floor/Suite">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" placeholder="State">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" placeholder="Zip code">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" placeholder="Phone">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Next</button>
                    </form>
                    <hr>
                    <h5>Shipping Options</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6>Delivery</h6>
                            <p>Standard - Free</p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
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