<?php
session_start();
// Checking that user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    $username = $_SESSION["fName"];
} else {
?>
<script>
//window.location.replace("login.php");
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
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Edit Account", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include("./partial/cart.php"); renderCart($dirLevel); // Cart 
    ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Account</h5>
                <form action="../profile/process/process-user-account-update.php" method="POST" id="edit-form">
                    <input type="hidden" name="user_id" value="<?php echo $userAccount["user_id"] ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" name="fName"
                                aria-describedby="nameHelp" value="<?php echo $userAccount["user_first_name"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" name="lName"
                                aria-describedby="nameHelp" value="<?php echo $userAccount["user_last_name"] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                            aria-describedby="emailHelp" value="<?php echo $userAccount["user_email"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputStreetAddress" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="inputStreetAddress" name="streetAddress"
                            aria-describedby="streetAddressHelp"
                            value="<?php echo $userAccount["user_street_address"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" name="city" aria-describedby="cityHelp"
                            value="<?php echo $userAccount["user_city"] ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">State</label>
                            <input type="text" class="form-control" id="inputState" name="state"
                                aria-describedby="stateHelp" value="<?php echo $userAccount["user_state"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="inputZipCode" name="zipCode"
                                aria-describedby="zipCodeHelp" value="<?php echo $userAccount["user_zip_code"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password"
                                aria-describedby="passwordHelp" value="<?php echo $userAccount["user_password"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputStreetAddress" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="confirmPassword"
                                aria-describedby="confirmPasswordHelp"
                                value="<?php echo $userAccount["user_password"] ?>">
                        </div>
                        <!-- Placeholder Password Confirmation. Will display an alert if the passwords do not match. -->
                        <script>
                        document.getElementById("edit-form").addEventListener("submit", function(event) {
                            var password = document.getElementById("inputPassword").value;
                            var confirmPassword = document.getElementById("inputPasswordConfirm").value;

                            if (password !== confirmPassword) {
                                alert("Passwords do not match");
                                event.preventDefault();
                            }
                        });
                        </script>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Account</button>
                </form>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>