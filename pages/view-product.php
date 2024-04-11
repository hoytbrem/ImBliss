<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>

    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>

    <title>Product Page</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />

    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <?php include ("./partial/cart.php");?>
    <?php include("./partial/nav.php"); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="product-image.jpg" class="img-fluid" alt="Product Image">
                <div class="row mt-3">
                    <div class="col"><img src="preview1.jpg" class="img-fluid" alt="Preview Image 1"></div>
                    <div class="col"><img src="preview2.jpg" class="img-fluid" alt="Preview Image 2"></div>
                    <div class="col"><img src="preview3.jpg" class="img-fluid" alt="Preview Image 3"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Product Name</h2>
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                        class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                        class="bi bi-star-half"></span>120 reviews</p>
                <h4>$7.90</h4>
                <p>Product description goes here. More info about the product can go under details</p>
                <div class="accordion" id="productAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                Product details...
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Shipping & Handling
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                Shipping and handling details...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group mt-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">-</button>
                    <input type="text" class="form-control quantity-input" placeholder="1"
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                </div>
                <button class="btn btn-primary mt-3"><span class="bi bi-heart"></span> Add to Cart</button>
            </div>
        </div>
        <div>
            <!-- reviews -->
            <div class="row">
                <h3>Reviews</h3>
                <div class="col-md-3">
                    <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-half"></span> 5 stars</p>
                    <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                        product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                    <h6>By: name here</h6>
                </div>
                <div class="col-md-3">
                    <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-half"></span> 5 stars</p>
                    <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                        product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                    <h6>By: name here</h6>
                </div>
                <div class="col-md-3">
                    <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-half"></span> 5 stars</p>
                    <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                        product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                    <h6>By: name here</h6>
                </div>
                <div class="col-md-3">
                    <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span
                            class="bi bi-star-half"></span> 5 stars</p>
                    <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                        product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                    <h6>By: name here</h6>
                </div>
            </div>
        </div>

        <?php include("./partial/footer.html"); ?>
</body>

</html>