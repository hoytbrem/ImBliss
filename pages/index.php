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

    <!-- Bootstrap Core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../theme/style.css">

    <!-- Scripts -->
    <script src="script.js"></script>
</head>

<body class="container-fluid">



    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart    ?>

    <!-- Navigation Bar -->
    <nav id="navbar">
        <div id="navbar-left">
            <!-- Logo -->
            <a id=" navbar-logo">
                <img src="../images/main/test-image.jpeg" class="test-img">
            </a>
            <!-- Navigation Links -->
            <ul id="navbar-links">
                <li>Home</li>
                <li>Products</li>
                <li>About Us</li>
                <li>Contact</li>
            </ul>
        </div>
        <!-- Search Bar / Account / Cart-->
        <div id="navbar-right">
            <ul id="navbar-buttons">
                <li>
                    <input type="text" placeholder="Search">
                </li>
                <li>
                    <a>Account</a>
                </li>
                <li>
                    <!-- Open Shopping Cart -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <div class="card-header imbliss-cart-card-header">
                            <i class="bi bi-cart align-self-right" id="cart-header-icon"></i>Cart
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </nav>


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
    <footer>
        <div id="footer-logo">
            <img src="../images/main/test-image.jpeg" class="test-img">
        </div>
        <div id="footer-links">
            <ul>
                <li>Contact Us</li>
                <li>Privacy Policy</li>
                <li>My Account</li>
                <li>Shop</li>
            </ul>
        </div>
        <div id="footer-contacts">
            <ul>
                <li>+1-510-555-0204</li>
                <li>ImBliss@gmail.com</li>
            </ul>
        </div>
    </footer>
</body>

</html>