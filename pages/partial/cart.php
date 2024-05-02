<!-- Cart Styles -->
<link rel="stylesheet" href="<?php echo $dirLevel ?>theme/cart/cart.css">

<!-- Cart JavaScript -->
<script src="<?php echo $dirLevel ?>src/js/cart.js"></script>
<script src="<?php echo $dirLevel ?>src/js/function-helpers.js"></script>
<script src="<?php echo $dirLevel ?>src/js/Item.js"></script>

<?php function renderCart($dirLevel)
{ ?>
    <!-- Cart Item Container -->
    <div class="row" id="cartRow">
        <div class="imbliss-cart-controlled-container" id="cartCollapse">
            <div class="d-flex justify-content-end">
                <form id="cartCheckoutButton" action="<?php echo $dirLevel ?>pages/checkout.php"
                    class="imbliss-cart-container" method="POST">

                    <div class="row" id="imbliss-cart-toolbar-row">
                        <div class="col-sm-9" id="cart-header">
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="col-sm-3" id="cart-item-count-header">
                            <h3 id="cart-item-count">No Items</h3>
                        </div>
                    </div>
                    <div id="cartOverflow" class="cart">
                        <ul id="imbliss-cart-list" class="list-group mb-2">
                        </ul>
                    </div>
                    <div class="row" id="imbliss-cart-footer-row">
                        <div class="col-sm-6" id="cart-footer">
                            <h3 id="totalFooterText">Total</h3>
                        </div>
                        <div class="col-sm-3" id="totalContainer">
                            <p id="subTotal">&dollar;0.00</p>
                        </div>
                        <button type="submit" class="col-sm-3" id="checkOut">Checkout</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<?php function renderItemContainer()
{ ?>

    <div style="visibility: hidden;">
        <!-- Cart Item Container -->
        <div class="row" id="cartRow">
            <div class="imbliss-cart-controlled-container" id="cartCollapse">
                <div class="d-flex justify-content-end">
                    <form id="cartCheckoutButton" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="imbliss-cart-container"
                        method="POST">

                        <div class="row" id="imbliss-cart-toolbar-row">
                            <div class="col-sm-9" id="cart-header">
                                <h3>Shopping Cart</h3>
                            </div>
                            <div class="col-sm-3" id="cart-item-count-header">
                                <h3 id="cart-item-count">No Items</h3>
                            </div>
                        </div>

                        <div class="row" id="imbliss-cart-footer-row">
                            <div class="col-sm-6" id="cart-footer">
                                <h3 id="totalFooterText">Total</h3>
                            </div>
                            <div class="col-sm-3" id="totalContainer">
                                <p id="subTotal">&dollar;0.00</p>
                            </div>
                            <button class="col-sm-3" id="checkOut">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div id="" class="col-sm-12">
            <ul id="imbliss-cart-list" class="list-group mb-2 imbliss-checkout-container">
            </ul>
        </div>
    </div>

<?php } ?>