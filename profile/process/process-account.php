<?php
session_start();
?>

<?php
$userMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = htmlspecialchars($_POST["fName"]);
    $lName = htmlspecialchars($_POST["lName"]);
    $email = htmlspecialchars($_POST["email"]);
    $tpassword = htmlspecialchars($_POST["tpassword"]);
    $success = true;
} else {
    echo "<h4> Error getting information</h4>";
}

if ($success) {

    require_once("connect-db.php");

    $sql = "insert into user (user_first_name, user_last_name, user_email, user_password) values (:fName, :lName, :email, :tpassword)";

    $statement = $db->prepare($sql);

    $statement->bindValue(":fName", $fName);
    $statement->bindValue(":lName", $lName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":tpassword", $tpassword);

    if ($statement->execute()) {
        $statement->closeCursor();
        $userMessage = "The account has been created! You will be redirected in 5 seconds.";

?>
        <script>
            setTimeout(function() {
                window.location.href = '../login.php';
            }, 5000);
        </script>
<?php
    } else {
        $userMessage = "Error Creating Account";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imbliss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>

<body>
    <div class="container">
        <article>
            <h2>Customer Account</h2>
            <?php
            echo $userMessage;
            ?>
        </article>
    </div>
</body>

</html>