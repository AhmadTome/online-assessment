<?php
session_start();
$servername = "localhost";
$username = "online_assessment";
$password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root",$password, $username,"3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$examID = $_REQUEST['examId'];
$U_email = $_SESSION['user_email'];

$query = "DELETE FROM `answers` WHERE e_id = ".$examID." and u_id = "."'$U_email'" ;
echo $query;
$result = mysqli_query($conn, $query);