<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/main-page.css" />
</head>

<body class="container-fluid" id="indexBody">

    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); // Cart ?>

    <!-- Hero Section -->
    <div class="jumbotron d-flex align-items-center" id="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Featured product here</h1>
                    <p class="lead">Lorem ipsum sample text</p>
                    <p>
                        <a class="btn btn-primary btn-lg" id="hero-section-view-button" href="#" role="button">View</a>
                        <a class="btn btn-secondary btn-lg" id="hero-section-add-to-cart-button" href="#"
                            role="button">Add to Cart</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="../images/main/imBliss-Pecan-Cherry-Energy-Bites.jpg" class="img-fluid"
                        id="hero-section-image" alt="Product Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Product Images Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Premium-Package2.jpg" class="img-fluid product-mockups"
                    alt="Product Image">
            </div>
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Tote-Bag.jpg" class="img-fluid product-mockups" alt="Product Image">
            </div>
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Water-Bottle.jpg" class="img-fluid product-mockups"
                    alt="Product Image">
            </div>
        </div>
    </div>

    <!-- Nutritional Benefits Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Nutritional benefits</h2>
                    <p>Lorem ipsum sample text</p>
                    <img src="../images/main/healthy-natural-vegetables-display.jpg" class="img-fluid" alt="Image">
                </div>
                <div class="col-md-6">
                    <img src="../images/main/healthy-natural-oats-display.jpg" class="img-fluid" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals and Planet Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6" id="new-arrivals-container">
                <h2>New Arrivals</h2>
                <a class="btn btn-primary" href="#" role="button">Explore</a>
            </div>
            <div class="col-md-6" id="dedicated-to-our-planet-container">
                <h2>Dedicated to our planet</h2>
                <a class="btn btn-primary" href="#" role="button">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Client Testimonials Section -->
    <div id="testimonial-container">
        <h2 class="text-center">Client Testimonials</h2>
        <div class="row">
            <div class="col md-2 testimonial">
                <h5>Title</h5>
                <p>Lorem ipsum sample text</p>
                <p><small>- Name</small></p>
            </div>
            <div class="col md-2 testimonial">
                <h5>Title</h5>
                <p>Lorem ipsum sample text</p>
                <p><small>- Name</small></p>
            </div>
            <div class="col md-2 testimonial">
                <h5>Title</h5>
                <p>Lorem ipsum sample text</p>
                <p><small>- Name</small></p>
            </div>
            <div class="col md-2 testimonial">
                <h5>Title</h5>
                <p>Lorem ipsum sample text</p>
                <p><small>- Name</small></p>
            </div>
            <div class="col md-2 testimonial">
                <h5>Title</h5>
                <p>Lorem ipsum sample text</p>
                <p><small>- Name</small></p>
            </div>
        </div>
    </div>

    <!-- Sign Up Section -->
    <div class="jumbotron text-center container my-6" id="sign-up-container">
        <h1 class="display-4">Sign up today and get</h1>
        <p class="lead">15% off</p>
        <p>Your first purchase</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up</a></p>
    </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>