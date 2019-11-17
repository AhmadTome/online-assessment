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
$questionType = $_POST['question-type'];

if($questionType == "multiple-choice"){
$mq_text = $_POST['mq_text'];
$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$choice3 = $_POST['choice3'];
$choice4 = $_POST['choice4'];
$choiceAnsuwer = $_POST['choiceAnsuwer'];
$choice_text = "";
if($choiceAnsuwer == 1){
    $choice_text = $choice1;
}else if($choiceAnsuwer == 2){
    $choice_text = $choice2;
}else if($choiceAnsuwer == 3){
    $choice_text = $choice3;
}else if($choiceAnsuwer == 4){
    $choice_text = $choice4;
}
$mlevel = $_POST['mlevel'];


    $query1 = "INSERT INTO `questions`(`q_type`, `q_text`, `level`) VALUES ('$questionType','$mq_text','$mlevel')";
    $result1 = mysqli_query($conn,$query1);
    if($result1) {
        $last_id = $conn->insert_id;
        $query2 = "INSERT INTO `q_multiple_choice`(`q_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `answer`,`choice_text`) VALUES ('$last_id','$choice1','$choice2','$choice3','$choice4','$choiceAnsuwer','$choice_text')";
        $result2 = mysqli_query($conn,$query2);
        if($result2) {
            $_SESSION['success'] = "The ". $questionType ." Question added Successfully !";
            echo $_SESSION['success'];
            header('Location: ../lecturer/add_question.php');

        }
        else {
            $_SESSION['Error'] = "An error has occurred!!";
            header('Location: ../lecturer/add_question.php');
        }
    }
    else {
        $_SESSION['Error'] = "An error has occurred!!";
       header('Location: ../lecturer/add_question.php');
    }



}else if ($questionType == "essay"){
    $eq_text = $_POST['eq_text'];
    $elevel = $_POST['elevel'];

    $query1 = "INSERT INTO `questions`(`q_type`, `q_text`, `level`) VALUES ('$questionType','$eq_text','$elevel')";
    $result1 = mysqli_query($conn,$query1);
    if($result1) {
        $_SESSION['success'] = "The ". $questionType ." Question added Successfully !";
        header('Location: ../lecturer/add_question.php');
    }
    else {
        $_SESSION['Error'] = "An error has occurred!!";
        header('Location: ../lecturer/add_question.php');
    }


}else if ($questionType == "true-false"){

    $tfq_text = $_POST['tfq_text'];
    $optiontf = $_POST['optiontf'];
    $tflevel = $_POST['tflevel'];

    $query1 = "INSERT INTO `questions`(`q_type`, `q_text`, `level`) VALUES ('$questionType','$tfq_text','$tflevel')";
    $result1 = mysqli_query($conn,$query1);
    if($result1) {
        $last_id = $conn->insert_id;
        $query2 = "INSERT INTO `q_true_false`( `q_id`, `answer`) VALUES ('$last_id','$optiontf')";
        $result2 = mysqli_query($conn,$query2);
        if($result2) {
            $_SESSION['success'] = "The ". $questionType ." Question added Successfully !";
            echo $_SESSION['success'];
            header('Location: ../lecturer/add_question.php');

        }
        else {
            $_SESSION['Error'] = "An error has occurred!!";
            header('Location: ../lecturer/add_question.php');
        }
    }
    else {
        $_SESSION['Error'] = "An error has occurred!!";
        header('Location: ../lecturer/add_question.php');
    }

}else if ($questionType == "code-correction"){

    $cq_text = $_POST['cq_text'];
    $c_answer = $_POST['c_answer'];
    $clevel = $_POST['clevel'];

    $query1 = "INSERT INTO `questions`(`q_type`, `q_text`, `level`) VALUES ('$questionType','$cq_text','$clevel')";
    $result1 = mysqli_query($conn,$query1);
    if($result1) {
        $last_id = $conn->insert_id;
        $query2 = "INSERT INTO `q_code_correction`(`q_id`, `error_lines`) VALUES ('$last_id','$c_answer')";
        $result2 = mysqli_query($conn,$query2);
        if($result2) {
            $_SESSION['success'] = "The ". $questionType ." Question added Successfully !";
            echo $_SESSION['success'];
            header('Location: ../lecturer/add_question.php');

        }
        else {
            $_SESSION['Error'] = "An error has occurred!!";
            header('Location: ../lecturer/add_question.php');
        }
    }
    else {
        $_SESSION['Error'] = "An error has occurred!!";
        header('Location: ../lecturer/add_question.php');
    }


}else{
    $_SESSION['Error'] = "An error has occurred!!";
    header('Location: ../lecturer/add_question.php');
}