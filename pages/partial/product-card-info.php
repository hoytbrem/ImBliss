<!-- Card Template For the Product Page -->

<div class="col-md-6" style="margin-top: 40px;">
    <div class="">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="../images/product-images/<?php echo $i["image"]; ?>" class="img-fluid rounded-start" alt="<?php echo $i["meta_alt_text"]; ?>" />
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
                        <button onclick='addItem(<?php echo $i["item_id"]; ?>)' class="btn add-to-cart-button">Add to Cart</button>

                        <!-- Putting in either a full heart or an empty head depending on it an item is added to a user's favorites. -->
                        <?php
                            if(isset($favoriteItemCheck) && in_array($i["item_id"], array_column($favoriteItems, "item_id")) ){
                                    ?>
                                        <form action="../profile/process/process-remove-favorite.php" method="POST">
                                            <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                            <button id="item-favorite" class="btn"><img src="../images/product-page-assets/suit-heart-filled.svg" alt="A favorite heart icon"></button>
                                        </form>
                                    <?php
                                }
                            else{
                                ?>
                                    <form action="../profile/process/process-add-favorite.php" method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                        <button id="item-favorite" class="btn"><img src="../images/product-page-assets/suit-heart.svg" alt="An empty favorite heart icon"></button>
                                    </form>
                                <?php
                            }
                        ?>


                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-5">
                                <img src="../images/products/star-fill.svg" alt="star" />
                                <img src="../images/products/star-fill.svg" alt="star" />
                                <img src="../images/products/star-fill.svg" alt="star" />
                                <img src="../images/products/star-fill.svg" alt="star" />
                                <img src="../images/products/star-fill.svg" alt="star" />
                            </div>
                            <div class="col-4"><span class="ms-2">50 Reviews</span></div>
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