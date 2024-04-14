<?php
    // Checking if there is a logged in user in the session
    // If so, the user account Id and user account first name are saved in variables
    $message = "";
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
        $userAccountID = $_SESSION["user-id"];
        $username = $_SESSION["fName"];
        $userLoggedIn = true;
    } else {
        $username = "Not Logged In";
        $userLoggedIn = false;
    }

    // Checking to see if the user has an admin flag on their account
    if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true){
        $isAdmin = "true";
    } else{
        $isAdmin = "false";
    }
?>


<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Logo -->
  <a class="navbar-brand" href="#">
    <img src="../images/main/test-image.jpeg" class="test-img" />
  </a>
  <!-- Hamburger menu -->
  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#navbarNav"
    aria-controls="navbarNav"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <!-- Navigation Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product-page.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
    <!-- Search Bar / Account / Cart-->
    <form class="d-flex">
      <input
        class="form-control me-2"
        type="search"
        placeholder="Search"
        aria-label="Search"
      />
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Account</a>

        <!-- This block of code controls what the user should see if they are logged in or not -->
        <?php
            if($userLoggedIn){
                ?>
                    <!-- Display this option if there IS a user account in the session -->
                    <a class="nav-link" href="account.php">My Account</a>
                <?php
            }else{
                ?>
                    <!-- Display these options if there is no user account in the session -->
                    <a class="nav-link" href="sign-up.php">Register</a>
                    <a class="nav-link" href="login.php">Login</a>
                <?php
            }
        ?>

        <a class="nav-link" href="checkout.php">checkout</a>
        <a class="nav-link" href="checkout-address.php">checkout address</a>
        <a class="nav-link" href="checkout-payment.php">checkout payment</a>
        <a class="nav-link" href="checkout-edit.php">checkout edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cart</a>
      </li>
    </ul>
  </div>
</nav>
