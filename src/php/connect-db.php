<?php

$servername = "mysql:host=localhost;dbname=deesmjua_imbliss_db";
$dbuser = "deesmjua_imbliss";
// $dbpass = "password"; This is commented out as my local database doesn't have a password.
// $dbpass = "thepassword";
$dbpass = "iwcAdmin2024";

try {
    $db = new PDO($servername, $dbuser, $dbpass);
} catch (PDOException $e){
    echo $e->getMessage();
}