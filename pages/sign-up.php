<?php session_start(); ?>
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
    <?php include("./partial/nav.html"); ?>
    <?php // <!-- Other Includes -->
    include ("./partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <h6 class="card-subtitle mb-2 text-muted text-center">Already have an account? <a
                        href="./login.php">Login</a></h6>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" aria-describedby="nameHelp">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputPasswordConfirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <div class="mt-3">
                        <p>or login with</p>
                    </div>
                    <div class="mt-3">
                        <img src="../images/main/test-img.jpeg" alt="Google" style="width: 50px; height: 50px;">
                        <img src="../images/main/test-img.jpeg" alt="Facebook" style="width: 50px; height: 50px;">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>