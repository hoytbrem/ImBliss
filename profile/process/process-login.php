<?php
session_start();
$userMessage = "";
$_SESSION["failedLogin"] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredEmail = htmlspecialchars($_POST["email"]);
    $enteredPassword = htmlspecialchars($_POST["tpassword"]);
    $success = true;

    if ($success) {
        require_once("connect-db.php");
        $sql = "select * from user where user_email = :enteredEmail and user_password = :enteredPassword";
        $statement = $db->prepare($sql);

        $statement->bindValue(":enteredEmail", $enteredEmail);
        $statement->bindValue(":enteredPassword", $enteredPassword);

        if ($statement->execute()) {
            $userAccount = $statement->fetchAll();
            $statement->closeCursor();

            foreach ($userAccount as $u) {
                if ($enteredEmail === $u["user_email"] && $enteredPassword === $u["user_password"]) {
                    
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user-id"] = $u["user_id"];
                    $_SESSION["fName"] = $u["user_first_name"];

                    if ($u["user_admin"] == 1) {
                        $_SESSION["admin-login"] = true;
                    } else {
                        $_SESSION["admin-login"] = false;
                    }
?>
                    <script>
                        window.location.replace("../../pages/index.php");
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        window.location.replace("../login.php");
                    </script>
<?php
                }
            }
            $_SESSION["failedLogin"] = "Incorrect Username or Password. Please Try Again.";
            ?>
            <script>
                window.location.replace("../login.php");
            </script>
<?php
        }else {
            $message = "<h4> Error retrieving user information</h4>";
        }
    }else{
        echo "<h4>Error getting information</h4>";
    }
}

?>