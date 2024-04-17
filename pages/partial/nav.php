<?php
// Checking if there is a logged in user in the session
// If so, the user account Id and user account first name are saved in variables
$message = "";
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
  $userAccountID = $_SESSION["user-id"];
  $username = $_SESSION["fName"];
  $userLoggedIn = true;
} else {
  $username = "Not Logged In";
  $userLoggedIn = false;
}

//echo var_dump($testest);

// Checking to see if the user has an admin flag on their account
if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true) {
  $isAdmin = "true";
} else {
  $isAdmin = "false";
}
?>

<link rel="stylesheet" href="<?php echo $dirLevel ?>/theme/nav/nav.css">

<!-- Navigation Bar -->

<header class="" id="imbliss-Header">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <div id="imblissHeaderLogo" class="d-flex align-items-center p-3">
                    <img src="<?php echo $dirLevel ?>/images/main/IWC_Final_Logo.svg"
                        alt="ImBliss main logo, in a serif font, with green-teal leaves to the left.">
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo $dirLevel ?>pages/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo $dirLevel ?>pages/product-page.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact-us.php">Contact</a>
                    </li>
                </ul>

                <!-- <form class="d-flex" role="search">
          <input id="searchBar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->

                <!-- <div class="input-group mb-3">
          <div class="input-group-prepend">
          <button style="border: none; background: transparent;"><img class="" src="<?php //echo $dirLevel ?>images/nav-assets/cart3.svg" id="cartOpenButton"></button>
          </div>
          <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        </div> f-->

                <div class="d-flex" id="functionPanel">
                    <div class="search " id="searchBar">
                        <span id="imbliss-search-icon"></span>
                        <input id="search_query" class="rounded-pill" name="search_query" type="text"
                            placeholder="Search">
                    </div>

                    <!-- Open Account -->
                    <img class="custom" src="<?php echo $dirLevel ?>images/nav-assets/person-circle.svg" type="button"
                        id="accountOpenButton">


                    <!-- Open Shopping Cart -->
                    <img class="custom" src="<?php echo $dirLevel ?>images/nav-assets/cart3.svg" type="button"
                        id="cartOpenButton">
                </div>

            </div>
        </div>
    </nav>
    <!-- <div id="linearGradientDivider"></div> -->
</header>