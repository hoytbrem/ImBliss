<?php session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
        header('Location: checkout-form.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php // Header Includes
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"  
    include ("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include ("{$dirLevel}pages/partial/header.php");
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include ("{$dirLevel}src/php/grab-cart-variables.php");
    grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist. ?>
    
    <!-- <?php
    // <!-- Header Includes -->
    // include ("../src/php/function-helpers.php"); // Various helpful functions    
    // $dirLevel = getDirLevel(1); // this will return "../" 
    //include("{$dirLevel}partial/every-page.html"); // Google Analytics
    // include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/contact/contact.css" />
</head>

<body class="container-fluid">
    <?php include ("./partial/nav.php"); ?>
    <?php
    // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center container-fluid" style="height: 80vh;">
        <div class="container">
            <div class="row">
                <!-- Left side -->
                <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Checkout</h4>
                        <a href="#">Back to shopping</a>
                    </div>
                    <div>
                        <h5>Sign In</h5>
                        <form action="checkout-form.php" method="POST">
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Login</button>
                        </form>
                    </div>
                    <div>
                        <h5>Guest</h5>
                        <form action="checkout-form.php" method="GET">
                            <button class="btn btn-secondary">Checkout as a guest</button>
                        </form>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <div class="col-sm-12 d-flex">
                            <h4 class="mb-0 col-sm-3">Order Summary</h4>
                            <p class="item-count col-sm-6 text-end" style="padding-right: 5px;">6 items</p>
                            <a href="#" class="col-sm-3">Edit</a>
                        </div>
                        <!-- Order items go here -->
                        <div class="row">
                            <?php

                            $cart_items = $_SESSION["cart_items"];

                            if (isset($_SESSION["cart_items"])) {
                                foreach ($cart_items as $cart_item) {
                                    ?>

                                    <div class="col-sm-6">
                                        <img src="<?php echo $dirLevel ?>images/product-images/<?php echo $cart_item["_image"] ?>"
                                            alt="<?php echo $cart_item["_alt_text"] ?>" class="imbliss-checkout-img">
                                        <div class="col-sm-6">
                                            <h3 class="checkout-product-name"><?php echo $cart_item["_name"] ?></h3>
                                            <div class="rating-group col-sm-4"></div>
                                            <div class="review-count col-sm-8">120 Reviews</div>

                                            <p class="dollar-amount">&dollar;<?php echo $cart_item["_price"] ?></p>
                                            <p class="quantity-amount">Qty: <?php echo $cart_item["_qty"] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                }
                            }
                            ?>
                    </div>
                </div>



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
    <?php include ("./partial/footer.html"); ?>
</body>

</html>