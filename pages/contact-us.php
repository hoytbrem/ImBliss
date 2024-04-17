<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    // <!-- Header Includes -->
    include ("../src/php/function-helpers.php"); // Various helpful functions    
    $dirLevel = getDirLevel(1); // this will return "../" 
    include("{$dirLevel}partial/every-page.html"); // Google Analytics
    include("{$dirLevel}pages/partial/header.php"); renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/contact/contact.css" />
</head>

<body class="container-fluid" id="indexBody">
    <?php include("{$dirLevel}pages/partial/nav.php"); ?>
    <?php // <!-- Other Includes -->
    include ("{$dirLevel}pages/partial/cart.php"); // Cart ?>
    <div class="container my-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <p><img src="../images/contact/geo-alt-fill.svg"> Address 3959 Fairlands Drive, Pleasanton CA 94588</p>
            </div>
            <div class="col-12 col-md-4">
                <p><img src="../images/contact/telephone-fill.svg"> Phone +1-510-555-0204</p>
            </div>
            <div class="col-12 col-md-4">
                <p><img src="../images/contact/send.svg"> Email ImBliss@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="position-relative" style="margin: auto; width: 95%;">
                    <img src="../images/contact/organic-oranges-display.jpg" alt="Banner"
                        style="width: 100%; height: auto; border-radius: 30px;">

                    <div class="position-absolute top-50 start-50 translate-middle form-container"
                        style="width: 45%; background-color:#FFFFFF; padding: 50px; border-radius: 15px;">
                        <h2>Get in touch with our team!</h2>
                        <form>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Name"
                                        style="background: #D5EDEC; border-radius: 21px;">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="email" class="form-control" placeholder="Email"
                                        style="background: #D5EDEC; border-radius: 21px;">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" placeholder="Phone number"
                                    style="background: #D5EDEC; border-radius: 21px;">
                            </div>
                            <p>Preferred method of contact</p>
                            <div style="padding-bottom: 40px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contactMethod" value="text">
                                    <label class="form-check-label">Text</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contactMethod" value="email">
                                    <label class="form-check-label">Email</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="contactMethod" value="call">
                                    <label class="form-check-label">Call</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Subject"
                                    style="background: #D5EDEC; border-radius: 21px;">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Message" rows="5"
                                    style="background: #D5EDEC; border-radius: 21px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"
                                style="background: #32B2AD; border-radius: 28px;">Send Message</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include("./partial/footer.html"); ?>
</body>

</html>