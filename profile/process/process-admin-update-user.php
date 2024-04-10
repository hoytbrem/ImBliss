<?php
    session_start();
    $userMessage = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userId = $_POST["user_id"];
        $success = true;
        echo $_SESSION["user-id"];
        echo $userId;
    } else {
        echo "<h4>Error updating user info</h4>";
    }

    if ($success){
        require_once("connect-db.php");
        $sql = "update user set user_admin = 1 where user_id = :userId";
        $statement = $db->prepare($sql);

        $statement->bindValue(":userId", $userId);

        if ($statement->execute()){
            $statement->closeCursor();
            $userMessage = "User is now an admin";
        }
        ?>
        <script>
            setTimeout(function() {
                window.location.href = '../user-list.php';
            }, 5000);
        </script>
        <?php
        } else {
            $userMessage = "Error updating Account";
        }
    
?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            echo $userMessage;
        ?>
    </body>
    <footer>

    </footer>
</html>