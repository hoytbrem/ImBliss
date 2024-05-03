<?php
    session_start();
    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true) {
        } else {
            ?>
<script>
window.location.replace("login.php");
</script>
<?php
        }

    $userMessage = "";
    require_once("../src/php/connect-db.php");
    $sql = "SELECT * FROM user";
    $statement = $db->prepare($sql);

    if($statement->execute()){
        $userID = $statement->fetchAll();
        $statement->closeCursor();
        $userMessage = "<h3>All users displayed successfully</h3>";
    }else{
        $userMessage = "<h3>Error retrieving users.</h3>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}pages/partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); 
    renderHeader("Admin User List", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
</head>

<body class="container-fluid">

    <?php include("../pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("../pages/partial/cart.php"); renderCart($dirLevel); // Cart ?>

    <main style="margin-top: 115px;">
        <h2>All Users</h2>
        <!-- Table grabs all of the users in the database.
        There is also a button that shows up to make a user an admin, if not already one. -->
        <!-- Yes it's not pretty, but we can worry about this later -->
        <table>
            <?php
            foreach($userID as $u){
                ?>
            <tr>
                <td style="font-weight: bold;"><?php 
                        if($u["user_admin"] == 1){
                            echo "Admin";
                        }
                    ?></td>
                <td><?php echo $u["user_first_name"]; ?></td>
                <td><?php echo $u["user_last_name"]; ?></td>
                <td>
                    <?php 
                        if($u["user_admin"] != 1){
                            ?>
                    <form action="../profile/process/process-admin-update-user.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $u["user_id"]?>">
                        <input type="submit" value="Make Admin">
                    </form>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php
            }
        ?>
        </table>
        <a href="admin.php">Back To Admin Page</a>
    </main>
    <?php include("./partial/footer.html"); ?>
</body>

</html>