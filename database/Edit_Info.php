<?php
session_start();
$servername = "localhost";
$username = "online_assessment";
$password = "";
// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root", $password, $username, "3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
$user_email = $_SESSION['user_email'];
$age = $_POST['age'];
$major = $_POST['type'];
$name = $_POST['name'];
$password = $_POST['pwd'];


    $query = "UPDATE `users` SET `age`='" . $age . "',`type`='" . $major . "',`password`='" . $password . "',`name`='" . $name . "' WHERE email = '" . $user_email . "'";
$result = $conn->query($query);
$_SESSION['success'] = "The Personal Info has been updated successfully ";

if($major =='lecturer'){
    header('Location: ../lecturer/presonal_info.php');
}else if($major =='student'){
    header('Location: ../student/presonal_info.php');

}
