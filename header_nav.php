<?php
    $message = "";
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
        $userID = $_SESSION["user-id"];
        $fName = $_SESSION["fName"];
    } else {
        $fName = "Not Logged In";
    }

    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true){
        $isAdmin = "true";
    } else{
        $isAdmin = "false";
    }

?>

<a href="index.php">Home</a>
<p>User Logged in is: <?php echo $fName ?></p>
<p>User is admin: <?php echo $isAdmin?></p>