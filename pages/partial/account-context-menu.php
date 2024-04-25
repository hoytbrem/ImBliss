<?php
// This session destroy broke the user accounts and would log you out every time you went to a new page after login
// session_destroy();
$logged_in = $_SESSION["logged_in"] ?? false; // default false for login if variable doesn't exist.
?>

<?php if (!$logged_in): ?>
    <div id="navAccountContextMenu">
        <form action="<?php echo $dirLevel ?>pages/login.php" method="POST">
            <input type="hidden" name="account_action" value="login">
            <input type="submit" value="Login">
        </form>

        <form action="<?php echo $dirLevel ?>pages/sign-up.php" method="POST">
            <input type="hidden" name="account_action" value="signup">
            <input type="submit" value="Sign up">
        </form>
    </div>
<?php elseif($logged_in): ?>
    <div id="navAccountContextMenu">
        <form action="<?php echo $dirLevel ?>pages/account.php" method="POST">
            <input type="hidden" name="account_action" value="viewprofile">
            <input type="submit" value="Profile">
        </form>

        <form action="<?php echo $dirLevel ?>pages/account.php" method="POST">
            <input type="hidden" name="account_action" value="vieworders">
            <input type="submit" value="Orders">
        </form>
    </div>
<?php endif ?>