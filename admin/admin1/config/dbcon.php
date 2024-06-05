<?php 
define('DB_SERVER', "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "bajajadmin");

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE); // Changed from $conn to $conn
if (!$conn) { // Changed from $conn to $conn
    die("Connection failed: " . mysqli_connect_error());
}


?>
