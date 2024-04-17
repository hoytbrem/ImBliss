<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <?php // <!-- Header Includes -->
    include("../src/php/function-helpers.php"); // Various helpful functions    
    ?>

    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   
    ?>

    <title>Product Page</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../theme/style.css" />
    <link rel="stylesheet" href="../theme/product/product-page.css" />

    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <?php include("./partial/cart.php"); ?>
    <?php include("./partial/nav.php"); ?>
    <div>
        <div class="row">
            <!-- Filter Section -->
            <div class="col-2"
                style="background: linear-gradient(180deg, #FFFFFF 0%, #FFFFFFC9 65%, #FFFFFF69 87%, #FFFFFF00 100%) 0% 0% no-repeat, url('../images/products/natural-vibrant-display.jpg'); max-height: 700px;">
                <div class="list-group" style=" margin: 10px; margin-left: 50px; margin-top: 50px;">
                    <form id="filterForm">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter1">ImBliss Bars</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="checkbox" name="filter" id="filter1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-check-label" for="filter2">ImBliss Variety Pack</label>
                            </div>
                            <div class="col-2 text-end">
                                <input class="form-check-input" type="checkbox" name="filter" id="filter2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter3">Energy Bites</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="checkbox" name="filter" id="filter3"
                                    value="energy bites">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter4">Granola</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="checkbox" name="filter" id="filter4"
                                    value="granola">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter5">Merch</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="checkbox" name="filter" id="filter5"
                                    value="merch">
                            </div>
                        </div>
                        <div class="mb-3"></div> <!-- Little space -->
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter7">Price low to high</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="radio" name="sort" id="sortLowToHigh">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter8">Price high to low</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="radio" name="sort" id="sortHighToLow">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label" for="filter9">Highest rating</label>
                            </div>
                            <div class="col-3 text-end">
                                <input class="form-check-input" type="radio" name="sort" id="sortHighestRating">
                            </div>
                        </div>
                    </form>
                    <script src="../src/js/filter.js"></script>
                </div>
            </div>
            <!-- Product Grid -->
            <div class="col-9">
                <div class="container">
                    <div id="filteredProducts" class="container row" style="margin-top: 50px;">
                        <!-- Filtered items will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>