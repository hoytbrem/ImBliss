<?php

function grabCartVariables($dirLevel)
{
    if (!isset($_COOKIE["cart_items"])) {
        header("Location: {$dirLevel}pages/");
        exit();
    }
}