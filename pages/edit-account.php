<?php
session_start();
// Checking that user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    $username = $_SESSION["fName"];
} else {
?>
    <script>
        window.location.replace("login.php");
    </script>
<?php
}

require_once("../src/php/connect-db.php");

$sql = "select * from user where user_id = :user_id";
$statement = $db->prepare($sql);
$statement->bindValue(":user_id", $_SESSION["user-id"]);

if ($statement->execute()) {
    $userAccount = $statement->fetch();
    $statement->closeCursor();
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
    ?>
    <title>Edit User Info</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description" content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <?php include("partial/every-page.html"); ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include("./partial/cart.php"); // Cart 
    ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Account</h5>
                <form action="../profile/process/process-user-account-update.php" method="POST" id="signup-form">
                    <input type="hidden" name="user_id" value="<?php echo $userAccount["user_id"] ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" name="fName" aria-describedby="nameHelp" value="<?php echo $userAccount["user_first_name"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" name="lName" aria-describedby="nameHelp" value="<?php echo $userAccount["user_last_name"] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" value="<?php echo $userAccount["user_email"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputStreetAddress" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="inputStreetAddress" name="streetAddress" aria-describedby="streetAddressHelp" value="<?php echo $userAccount["user_street_address"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city" aria-describedby="cityHelp" value="<?php echo $userAccount["user_city"] ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">State</label>
                            <input type="text" class="form-control" id="inputState" name="state" aria-describedby="stateHelp" value="<?php echo $userAccount["user_state"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="inputZipCode" name="zipCode" aria-describedby="zipCodeHelp" value="<?php echo $userAccount["user_zip_code"] ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </form>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>