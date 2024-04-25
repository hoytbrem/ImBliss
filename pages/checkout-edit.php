<?php session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = htmlspecialchars($_POST["user_id"]);
    $fName = htmlspecialchars($_POST["fName"]);
    $lName = htmlspecialchars($_POST["lName"]);
    $email = htmlspecialchars($_POST["email"]);
    $streetAddress = htmlspecialchars($_POST["streetAddress"]);
    $city = htmlspecialchars($_POST["city"]);
    $state = htmlspecialchars($_POST["state"]);
    $zipCode = htmlspecialchars($_POST["zipCode"]);
    $cardNumber = htmlspecialchars($_POST["cardNumber"]);
    $cardDate = htmlspecialchars($_POST["cardDate"]);
    $cardCSV = htmlspecialchars($_POST["cardCSV"]);
    $success = true;
}

if ($success){
    require_once("../src/php/connect-db.php");

    // Running the sql statement putting the info into the database
    $sql = "update user set user_first_name = :fname, user_last_name = :lname, user_email = :email, user_street_address = :streetAddress, 
    user_city = :city, user_state = :state, user_zip_code = :zipCode, user_card_number = :cardNumber, user_card_date = :cardDate, user_csv = :cardCSV WHERE user_id = :userId";

    $statement = $db->prepare($sql);

    // BINDS
    $statement->bindValue(":userId", $userId);
    $statement->bindValue(":fname", $fName);
    $statement->bindValue(":lname", $lName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":streetAddress", $streetAddress);
    $statement->bindValue(":city", $city);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zipCode", $zipCode);
    $statement->bindValue(":cardNumber", $cardNumber);
    $statement->bindValue(":cardDate", $cardDate);
    $statement->bindValue(":cardCSV", $cardCSV);

    if ($statement->execute()) {
        $statement->closeCursor();
        // Message that will display for the user letting them know their account was created
        $userMessage = "<h4>The account has been updated! You will be redirected in 5 seconds.</h4>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    $_SESSION["cart_items"] = "somethin";
    // Header Includes
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"  
    include ("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include ("{$dirLevel}pages/partial/header.php");
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    include ("{$dirLevel}src/php/grab-cart-variables.php");
    grabCartVariables($dirLevel); // Grabs cart variables, sends to index if none exist. ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main>
        <div class="container">
            <div class="row">
                <!-- Left side -->
                <div class="col-md-8">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Checkout</h4>
                        <a href="product-page.php">Back to shopping</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Continue as Guest</h5>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Shipping</h5>
                            <p><?php if($success){ echo $streetAddress . " " . $city . ", " . $state ;}?></p>
                        </div>
                        <a href="checkout-form.php">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Delivery</h5>
                            <p>Delivery option</p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5>Payment</h5>
                            <p>Card Ending in <?php if($success){ echo substr($cardNumber ,-4) ;}?></p>
                        </div>
                        <a href="#">Edit</a>
                    </div>
                    <hr>
                    <h5>Everything look good?</h5>
                    <button type="submit" class="btn btn-primary mb-3">Place Order</button>
                </div>
                <!-- Right side -->
                <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Order Summary</h4>
                        <a href="#">Edit</a>
                    </div>
                    <!-- Order items go here -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>$0.00</span>
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
                        <h5>$0.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>
