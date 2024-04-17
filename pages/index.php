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


<body id="indexBody">

    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); // Cart ?>

    <!-- Hero Section -->
    <div class="jumbotron d-flex align-items-center" id="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Featured Product: ImBliss Blend!</h1>
                    <p class="lead">ImBliss blend bars combine flavors of sweet chocolate and dried fruit, and pairs it
                        with roasted organic coconut and pecans. The result? A treat you can enjoy- that's healthy too!
                        Our featured ImBliss blend bars are specially made to be healthy, eco-friendly, and delicious.
                        Plus, all our products feature a list of organic, vegan ingredients. That way, we live up to our
                        green promise. And, you can conveniently enjoy guilt-free (And delicious!) food.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" id="hero-section-view-button" href="#" role="button">View</a>
                        <a class="btn btn-secondary btn-lg" id="hero-section-add-to-cart-button" href="#"
                            role="button">Add to Cart</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="../images/main/ImBliss-Blend-Bar-Featured-Product.png" class="img-fluid"
                        id="hero-section-image" alt="Product Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Product Images Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Variety-Pack-Chocolate.jpg" class="img-fluid product-mockups"
                    alt="Imbliss Variety Pack of chocolate">
            </div>
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Pina-Colada-Granola.jpg" class="img-fluid product-mockups"
                    alt="Pina Colada Granola">
            </div>
            <div class="col-md-4">
                <img src="../images/main/ImBliss-Carefree-Coffee-Bars.jpg" class="img-fluid product-mockups"
                    alt="Imbliss Carefree Coffee Bar">
            </div>
        </div>
    </div>

    <!-- Nutritional Benefits Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Nutritional benefits</h2>
                    <p>Our commitment to your well-being is steadfast. Every product we offer is prepared with your
                        health in mind along with an awareness of the environment. We take pride in our ingredients,
                        sourcing them from small producers, free from pesticides and GMOs. Ensuring that each
                        ingredient, from the cocoa in our chocolate to the coconut in our bars, is healthy and
                        delicious. Our selection of ingredients is bountiful and abundant in natural fiber,
                        antioxidants, curated to align with vegan lifestyles, and free of any added sugars, providing
                        you with a guilt-free indulgence that nourishes both body and soul.</p>
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
    <div id="testimonial-container" style="padding-bottom: 40px;">
        <h2 class="text-center">Client Testimonials</h2>
        <div class="row">
            <div class="col md-2 testimonial" style="border-radius: 20px;">
                <h4><strong>"Delicious!"</strong></h4>
                <p>Stumbled on this website when a friend recommended their granola! Amazing, Pina Colada is my favorite
                    quick snack to take on the go!</p>
                <p><small>- Chelsy Reis</small></p>
            </div>
            <div class="col md-2 testimonial" style="border-radius: 20px;">
                <h4><strong>"New Morning Routine"</strong></h4>
                <p>Usually, I wake up and go for a quick run before leaving for work, but I never leave myself
                    enough
                    time to eat a decent breakfast. Now I grab a bar or two to fill me up and hold me over till
                    I can
                    grab lunch!</p>
                <p><small>- Tammy Marion</small></p>
            </div>
            <div class="col md-2 testimonial" style="border-radius: 20px;">
                <h4><strong>"Love my Coffee Mug"</strong></h4>
                <p>I have bought Imbliss bars and granola for a while now, I love that they are conscientious about the
                    environment and their values and align with mine. So I love showing of my new coffee mug even more!
                </p>
                <p><small>- Heather Polaski</small></p>
            </div>
            <div class="col md-2 testimonial" style="border-radius: 20px;">
                <h4><strong>"Amazing Selection"</strong></h4>
                <p>I recently purchased the 'ImBliss Best' Variety Pack. WOW, Great selection, and combination of
                    flavors. Best way to indulge in sweets without worrying about the Calories.</p>
                <p><small>- Rebecca Frank</small></p>
            </div>
        </div>
    </div>

    <!-- Sign Up Section -->
    <div class="jumbotron text-center container my-6" style="width:" id="sign-up-container">
        <h1 class="display-4">Sign up today and get</h1>
        <p class="lead">15% off</p>
        <p>Your first purchase</p>
        <p><a class="btn btn-primary btn-lg" href="../pages/sign-up.php" style="background: #FFFFFF; color: #707070;"
                role="button">Sign
                Up</a></p>
    </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>