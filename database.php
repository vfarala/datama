<?php
$hostname = "localhost"; 
$dbUser = "root";
$dbPassword = "";
$dbName = "petadoption_db";

$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName); 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
?>