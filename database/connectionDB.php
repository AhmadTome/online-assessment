<?php
$servername = "localhost";
$username = "online_assessment";
$password = "root";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect("localhost", "root","", "online_assessment","3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>