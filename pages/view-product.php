<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $item_id = $_GET["item_id"];
    }

    require_once("../src/php/connect-db.php");

    $sql = "SELECT item.*,
    meta.description AS meta_description,
    meta.title AS meta_title,
    meta.keywords AS meta_keywords,
    meta.robots AS meta_robots,
    meta.alt_text AS meta_alt_text
    FROM item INNER JOIN meta ON item.meta_id = meta.meta_id WHERE item.item_id = :item_id";
    
    $statement = $db->prepare($sql);
    $statement->bindValue(":item_id", $item_id);

    if ($statement->execute()) {
        $item = $statement->fetch();
        $statement->closeCursor();
    }

?>
<!DOCTYPE html>
<html>

<head>
    <?php // <!-- Header Includes -->
    include("../src/php/function-helpers.php"); // Various helpful functions    
    ?>

    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   
    ?>

    <title><?php echo $item["meta_title"]?></title>
    <!-- <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description" content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" /> -->
    <meta name="title" content="<?php echo $item["meta_title"]?>" />
    <meta name="description" content="<?php echo $item["meta_description"]?>" />
    <meta name="keywords" content="<?php echo $item["meta_keywords"]?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../theme/style.css">
    <link rel="stylesheet" href="../theme/view-product/view-product.css">



    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <!-- <?php echo $userMessage; ?> -->
    <?php include("./partial/cart.php"); ?>
    <?php include("./partial/nav.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $item["image"];?>" class="img-fluid" alt="Product Image">

            </div>
            <div class="col-md-6">
                <h2><?php echo $item["name"]; ?></h2>
                <p><img src="../images/products/star-fill.svg" alt="heart"><img src="../images/products/star-fill.svg"
                        alt="heart"><img src="../images/products/star-fill.svg" alt="heart"><img
                        src="../images/products/star-fill.svg" alt="heart"><img src="../images/products/star-fill.svg"
                        alt="heart">120 reviews</p>
                <h4>$<?php echo number_format($item["price"], 2); ?></h4>
                <p><?php echo $item["description"]; ?></p>
                <div class="accordion no-border" id="productAccordion">
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
                    <hl style="margin-top: 10px; margin-bottom: 10px;" />
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
                <button class="btn mt-3" style="background: #FF6421; border-radius: 30px; color: white;"><img
                        src="../images/products/cart3.svg" alt="shopping cart"> Add to
                    Cart</button>
            </div>
        </div>
        <div>
            <!-- reviews -->
            <div class="row" style="margin-top: 2%; margin-bottom: 2%;">
                <h3>Reviews</h3>
                <div class="col-md-3">
                    <h4>"Wonderful Product!"</h4>
                    <p>This was such a wonderful product. It arrived in the mail and I was super happy with the quality
                        of it just WOW</p>
                    <h6>By: Terry</h6>
                </div>
                <div class="col-md-3">
                    <h4>"Delicious"</h4>
                    <p>Never had a better tasting product I LOOOOVVE this</p>
                    <h6>By: Abigail</h6>
                </div>
                <div class="col-md-3">
                    <h4>"Good"</h4>
                    <p>good</p>
                    <h6>By: Payton</h6>
                </div>
                <div class="col-md-3">
                    <h4>"Great product!"</h4>
                    <p>This is completely right up my alley! Blown away</p>
                    <h6>By: Amy</h6>
                </div>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>