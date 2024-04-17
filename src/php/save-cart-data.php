<?php

function saveCartItems($cart_items)
{
    if ($_SERVER["REQUEST_METHOD"] = "POST") {
        $_SESSION["cart_items"] = json_decode($cart_items);
        return "success";
    } else {
        return "noGet";
    }
}

