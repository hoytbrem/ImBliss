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
    <?php // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>
    <title>Login</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../theme/style.css">
    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center"
        style="height: 80vh; width: auto ;background: url('../images/login/organic-natural-display.jpg'); background-size: cover;">
        <div class="card" style="width: 30rem; padding-top: 70px; padding-bottom: 70px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                <h5 class="card-title text-center" style="padding-bottom: 40px;">Login</h5>
                <form action="../profile/process/process-login.php" method="POST" style="width: 80%;">
                    <div class="mb-3" style="width: 100%;">
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            aria-describedby="emailHelp" placeholder="Email Address"
                            style="background: #D5EDEC; border-radius: 21px">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="tpassword"
                            placeholder="Password" style="background: #D5EDEC; border-radius: 21px">
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="background: #32B2AD; border-radius: 28px; width: 90%;">Login</button>
                    <p style="margin-top: 50px;">or login with</p>
                    <img src="../images/login/google.svg" alt="Google Login" style="width: 20px; height: 20px;">
                    <img src="../images/login/facebook.svg" alt="Facebook Login" style="width: 20px; height: 20px;">
                    <!-- If there was a failed login attempt, a message will appear saying, Incorrect Username or Password. Please Try Again -->
                    <div>
                        <?php
                            if (isset($_SESSION["failedLogin"]) && $_SESSION["failedLogin"] !== "") {
                                echo $_SESSION["failedLogin"];
                                $_SESSION["failedLogin"] = "";
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>