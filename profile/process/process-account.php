<?php
session_start();
?>

<?php
// Grabbing the info from the form
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

    // Running the sql statement putting the info into the database
    $sql = "insert into user (user_first_name, user_last_name, user_email, user_password) values (:fName, :lName, :email, :tpassword)";

    $statement = $db->prepare($sql);

    // BINDS
    $statement->bindValue(":fName", $fName);
    $statement->bindValue(":lName", $lName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":tpassword", $tpassword);

    if ($statement->execute()) {
        $statement->closeCursor();
        // Message that will display for the user letting them know their account was created
        $userMessage = "<h4>The account has been created! You will be redirected in 5 seconds.</h4>";

?>
        <script>
            setTimeout(function() {
                window.location.href = '../../pages/login.php';
            }, 5000);
        </script>
<?php
    } else {
        $userMessage = "<h4>Error Creating Account</h4>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php // <!-- Header Includes -->
    include ("../../src/php/function-helpers.php"); // Various helpful functions    ?>
    <?php // <!-- "Global" variables --> 
    $dirLevel = getDirLevel(1); // this will return "../"   ?>
    <title>Login</title>
    <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
    <meta name="description"
        content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
    <meta name="keywords" content="healthy, snacks, nutritious" />
    <?php include("partial/every-page.html"); ?>
</head>

<body>
    <?php include("../../pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("../../pages/partial/cart.php"); // Cart ?>
    <main class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="container">
            <article>
                <h2>Customer Account</h2>
                <?php
                echo $userMessage;
                ?>
            </article>
        </div>
    </main>
</body>

</html>