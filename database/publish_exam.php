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
$title = $_POST['title'];
$questiontime = $_POST['questiontime'];
$selectedquestion = $_POST['selectedQhidden'];

echo $title;
echo $questiontime;
echo $selectedquestion;

$query1 = "INSERT INTO `exam`( `title`, `time`) VALUES ('$title','$questiontime')";
$result1 = mysqli_query($conn,$query1);
if($result1) {
    $last_id = $conn->insert_id;
    $q = explode(",",$selectedquestion);
    for($i=0;$i<count($q);$i++){
        if($q[$i] !="" && $q[$i] !=" "){
            $query2 = "INSERT INTO `exam_questions`( `e_id`, `q_id`) VALUES ('$last_id','$q[$i]')";
            $result2 = mysqli_query($conn,$query2);
        }
    }
    $_SESSION['success'] = "The Exam Published Successfully !";
    header('Location: ../lecturer/prepare_exam.php');

}
else {
    $_SESSION['Error'] = "An error has occurred!!";
    header('Location: ../lecturer/prepare_exam.php');
}