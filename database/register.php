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

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$userType = $_POST['hiddenInput'];



$query = "INSERT INTO users(`name`, `email`, `password`, `age`, `type`) VALUES('$name', '$email', '$pwd', '$age' , '$userType')";
$result = mysqli_query($conn,$query);
if($result) {
    session_start();
    $_SESSION['user_email'] = $email;
    echo "Succesfully registered";
    if($userType == "lecturer"){
        header('Location: ../admin/add_lecturer.php');
        $_SESSION['added_correctly'] = 'The lecturer added successfully ';
    }else if($userType=="student"){
        header('Location: ../admin/add_student.php');
        $_SESSION['added_correctly'] = 'The Student added successfully ';
    }

}
else {
    $_SESSION['Error'] = "An error has occurred, please make sure that the email is not already registered";
    header('Location: ../sign_up.php');
}

?>