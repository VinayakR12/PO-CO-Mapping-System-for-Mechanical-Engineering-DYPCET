<?php
// session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "mech"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// $pass = 123;
// echo md5($pass);
?>
