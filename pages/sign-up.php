<?php
    session_start();
    // Checking if there is a user in session. If so it sends them back to the homepage
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        ?>
<script>
window.location.replace("index.php");
</script>
<?php
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
    renderHeader("Sign Up", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" href="<?php echo $dirLevel ?>/theme/sign-up/sign-up.css" />

</head>

<body>
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>

    <main class="d-flex align-items-center justify-content-center"
        style="height: 80vh; background: url('../images/sign-up/organic-natural-display.jpg') no-repeat; background-size: cover;">
        <div class="card " style="width: 40rem;">

            <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <h6 class="card-subtitle mb-2 text-muted text-center">Already have an account? <a
                        href="./login.php">Login</a></h6>
                <form action="../profile/process/process-account.php" method="POST" id="signup-form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control input-box" id="inputFirstName" name="fName"
                                aria-describedby="nameHelp" placeholder="First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control input-box" id="inputLastName" name="lName"
                                aria-describedby="nameHelp" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control input-box" id="inputEmail" name="email"
                            aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control input-box" id="inputPassword" name="tpassword"
                            placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control input-box" id="inputPasswordConfirm"
                            placeholder="Confirm Password">
                    </div>

                    <!-- Placeholder Password Confirmation. Will display an alert if the passwords do not match. -->
                    <script>
                    document.getElementById("signup-form").addEventListener("submit", function(event) {
                        var password = document.getElementById("inputPassword").value;
                        var confirmPassword = document.getElementById("inputPasswordConfirm").value;

                        if (password !== confirmPassword) {
                            alert("Passwords do not match");
                            event.preventDefault();
                        }
                    });
                    </script>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-primary sign-up">Sign Up</button>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <p>or sign up with</p>
                        </div>
                        <div>
                            <img src="<?php echo $dirLevel?>/images/login/google.svg" alt="Google Login"
                                style="width: 20px; height: 20px;">
                            <img src="<?php echo $dirLevel?>/images/login/facebook.svg" alt="Facebook Login"
                                style="width: 20px; height: 20px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>