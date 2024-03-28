<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImBliss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>

<body>
    <div class="container">
    <?php include("header_nav.php"); ?>
        <article>
            <h2>Create an Account</h2>
            <form action="process-account.php" method="POST">
                <label>First Name:</label>
                <input type="text" name="fName" required>
                <label>Last Name:</label>
                <input type="text" name="lName" required>
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="tpassword" required>
                <label>Confirm Password:</label>
                <input type="password" required>
                <input class="btn btn-success" type="submit" value="Sign Up">
            </form>
        </article>
    </div>
</body>

</html>