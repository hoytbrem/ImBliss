<!-- Cart Styles -->
<link rel="stylesheet" href="<?php echo $dirLevel ?>theme/cart/cart.css">

<!-- Cart JavaScript -->
<script src="<?php echo $dirLevel ?>src/js/cart.js"></script>

<!-- Cart Item Container -->
<div class="row" id="cartRow">
    <div class="imbliss-cart-controlled-container" id="cartCollapse">
        <div class="d-flex justify-content-end">

            <div class="imbliss-cart-container">
                <div class="row" id="imbliss-cart-toolbar-row">
                    <div class="col-sm-9" id="cart-header">
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="col-sm-3" id="cart-item-count-header">
                        <h3 id="cart-item-count">4 Items</h3>
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
                        <p id="subTotal">&dollar;24.00</p>
                    </div>
                    <button class="col-sm-3" id="checkOut">Checkout</button>
                    <form action="POST">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>