<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>

    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>

    <title>Home</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />

    <?php include("partial/every-page.html"); ?>
</head>

<body class="container-fluid">



    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart    ?>

    <?php include("./partial/nav.html"); ?>


    <!-- Hero Section -->
    <!-- VERY WORK IN PROGRESS -->
    <section id="hero">
        <div id="hero-wrapper">
            <div id="hero-title">
                <h2>Featured Product Here</h2>
            </div>
            <div id="hero-main">
                <!-- Hero Left -->
                <div id="hero-left">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec sagittis aliquam malesuada bibendum. Nam aliquam sem et tortor consequat
                        id. Laoreet sit amet cursus sit amet. Eget gravida cum sociis natoque penatibus et. Pharetra sit
                        amet aliquam id diam maecenas ultricies. Nisl rhoncus mattis rhoncus urna.</p>
                    <button>View</button>
                    <button>Add to Cart</button>
                </div>
                <!-- Hero Right -->
                <div id="hero-right">
                    <img src="../images/main/test-image.jpeg" id="hero-secondary-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Featured Products -->
        <section id="featured-products">
            <img src="../images/main/test-image.jpeg">
            <img src="../images/main/test-image.jpeg">
            <img src="../images/main/test-image.jpeg">
        </section>

        <!-- Nutritional Benefits -->
        <section id="nutritional-benefits">
            <div id="nutritional-benefits-wrapper">
                <div id="nutritional-benefits-left">
                    <h2>Nutritional Benefits</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec sagittis aliquam malesuada bibendum. Nam aliquam sem et tortor consequat
                        id. Laoreet sit amet cursus sit amet. Eget gravida cum sociis natoque penatibus et. Pharetra sit
                        amet aliquam id diam maecenas ultricies. Nisl rhoncus mattis rhoncus urna.</p>
                    <img src="../images/main/test-image.jpeg">
                </div>
                <div id="nutritional-benefits-right">
                    <img src="../images/main/test-image.jpeg">
                </div>
            </div>
        </section>

        <!-- Main Page Learn More -->
        <section id="main-page-learn-more">
            <!-- Left Side -->
            <div class="main-page-learn-more-box">
                <h2 class="orange">
                    New Arrivals
                </h2>
                <button class="green">Explore</button>
            </div>
            <!-- Right Side -->
            <div class="main-page-learn-more-box">
                <h2 class="green">
                    Dedicated to Our Planet
                </h2>
                <button class="orange">Learn More</button>
            </div>
        </section>

        <!-- Client Testimonials -->
        <section id="client-testimonials">
            <h2>Client Testimonials</h2>
            <div id="client-testimonials-wrapper">
                <div class="client-testimonial">
                    <h3>"Best Product Ever!"</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec</p>
                    <p>Name Here</p>
                </div>
                <div class="client-testimonial">
                    <h3>"Best Product Ever!"</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec</p>
                    <p>Name Here</p>
                </div>
                <div class="client-testimonial">
                    <h3>"Best Product Ever!"</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec</p>
                    <p>Name Here</p>
                </div>
                <div class="client-testimonial">
                    <h3>"Best Product Ever!"</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Leo in vitae turpis massa sed elementum. Integer enim neque
                        volutpat ac tincidunt vitae semper quis. Sit amet nulla facilisi morbi tempus iaculis. Dolor
                        morbi non arcu risus quis varius quam quisque. Et ultrices neque ornare aenean euismod elementum
                        nisi quis. Sapien nec</p>
                    <p>Name Here</p>
                </div>
            </div>
        </section>

        <!-- Sigh Up Promo -->
        <section id="sign-up-promo">
            <div>
                <h3>Sigh Up Today & Get</h3>
                <h1>15% OFF</h1>
                <h2>Your First Purchase</h2>
            </div>
            <button>Sign Up</button>
        </section>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>