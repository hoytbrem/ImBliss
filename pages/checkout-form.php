<?php session_start();

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
    require_once("../src/php/connect-db.php");

    $sql = "select * from user where user_id = :user_id";
    $statement = $db->prepare($sql);
    $statement->bindValue(":user_id", $_SESSION["user-id"]);

    if ($statement->execute()) {
        $userAccount = $statement->fetch();
        $statement->closeCursor();
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php // <!-- Header Includes -->
    include("../src/php/function-helpers.php"); // Various helpful functions    
    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"  
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php");
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include("{$dirLevel}src/php/grab-cart-variables.php");
    grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist. 
    ?>

    <!-- <?php
            // <!-- Header Includes -->
            // include ("../src/php/function-helpers.php"); // Various helpful functions    
            // $dirLevel = getDirLevel(1); // this will return "../" 
            //include("{$dirLevel}partial/every-page.html"); // Google Analytics
            // include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
            ?> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/contact/contact.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/checkout/checkout.css" />
</head>

<body class="container-fluid">
        <?php include("./partial/nav.php"); ?>
        <?php
        // <!-- Other Includes -->
        include("./partial/cart.php"); renderCart($dirLevel); // Cart 
        ?>
    <div class="row mb-5"></div>
    <main class="d-flex align-items-center justify-content-center container-fluid" style="height: 80vh;">

        <div class="container-fluid mt-5">
            <div class="row">
                <!-- Left side -->
                <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Checkout</h4>
                        <a href="product-page.php">Back to shopping</a>
                    </div>
                    <div>
                        <h5>Where's This Order Going?</h5>
                        <form action="checkout-edit.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $userAccount["user_id"] ?>">
                            <div class="row">
                                <div class="mb-2 col-md-6">
                                    <input class="form-control" type="text" placeholder="First Name" name="fName" value="<?php if(isset($userAccount)){echo $userAccount["user_first_name"];} ?>" required>
                                </div>
                                <div class="mb-2 col-md-6">
                                    <input class="form-control" type="text" placeholder="Last Name" name="lName" value="<?php if(isset($userAccount)){echo $userAccount["user_last_name"];} ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-md-12">
                                    <input class="form-control" type="text" placeholder="Address" name="streetAddress" value="<?php if(isset($userAccount)){echo $userAccount["user_street_address"];} ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <input class="form-control" type="text" placeholder="City" name="city" value="<?php if(isset($userAccount)){echo $userAccount["user_city"];} ?>" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <input class="form-control" type="text" placeholder="State" name="state" value="<?php if(isset($userAccount)){echo $userAccount["user_state"];} ?>" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <input class="form-control" type="text" placeholder="Zip Code" name="zipCode" value="<?php if(isset($userAccount)){echo $userAccount["user_zip_code"];} ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <input class="form-control" type="email" placeholder="Email" name="email" value="<?php if(isset($userAccount)){echo $userAccount["user_email"];} ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <h4>What's your payment information?</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Enter Your card information</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" mb-4 col-md-6">
                                    <input class="form-control" type="text" placeholder="Card Information" name="cardNumber" value="<?php if(isset($userAccount)){echo $userAccount["user_card_number"] ?? "";} ?>" required>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" placeholder="Date" name="cardDate" value="<?php if(isset($userAccount)){echo $userAccount["user_card_date"] ?? "";} ?>" required>
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" placeholder="CSV" name="cardCSV" value="<?php if(isset($userAccount)){echo $userAccount["user_csv"] ?? "";} ?>" required>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                    <button class="btn btn-primary wide-btn">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <div class="col-sm-12 d-flex">
                            <h4 class="mb-0 col-sm-3">Order Summary</h4>
                            <p class="item-count col-sm-6 text-end" style="padding-right: 5px;">6 items</p>
                            <a href="#" class="col-sm-3">Edit</a>
                        </div>
                        <!-- Order items go here -->
                                                <!-- Order items go here -->
                                                <div id="checkoutCartContainer" class="row">
                            <?php

                            $cart_items = json_decode($_COOKIE["cart_items"]);

                            renderItemContainer();
                            ?>
                    </div>
                </div>



                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="subTotal">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5>Estimated Total</h5>
                    <h5 id="totalFooterText">$0.00</h5>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php include ("./partial/footer.html"); ?>
</body>

</html>
