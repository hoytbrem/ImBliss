<?php

$cartItems = json_decode('[{"item_id":0,"qty":0,"price":4.99,"sku_price":4.99,"sku":1,"item_img":"../images/main/test-image.jpeg","mini_cart":[]},{"item_id":1,"qty":0,"price":9.99,"sku_price":9.99,"sku":1,"item_img":"../images/main/test-image.jpeg","mini_cart":[{"item_id":3,"sku":1,"item_img":"../images/main/test-image.jpeg","mini_cart":[]}]},{"item_id":2,"qty":0,"price":14.99,"sku_price":14.99,"sku":1,"item_img":"../images/main/test-image.jpeg","mini_cart":[]}]', false);

?>

<!-- Cart Styles -->
<link rel="stylesheet" href="<?php echo $dirLevel ?>theme/cart/cart.css">

<!-- Cart JavaScript -->
<script src="<?php echo $dirLevel ?>src/js/cart.js"></script>

<!-- Offcanvas Cart Container -->
<div class="offcanvas offcanvas-end imbliss-cart" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Your Shopping Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <!-- Cart Item Container -->
    <div class="imbliss-cart-container container-sm">
        <div class="card">

            <!-- Header with Cart Icon -->
            <div class="card-header imbliss-cart-card-header">
                <i class="bi bi-cart align-self-right" id="cart-header-icon"></i>
            </div>
            <ul id="imbliss-cart-list" class="list-group list-group-flush">

                <?php foreach ($cartItems as $item): ?>

                    <!-- New List Item with its own container. -->
                    <li class="list-group-item" id="imbliss-cart-item-id-<?php echo $item->item_id; ?>">
                        <div class="imbliss-cart-item row">
                            <img class="col-sm-12 imbliss-cart-img rounded" src="../images/main/test-image.jpeg" alt="">
                            <h6 class="col-sm-12">
                                <?php echo $item->name ?? "No name" ?>
                            </h6>

                            <!-- Dynamic information goes here, for the quantity integer imbliss-cart-item-qty-id-* for targetting both quantity amounts (using class)
                            imbliss-cart-item-price-id-* for targeting the price (using id) -->

                            <!-- Quantity -->
                            <span class="imbliss-cart-quantity col-sm-12">Quantity: <span
                                    class="imbliss-cart-item-qty-id-<?php echo $item->item_id ?? null ?>">
                                    <?php echo $item->qty ?? null ?>
                                </span></span>

                            <!-- Price -->
                            <span id="imbliss-cart-item-price-id-<?php echo $item->item_id ?? null ?>" class="col-sm-12">
                                <?php echo $item->price ?? null ?>
                            </span>


                            <!-- Quantity Button Group -->

                            <!-- Spacer -->
                            <div class="col-sm-3 mt-3"></div>

                            <!-- Button Group -->
                            <div class="btn-group col-sm-6" role="group" aria-label="cart-btn-group">

                                <!-- Minus Button -->
                                <button type="button" id="imbliss-cart-minus-<?php echo $item->item_id ?? null ?>"
                                    class="btn btn-primary imbliss-cart-minus">&minus;</button>
                                <button type="button" class="btn btn-primary disabled"><span
                                        class="imbliss-cart-item-qty-id-<?php echo $item->item_id ?? null ?>">
                                        <?php echo $item->qty ?? null ?>
                                    </span></button>

                                <!-- Plus Button -->
                                <button type="button" id="imbliss-cart-plus-<?php echo $item->item_id ?? null ?>"
                                    class="btn btn-primary imbliss-cart-plus">&plus;</button>
                            </div>

                            <!-- Spacer -->
                            <div class="col-sm-3"></div>
                        </div>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>

    </div>
</div>