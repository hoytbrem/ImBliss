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
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Product View", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/main-page.css" />
    <link rel="stylesheet" type="text/css" href="../theme/view-page/stylesheet.css" />
    <title><?php echo $item["meta_title"]?></title>
    <meta name="title" content="<?php echo $item["meta_title"]?>" />
    <meta name="description" content="<?php echo $item["meta_description"]?>" />
    <meta name="keywords" content="<?php echo $item["meta_keywords"]?>" />
</head>

<body>
    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); renderCart($dirLevel); // Cart ?>
    <div class="container mt-5">
        <div class="row product">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $item["image"];?>" class="img-fluid product_img"
                    alt="<?php echo $item["meta_alt_text"]?>">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
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
                                <?php echo $item["description"]; ?>
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
                <button class="btn btn-add-to-cart mt-3"><span><img src="../images/view-page-assets/cart.svg"></span>Add
                    to Cart</button>
                <div class="input-group mt-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">-</button>
                    <span><input type="text" class="form-control quantity-input" style="width: 40px" placeholder="1"
                            aria-label="Example text with button addon" aria-describedby="button-addon1"></span>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                </div>
            </div>
        </div>
        <div>
            <!-- reviews -->
            <div class="row review">
                <div class="col-md-3">
                    <p><span><img src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_empty.png" alt="image of a grey star"></span></p>
                    <p>Great product!</p>
                    <h6>By: Ashley Johnson</h6>
                </div>
                <div class="col-md-3">
                    <p><span><img src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_empty.png" alt="image of a grey star"></span></p>
                    <p>These are my favorites</p>
                    <h6>By: Casey Brown </h6>
                </div>
                <div class="col-md-3">
                    <p><span><img src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_empty.png" alt="image of a grey star"></span></p>
                    <p>I love having these before going to work!</p>
                    <h6>By: Morgan Davis</h6>
                </div>
                <div class="col-md-3">
                    <p><span><img src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span><span><img
                                src="../images/view-page-assets/star_filled.png"
                                alt="image of a blue star"></span></span></p>
                    <p>Possibly one of the best snacks I have had 5 STARS!!</p>
                    <h6>By: Taylor Johnson</h6>
                </div>
            </div>
        </div>
        <?php include("./partial/footer.html"); ?>
</body>

</html>