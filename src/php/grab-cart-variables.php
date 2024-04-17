<?php

function grabCartVariables($dirLevel)
{
    if (!isset($_SESSION["cart_items"])) {
        header("Location: {$dirLevel}/pages/");
        exit();
    }
}