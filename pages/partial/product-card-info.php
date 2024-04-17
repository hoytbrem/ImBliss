<!-- Card Template For the Product Page -->

<div class="col-md-6" style="margin-top: 40px;">
    <div class="">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $i["image"]; ?>" class="img-fluid rounded-start"
                    alt="<?php echo $i["meta_alt_text"]; ?>" />
            </div>
            <div class="col-md-6" style="padding-left: 15px;">
                <div class="card-body">
                    <h4 class="card-title"><Strong><?php echo $i["name"]; ?></Strong></h4>
                    <p class="card-text" style="font-family: sans-serif;"><?php echo $i["description"]; ?></p>
                    <div class="d-flex justify-content-between">
                        <form action="view-product.php" method="GET">
                            <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                            <button type="submit" class="btn view-button">View</a>
                        </form>
                        <button onclick='addItem(` <?php echo json_encode($i) ?> `)' class="btn add-to-cart-button">Add to
                            Cart</button>
                        <button class="btn"><img src="../images/products/heart.svg" alt="star" /></button>
                    </div>
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-4"><img src="../images/products/star-fill.svg" alt="star" /><img
                                    src="<?php echo $dirLevel ?>/images/products/star-fill.svg" alt="star" /><img
                                    src="<?php echo $dirLevel ?>/images/products/star-fill.svg" alt="star" /><img
                                    src="<?php echo $dirLevel ?>/images/products/star-fill.svg" alt="star" /><img
                                    src="<?php echo $dirLevel ?>/images/products/star-fill.svg" alt="star" /></div>
                            <div class="col-5"><span class="ms-2">120 Reviews</span></div>
                            <div class="col-1">
                                <strong class="mt-1">$<?php echo number_format($i["price"], 2); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>