<!-- Card Template For the Product Page -->

<div class="col-md-6">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $i["image"]; ?>" class="img-fluid rounded-start" alt="<?php echo $i["meta_alt_text"]; ?>" />
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $i["name"]; ?></h5>
                    <p class="card-text"><?php echo $i["description"]; ?></p>
                    <div class="d-flex justify-content-between">
                        <form action="view-product.php" method="GET">
                            <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                            <button type="submit" class="btn btn-view">View</a>
                        </form>
                        <button class="btn btn-add-to-cart">Add to Cart</button>
                        <img src="../images/product-page-assets/suit-heart.svg" type="button" alt="Heart icon to mark a favorite item">
                    </div>
                    <div class="mt-2">
                        <span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star"></span>
                        <!-- Add more stars as needed -->
                        <span class="ms-2">120 Reviews</span>
                        <p class="mt-1 price">$<?php echo number_format($i["price"], 2); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>