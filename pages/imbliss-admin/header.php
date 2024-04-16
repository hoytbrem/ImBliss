<!DOCTYPE html>
<html lang="en">

<head>

    <?php

    require_once ("../../src/php/connect-db.php");

    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Normalizing CSS Sheet -->
    <link rel="stylesheet" href="./styles/normalize.css">

    <!-- Bootstrap Core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cart Styles -->
    <link rel="stylesheet" href="./styles/cart.css">

    <link rel="stylesheet" href="./styles/style.css">


    <title>Imbliss - Product Editor</title>
</head>

<body class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded p-3 mt-3">
        <a class="navbar-brand" href="index.php">Imbliss Product Editor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin-product-control.php">New Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="edit.php">Product Editor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin.php">Back To Admin Panel</a>
                </li>
            </ul>

        </div>
    </nav>

    <main class="mt-5 rounded">

        <div class="row d-flex justify-content-center rounded">