<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"  
    include("{$dirLevel}partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}src/php/grab-cart-variables.php"); grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist.?>
    <title>Login</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <?php include("{$dirLevel}/pages/partial/every-page.html"); ?>
    <link rel="stylesheet" href="../theme/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include("./partial/nav.php"); ?>
    <?php 
    // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
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
                        <form>
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
                        <button class="btn btn-secondary">Checkout as a guest</button>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-md-8">
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