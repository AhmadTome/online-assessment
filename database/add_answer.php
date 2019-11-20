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
$questionType = $_REQUEST['qtype'];

if($questionType == "true-false" || $questionType == "multiple-choice" || $questionType == "code-correction") {
    $examId = $_REQUEST['examId'];
    $qid = $_REQUEST['qid'];
    $selected = $_REQUEST['selected'];
    $qtype = $_REQUEST['qtype'];
    $True_Answer = $_REQUEST['True_Answer'];
    $u_email = $_SESSION['user_email'];

    $query1 = "INSERT INTO `answers`(`e_id`, `q_id`, `u_id`, `answer`, `submitted`, `qtype`,`True_Answer`) VALUES ('$examId','$qid','$u_email','$selected','no','$qtype','$True_Answer')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        echo 'done';
    }
}else if($questionType == "essay"){
    $examId = $_REQUEST['examId'];
    $qid = $_REQUEST['qid'];
    $answer = $_REQUEST['answer'];
    $qtype = $_REQUEST['qtype'];
    $u_email = $_SESSION['user_email'];

    $query1 = "INSERT INTO `answers`(`e_id`, `q_id`, `u_id`, `answer`, `submitted`, `qtype`) VALUES ('$examId','$qid','$u_email','$answer','no','$qtype')";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
        echo 'done';
    }
}

