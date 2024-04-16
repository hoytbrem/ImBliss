<?php
session_start();
?>

<?php
// Grabbing the info from the form
$userMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = htmlspecialchars($_POST["user_id"]);
    $fName = htmlspecialchars($_POST["fName"]);
    $lName = htmlspecialchars($_POST["lName"]);
    $email = htmlspecialchars($_POST["email"]);
    $streetAddress = htmlspecialchars($_POST["streetAddress"]);
    $city = htmlspecialchars($_POST["city"]);
    $state = htmlspecialchars($_POST["state"]);
    $zipCode = htmlspecialchars($_POST["zipCode"]);
    $success = true;
} else {
    echo "<h4> Error getting information</h4>";
}

if ($success) {

    require_once("../../src/php/connect-db.php");

    // Running the sql statement putting the info into the database
    $sql = "update user set user_first_name = :fname, user_last_name = :lname, user_email = :email, user_street_address = :streetAddress, 
    user_city = :city, user_state = :state, user_zip_code = :zipCode WHERE user_id = :userId";

    $statement = $db->prepare($sql);

    // BINDS
    $statement->bindValue(":userId", $userId);
    $statement->bindValue(":fname", $fName);
    $statement->bindValue(":lname", $lName);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":streetAddress", $streetAddress);
    $statement->bindValue(":city", $city);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zipCode", $zipCode);

    if ($statement->execute()) {
        $statement->closeCursor();
        // Message that will display for the user letting them know their account was created
        $userMessage = "<h4>The account has been updated! You will be redirected in 5 seconds.</h4>";

?>
        <script>
            window.location.href = '../../pages/account.php';
        </script>
<?php
    } else {
        $userMessage = "<h4>Error Creating Account</h4>";
    }
}

?>