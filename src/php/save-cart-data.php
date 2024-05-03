<?php
function saveCartItems($cart_items)
{
    $_SESSION["cart_items"] = $cart_items;
    echo "session cart items: " . $_SESSION["cart_items"];
}

