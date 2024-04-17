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
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/main-page.css" />
    <title><?php echo $item["meta_title"]?></title>
    <meta name="title" content="<?php echo $item["meta_title"]?>" />
    <meta name="description" content="<?php echo $item["meta_description"]?>" />
    <meta name="keywords" content="<?php echo $item["meta_keywords"]?>" />
</head>

<body>
    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); // Cart ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $item["image"];?>" class="img-fluid" alt="Product Image">
                <div class="row mt-3">
                    <div class="col"><img src="preview1.jpg" class="img-fluid" alt="Preview Image 1"></div>
                    <div class="col"><img src="preview2.jpg" class="img-fluid" alt="Preview Image 2"></div>
                    <div class="col"><img src="preview3.jpg" class="img-fluid" alt="Preview Image 3"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h2><?php echo $item["name"]; ?></h2>
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-half"></span>120 reviews</p>
                <h4>$<?php echo number_format($item["price"], 2); ?></h4>
                <p><?php echo $item["description"]; ?></p>
                <div class="accordion" id="productAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                Product details...
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Shipping & Handling
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                Shipping and handling details...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group mt-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">-</button>
                    <input type="text" class="form-control quantity-input" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
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
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-half"></span> 5 stars</p>
                <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                    product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                <h6>By: name here</h6>
            </div>
            <div class="col-md-3">
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-half"></span> 5 stars</p>
                <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                    product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                <h6>By: name here</h6>
            </div>
            <div class="col-md-3">
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-half"></span> 5 stars</p>
                <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                    product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                <h6>By: name here</h6>
            </div>
            <div class="col-md-3">
                <p><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-half"></span> 5 stars</p>
                <p>Great product!Great product!Great product!Great product!Great product!Great product!Great
                    product!Great product!Great product!Great product!Great product!Great product!Great product!</p>
                <h6>By: name here</h6>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>