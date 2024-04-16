<?php

$servername = "mysql:host=localhost;dbname=imbliss_db";
$dbuser = "root";
$dbpass = "password";

try {
    $db = new PDO($servername, $dbuser, $dbpass);
} catch (PDOException $e){

}
