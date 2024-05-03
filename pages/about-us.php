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
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("About Us", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/about-us/about.css" />
</head>

<body class="container-fluid" id="indexBody">

    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); renderCart($dirLevel); // Cart ?>

    <!-- Banner Image with About Us -->
    <div class="text-center bg-image banner"
        style="background-image: url('<?php echo $dirLevel ?>/images/about/fruit-nuts-display.jpg');">
        <div class="mask d-flex justify-content-center align-items-center">
            <h1>About Us</h1>
        </div>
    </div>

    <!-- Our Mission & Vision -->
    <div class="row bg-light" style="width: 95%; margin: auto;">
        <div class="col-md-6 p-5">
            <h2>Our Mission & Vision</h2>
            <p>At ImBliss we strive to offer tasty, healthy, and environmentally friendly snacks as opposed to your
                usual go-to that leaves you feeling down about yourself. We are firm believers that, “You are what you
                eat.” So, it is our top priority to provide nutritional snacks that benefit your health and well-being.
                We want you to feel good and look good! How do we accomplish this? We source all our ingredients from
                environmentally friendly & organic suppliers.</p>
            <p> In 2024, we plan to support local businesses and
                farmer's
                markets through campaigning, as well as donating 12% of our earnings to the Worldwide Fund for Nature.
            </p>
        </div>
        <div class="col-md-6">
            <img src="../images/about/natural-organic-garden copy.jpg" class="img-fluid" alt="Image"
                style="max-width: 80%; margin: 50px; border-radius: 30px;">
        </div>
    </div>

    <!-- Meet The Team -->
    <div class="text-center my-5 meet-the-team">
        <h2>Meet The Team</h2>
        <div class="row">
            <div class="col-md-3">
                <img src="../images/about/employee-headshot1.jpg" class="img-fluid headshot-circle" alt="Image">
                <h3>Stacy</h3>
                <p>Co-Founder & Chief Executive Officer</p>
                <p>Stacy is the CEO of ImBliss. With her strong leadership skills and passion for healthy snacks, she
                    has successfully guided the company towards its mission of offering tasty, healthy, and
                    environmentally friendly snacks. </p>
            </div>
            <div class="col-md-3">
                <img src="../images/about/employee-headshot2.jpg" class="img-fluid headshot-circle" alt="Image">
                <h3>Lily Martinez</h3>
                <p>Sustainability Coordinator & Community Engagement </p>
                <p>With a deep commitment to protecting the
                    planet and empowering local communities, she oversees our sustainability initiatives and community
                    outreach programs.</p>
            </div>
            <div class="col-md-3">
                <img src="../images/about/employee-headshot3.jpg" class="img-fluid headshot-circle" alt="Image">
                <h3>Sophia Carter</h3>
                <p>Head of Product Development & Nutrition</p>
                <p>With her extensive knowledge of
                    dietary science and a keen eye for flavor, she crafts delicious and nutritious recipes that nourish
                    both body and soul. </p>
            </div>
            <div class="col-md-3">
                <img src="../images/about/employee-headshot4.jpg" class="img-fluid headshot-circle" alt="Image">
                <h3>Grace Thompson</h3>
                <p>Marketing & Communications Manager</p>
                <p> With her
                    strategic vision and artistic flair, she brings our brand to life through engaging storytelling and
                    captivating visuals. </p>
            </div>
        </div>
    </div>

    <!-- Company Story -->
    <div class="row" style="background: #F4F1F0 0% 0% no-repeat padding-box; width: 95%; margin: auto;">
        <div class="col-md-6">
            <img src="../images/about/ImBliss-healthy-bars-display.jpg" class="img-fluid" alt="Image"
                style="width: 80%; margin: 50px; border-radius: 30px;">
        </div>
        <div class="col-md-6 p-5 text-left">
            <h2>Company Story</h2>
            <p>At ImBliss we strive to offer tasty, healthy, and environmentally friendly snacks as opposed to your
                usual go-to that leaves you feeling down about yourself. We are firm believers that, “You are what
                you
                eat.” So, it is our top priority to provide nutritional snacks that benefit your health and
                well-being.
                We want you to feel good and look good! How do we accomplish this? We source all our ingredients
                from
                environmentally friendly & organic suppliers. At ImBliss we strive to offer tasty, healthy, and
                environmentally friendly snacks as opposed to your usual go-to that leaves you feeling down about
                yourself. We are firm believers that, “You are what you eat.” So, it is our top priority to provide
                nutritional snacks that benefit your health and well-being. We want you to feel good and look good!
                How
                do we accomplish this? We source all our ingredients from environmentally friendly & organic
                suppliers.
            </p>
        </div>
    </div>

    <!-- Full Width Image with Text -->
    <div class="text-center bg-image full-width-image"
        style="background-image: url('../images/about/ImBliss-healthy-bars-display2.jpg');">
        <div class="mask d-flex justify-content-center align-items-center padding-box">
            <h1 style="background: #FFFFFF 0% 0% no-repeat; border-radius: 35px; opacity: 0.75;">
                ImBliss, The Snack With No Downside!</h1>
        </div>
    </div>

    <!-- Our Green Promise -->
    <div class="row" style="background-color: #D3E1DB;">
        <div class="col-md-6 p-5">
            <h2>Our Green Promise</h2>
            <p>Sample text for our green promise. Here we would talk about our commitment to the environment and our
                partner EcoEnclose for sustainable packaging.Sample text for our green promise. Here we would talk
                about
                our commitment to the environment and our partner EcoEnclose for sustainable packaging.Sample text
                for
                our green promise. Here we would talk about our commitment to the environment and our partner
                EcoEnclose
                for sustainable packaging.Sample text for our green promise. Here we would talk about our commitment
                to
                the environment and our partner EcoEnclose for sustainable packaging.Sample text for our green
                promise.
                Here we would talk about our commitment to the environment and our partner EcoEnclose for
                sustainable
                packaging.</p>
        </div>
        <div class="col-md-6">
            <img src="../images/about/natural-futuristic-display copy.jpg" class="img-fluid" alt="Image"
                style="max-width: 80%; margin: 50px; border-radius: 30px;">
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>