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
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/main-page.css" />
</head>


<body id="indexBody">

    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); renderCart($dirLevel); // Cart ?>

    <!-- Hero Section -->
    <div class="jumbotron d-flex align-items-center" id="hero-section" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff00 100%),
    url('<?php echo $dirLevel?>/images/main/kitchen-countertop-background.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Featured Product: ImBliss Blend Granola!</h1>
                    <p class="lead">Our fan-favorite ImBliss blend in a snackable granola form! Fruit, nuts, toasted oats and chocolate go perfectly with a plant based milk, yogurt, or on its own as a quick energy boost... You'll regret if you don't try it!</p>
                    <p>
                        <a class="btn btn-primary btn-lg" id="hero-section-view-button" href="./view-product.php?item_id=14" role="button">View</a>
                        <a class="btn btn-secondary btn-lg" id="hero-section-add-to-cart-button"
                        onclick='addItem(` {"item_id":14,"0":14,"name":"ImBliss Blend Granola","1":"ImBliss Blend Granola","price":8,"2":8,"description":"Our fan-favorite ImBliss blend in a snackable granola form! Fruit, nuts, toasted oats and chocolate go perfectly with a plant based milk, yogurt, or on its own as a quick energy boost.","3":"Our fan-favorite ImBliss blend in a snackable granola form! Fruit, nuts, toasted oats and chocolate go perfectly with a plant based milk, yogurt, or on its own as a quick energy boost.","category":"granola","4":"granola","image":"ImBliss-Blend-Granola.jpg","5":"ImBliss-Blend-Granola.jpg","meta_id":26,"6":26,"rating":0,"7":0,"totalPrice":0,"8":0,"meta_alt_text":"A bag of ImBliss granola, decorated with pecans, chocolate, oats and dried fruit.","9":"A bag of ImBliss granola, decorated with pecans, chocolate, oats and dried fruit.","qty":1} `)'
                            role="button">Add to Cart</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $dirLevel?>/images/main/ImBliss-Blend-Bar-Featured-Product.png"
                        class="img-fluid" id="hero-section-image" alt="Product Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Product Images Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $dirLevel?>/images/main/ImBliss-Variety-Pack-Chocolate.jpg"
                    class="img-fluid product-mockups" alt="Imbliss Variety Pack of chocolate">
            </div>
            <div class="col-md-4">
                <img src="<?php echo $dirLevel?>/images/main/ImBliss-Pina-Colada-Granola.jpg"
                    class="img-fluid product-mockups" alt="Pina Colada Granola">
            </div>
            <div class="col-md-4">
                <img src="<?php echo $dirLevel?>/images/main/ImBliss-Carefree-Coffee-Bars.jpg"
                    class="img-fluid product-mockups" alt="Imbliss Carefree Coffee Bar">
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
                    <img src="<?php echo $dirLevel?>/images/main/healthy-natural-vegetables-display.jpg"
                        class="img-fluid sink" alt="Image">
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $dirLevel?>/images/main/healthy-natural-oats-display.jpg"
                        class="img-fluid sink" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals and Planet Section -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6" id="new-arrivals-container">
                <h2>New Arrivals</h2>
                <a class="btn btn-primary" href="<?php echo $dirLevel?>/pages/product-page.php"
                    role="button">Explore</a>
            </div>
            <div class="col-md-6" id="dedicated-to-our-planet-container">
                <h2>Dedicated to our planet</h2>
                <a class="btn btn-primary" href="<?php echo $dirLevel?>/pages/about-us.php" role="button">Learn More</a>
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
        <p><a class="btn btn-primary btn-lg" href="<?php echo $dirLevel?>/pages/sign-up.php"
                style="background: #FFFFFF; color: #707070;" role="button">Sign
                Up</a></p>
    </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>