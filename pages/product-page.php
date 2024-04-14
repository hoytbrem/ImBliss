<?php 
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>

    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>

    <title>Product Page</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />

    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <?php include ("./partial/cart.php");?>
    <?php include("./partial/nav.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Filter Section -->
            <div class="col-2">
                <div class="list-group">
                    <h5 class="mb-3">Filter by:</h5>
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
                            <input class="form-check-input" type="checkbox" name="filter" id="filter3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter4">Granola</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="checkbox" name="filter" id="filter4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter5">Merch</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="checkbox" name="filter" id="filter5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter6">New Arrivals</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="checkbox" name="filter" id="filter6">
                        </div>
                    </div>
                    <div class="mb-3"></div> <!-- Little space -->
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter7">Price low to high</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="radio" name="filter" id="filter7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter8">Price high to low</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="radio" name="filter" id="filter8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-check-label" for="filter9">Highest rating</label>
                        </div>
                        <div class="col-3 text-end">
                            <input class="form-check-input" type="radio" name="filter" id="filter9">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-9">
                <div class="row">
                    <?php include("./partial/product.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>