<?php

$servername = "mysql:host=localhost;dbname=imbliss_db";
$dbuser = "root";
// $dbpass = "password"; This is commented out as my local database doesn't have a password.
$dbpass = "thepassword";

try {
    $db = new PDO($servername, $dbuser, $dbpass);
} catch (PDOException $e){
    echo $e->getMessage();
}