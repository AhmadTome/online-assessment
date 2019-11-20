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

$val = $_REQUEST['val'];

if($val == 1){
    $query1 = "SELECT COUNT(u_id) FROM `answers` WHERE True_Answer='yes' and submitted = 'yes' GROUP by u_id HAVING COUNT(True_Answer) > 2" ;
    $query2 = "SELECT COUNT(DISTINCT u_id) FROM `answers` WHERE True_Answer='yes' and submitted = 'yes'" ;
    $pass_student = 0;
    $all_student = 0;
    $result1 = mysqli_query($conn, $query1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $pass_student++;
        }
    }

    $result2 = mysqli_query($conn, $query2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $all_student = $row['COUNT(DISTINCT u_id)'];
        }
    }

    echo ($pass_student / $all_student);

}else if($val == 2){
    $query = "SELECT COUNT(u_id) FROM `answers` WHERE True_Answer='yes' GROUP by u_id HAVING COUNT(True_Answer) > 2" ;
    $pass_student = 0;
    $result1 = mysqli_query($conn, $query);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $pass_student++;
        }
    }

    echo $pass_student;
}else if($val == 3){
    $query = "SELECT COUNT(u_id) FROM `answers` WHERE True_Answer='yes' GROUP by u_id HAVING COUNT(True_Answer) < 3" ;
    $pass_student = 0;
    $result1 = mysqli_query($conn, $query);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $pass_student++;
        }
    }

    echo $pass_student;
}else{
    echo 'select the correct option';
}


