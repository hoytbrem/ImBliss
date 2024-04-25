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
    include ("{$dirLevel}partial/every-page.html"); // Google Analytics
    include ("{$dirLevel}pages/partial/header.php");
    renderHeader("Home", $dirLevel); // Meta data, BootStrap, Stylesheet(s), Scripts 
    require_once("{$dirLevel}src/php/connect-db.php");
    ?>
    <link rel="stylesheet" type="text/css" href="../theme/contact/contact.css" />
</head>

<body class="container-fluid" id="indexBody">
    <?php include ("{$dirLevel}pages/partial/nav.php"); ?>
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
                        

                            <?php
                            if (isset($_POST["user_first_name"])) {
                                $user_first_name = $_POST["user_first_name"] ?? exit();
                                $contact_subject = $_POST["contact_subject"] ?? exit();
                                $contact_message = $_POST["contact_message"] ?? exit();
                                $user_email = $_POST["user_email"] ?? exit();

                                $sql = "INSERT INTO contact (user_first_name, user_email, contact_subject, contact_message, user_id)
                                VALUES (:user_first_name, :user_email, :contact_subject, :contact_message, :user_id)";
                                $statement = $db->prepare($sql);

                                $user_id = $_SESSION["user-id"] ?? "NULL";

                                $statement->bindValue(":user_first_name", $user_first_name);
                                $statement->bindValue(":user_email", $user_email);
                                $statement->bindValue(":contact_subject", $contact_subject);
                                $statement->bindValue(":contact_message", $contact_message);
                                $statement->bindValue(":user_id", $user_id);

                                if ($statement->execute()) {
                                    $statement->closeCursor();

                                    $success = true;
                                } else {
                                    $success = false;
                                }
                            }

                            ?>
                           
                            <h2 id="contactFormHeader">
                                <?php 
                                
                                if (isset($success)) {
                                    echo $success ? "Message Sent! We'll be in contact!" : "Issue sending message.";
                                } else {
                                    echo "Get in touch with our team!";
                                }

                                ?>
                            </h2>

                            <?php if (!isset($_POST["user_first_name"])): ?>
                            <form id="contact_form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input id="user_first_name" type="text" name="user_first_name" class="form-control"
                                            placeholder="Name"
                                            style="background: #D5EDEC; border-radius: 21px;" value="<?php echo $_SESSION["fName"] ?? "" ?>">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="email" id="user_email" name="user_email" class="form-control"
                                            placeholder="Email"
                                            style="background: #D5EDEC; border-radius: 21px;" value="<?php echo $_SESSION["user_email"] ?? "" ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="tel" id="user_phone_number" name="user_phone_number" class="form-control"
                                        placeholder="Phone number" style="background: #D5EDEC; border-radius: 21px;">
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
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control"
                                        placeholder="Subject" style="background: #D5EDEC; border-radius: 21px;">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="contact_message" name="contact_message"
                                        placeholder="Message" rows="5"
                                        style="background: #D5EDEC; border-radius: 21px;"></textarea>
                                </div>

                                <!-- Placeholder Password Confirmation. Will display an alert if the passwords do not match. -->
                                <script>
                                    document.getElementById("contact_form").addEventListener("submit", function (event) {
                                        let contactFormHeader = document.getElementById("contactFormHeader");
                                        let formObject = {
                                            user_first_name: document.getElementById("user_first_name"),
                                            user_email: document.getElementById("user_email"),
                                            user_phone_number: document.getElementById("user_phone_number"),
                                            contact_subject: document.getElementById("contact_subject"),
                                            contact_message: document.getElementById("contact_message")
                                        };

                                        Object.entries(formObject).forEach(([key, value]) => {
                                            let noWhiteSpaces = value.value.replace(/\s+/g, '');

                                            if (noWhiteSpaces == "") { // invalid input
                                                console.log(key + " is empty");
                                                value.classList.add("invalid-input");
                                                contactFormHeader.innerHTML = "Please Check Entries Below.";
                                                event.preventDefault();
                                                // value.classList.add("error-class");
                                            } else { // valid input
                                                if (value.classList.contains("invalid-input"))
                                                    value.classList.remove("invalid-input");

                                                value.classList.add("valid-input");
                                            }
                                        });
                                    });
                                </script>
                                <button type="submit" class="btn btn-primary"
                                    style="background: #32B2AD; border-radius: 28px;">Send Message</button>
                            </form>
                        <?php else: ?>
                            <h2>Thank you for contacting us!</h2>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include ("./partial/footer.html"); ?>


</body>

</html>