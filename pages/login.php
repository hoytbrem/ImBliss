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
    <?php include("partial/every-page.html"); ?>
</head>

<body class="container-fluid">
    <?php include("./partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="../profile/process/process-login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="tpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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