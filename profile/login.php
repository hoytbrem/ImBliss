<?php
session_start();
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    ?>
        <script>
            window.location.replace("../pages/index.php");
        </script>
    <?php
    } else {
    }

    $_SESSION["test"] = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImBliss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="854388045083-q0u9rhjooc72kbq0f35d0ss75hu1asnu.apps.googleusercontent.com">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>

<body>
    <div class="container">
    <?php include("header_nav.php"); ?>
        <article>
            <p>Don't have an account? <a href="create-account.php">Sign Up Here!</a></p>
            <h2>User Login</h2>
            <form action="process/process-login.php" method="POST">
                <label>Email:</label>
                <input type="text" name="email" required>
                <label>Password:</label>
                <input type="password" name="tpassword" required>
                <input class="btn btn-lg btn-success" type="submit" value="Login">
                <?php
                if (isset($_SESSION["failedLogin"]) && $_SESSION["failedLogin"] !== "") {
                    echo $_SESSION["failedLogin"];
                    $_SESSION["failedLogin"] = "";
                } ?>
            </form>
            <div class="g-signin2" data-onsuccess="onSignIn">Sign In With Google</div>
            <script>
                function onSignIn(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                    console.log('Name: ' + profile.getName());
                    console.log('Image URL: ' + profile.getImageUrl());
                    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
                    // <?php $_SESSION["test"] = profile.getName(); ?>
                }
            </script>

            <a href="#" onclick="signOut();">Sign out</a>
            <script>
                function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
                }
            </script>
            

        </article>
    </div>
</body>

</html>