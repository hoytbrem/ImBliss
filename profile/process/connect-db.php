<?php
$servername = "mysql:host=localhost;dbname=imbliss_db";
$username = "root";
$password = "";
try{
    $db = new PDO($servername, $username, $password);
    // echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>