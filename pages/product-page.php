<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/main-page.css" />
    <link rel="stylesheet" type="text/css" href="../theme/product-page/stylesheet.css"/>
    <title><?php echo $item["meta_title"]?></title>
    <meta name="title" content="<?php echo $item["meta_title"]?>" />
    <meta name="description" content="<?php echo $item["meta_description"]?>" />
    <meta name="keywords" content="<?php echo $item["meta_keywords"]?>" />

    <script>
        // Embedding PHP into JavaScript to pass the $_GET["search_query"] value
        var searchQuery = "<?php echo isset($_GET["search_query"]) ? $_GET["search_query"] : '' ?>";
    </script>
</head>

<body>
    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); // Cart ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Filter Section -->
            <div class="col-2">
                <div class="list-group">
                    <h5 class="mb-3">Filter by:</h5>
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
                    <!-- <img id="background-leaves" src="../images/product-page-assets/leafy-background.png"> -->
                </div>
            </div>
            <div>
            </div>
            <!-- Product Grid -->
            <div class="col-9">
                <div class="row">
                    <div id="filteredProducts">
                        <!-- Filtered items will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>