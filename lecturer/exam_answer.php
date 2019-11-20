<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Exam Started</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css"/>
<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css"/>
<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css"/>

<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/stylesheets/theme.css"/>

<!-- Skin CSS -->
<link rel="stylesheet" href="../assets/stylesheets/skins/default.css"/>

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
<style>

    .w3-row-padding img {
        margin-bottom: 12px
    }

    /* Set the width of the sidebar to 120px */
    .w3-sidebar {
        width: 120px;
        background: #222;
    }

    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {
        margin-left: 120px
    }

    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
        #main {
            margin-left: 0
        }
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 100%;
        border-radius: 5px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
</style>
<body class="w3-white">

<?php include 'side_bar.php';?>
<!-- Page Content -->
<div class="w3-padding-large" id="main" >

    <!-- start: page -->
    <section class="body-sign col-xs-12 col-lg-offset-3" >
        <div class="center-sign">


            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-left">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Evaluations&nbsp;&nbsp;</h2>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <?php
                        $info  = getInfo();
                        //print_r($info);
                        if(count($info)<1){

                            echo ' <p class="text-left" style="color: white; background-color: red" > Access to this page is illegal, Please sign in </p>';
                        }else{
                            for($i=0;$i<count($info);$i++){

                                if($info[$i]["qtype"] == "code-correction"){
                                    $row_num = (substr_count($info[$i]["q_text"], "\n"));
                                    $html = "";
                                    $text = explode(PHP_EOL,$info[$i]["q_text"]) ;
                                    $answer_arr = explode(',',$info[$i]["answer"]) ;
                                    for($j = 0; $j<$row_num;$j++){

                                        if(in_array(($j+1),$answer_arr)){
                                            $html = $html.'<tr>
                                                    <td>
                                                        <div class="checkbox">
                                                          <label><input type="checkbox" name="" value="" disabled checked ></label>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                    <label>'.$text[$j].'</label>
                                                   
                                                    </td>  
                                                        
                                                        </tr>';
                                        }else{
                                            $html = $html.'<tr>
                                                    <td>
                                                        <div class="checkbox">
                                                          <label><input type="checkbox" name="" value="" disabled  ></label>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                    <label>'.$text[$j].'</label>
                                                   
                                                    </td>  
                                                        
                                                        </tr>';
                                        }


                                    }


                                    $html_answer = '';
                                    if($info[$i]['True_Answer'] == "" || $info[$i]['True_Answer'] == "-"){
                                        $html_answer = ' <h6 >The Answer is :  
                                                 <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="yes" data-uid='. $info[$i]["u_id"] .' >True</label>
                                                </div>
                                                <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="no" data-uid='. $info[$i]["u_id"] .'>False</label>
                                                </div>
                                          </h6>';
                                    }else{
                                        $html_answer = '<h4 >This Question was viewed and the mark is :  '. $info[$i]['True_Answer'].'</h4>
                                          </p> ';
                                    }

                                    echo '<div class="form-group mb-lg" style="border: 0.1px gainsboro solid; padding: 10px;">
                                          '. $html_answer .'
                                        <div class="card" style="background-color: gainsboro">
                                        <div  style="  padding: 2px 16px;" >
                                     <h4 ><b>Please check the line you guess that is it not correct! </b></h4> 
                                       <table ">
                                          '.$html.'
                                        </table>
                                         </div>
                                         
                                       </div>
                                       
                                       </div>';
                                }else{

                                    if($info[$i]["qtype"] == "essay"){
                                        $html_answer = '';
                                        if($info[$i]['True_Answer'] == "" || $info[$i]['True_Answer'] == "-" ){
                                            $html_answer = ' <h6 >The Answer is :  
                                                 <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="yes" data-uid='. $info[$i]["u_id"] .' >True</label>
                                                </div>
                                                <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="no" data-uid='. $info[$i]["u_id"] .'>False</label>
                                                </div>
                                          </h6>';
                                        }else{
                                            $html_answer = '<h4 >This Question was viewed and the mark is :  '. $info[$i]['True_Answer'].'</h4>
                                          </p> ';
                                        }




                                        echo '<div class="form-group mb-lg">
                                        '. $html_answer .'
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h5 ><b> Q ' . ($i+1) . '</b></h5> 
                                          <p style="margin-bottom: 20px;">
                                                <h4 style="background-color: ghostwhite">'. $info[$i]["q_text"] .'</h4>
                                                <h6 >The Answer is :  '. $info[$i]["answer"] .'</h6>';






                                    }else{
                                        $ans = "";
                                        if ($info[$i]["qmc_answer"]){
                                            $ans = $info[$i]["qmc_answer"];
                                        }else if($info[$i]["qtf_answer"]){
                                            $ans = $info[$i]["qtf_answer"];
                                        }else{
                                            $ans = "";
                                        }

                                        echo '<div class="form-group mb-lg">
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h5 ><b> Q ' . ($i+1) . '</b></h5> 
                                          <p style="margin-bottom: 20px;">
                                                <h4 style="background-color: ghostwhite">'. $info[$i]["q_text"] .'</h4>
                                                <h6 >The Answer is :  '. $info[$i]["answer"] .'</h6>';
                                        if($ans){
                                            echo  '<h6 >The typical answer is :  '. $ans.'</h6>
                                          </p> 
                                         </div>
                                       </div>
                                       </div>';
                                        }
                                    }




                                }

                            }
                        }
                        ?>

                    </form>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- Vendor -->
<script src="../assets/vendor/jquery/jquery.js"></script>
<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="../assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="../assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="../assets/javascripts/theme.init.js"></script>
</body>
</html>
<script>

    $(document).ready(function () {
        $('input').on("click",function () {
           var id = $(this).attr('name');
            var answer = $(this).attr('value');
            var uid = $(this).attr('data-uid');

            $.ajax({
                type: "get",
                url: "http://localhost/online_assessment/database/update_answer.php",
                data: {"id":id,"answer":answer,"uid":uid},
                async: false
            }).done(function (data) {
                location.reload()
            })
                .fail(function (err) {
                    alert("error")
                    console.log("err", err);
                });
        })
    })

</script>


<?php

function getInfo(){
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
    $email = $_REQUEST['email'];
    $examId = $_REQUEST['examId'];

    if(!isset($_SESSION['user_email'])) return ;
    $query = "SELECT questions.q_text,answers.answer,answers.qtype,q_multiple_choice.choice_text as qmc_answer,q_true_false.answer as qtf_answer, questions.id as q_id,answers.u_id as u_id,answers.True_Answer as True_Answer FROM `answers` inner join questions on answers.q_id = questions.id left join q_multiple_choice on questions.id = q_multiple_choice.q_id left join q_true_false on  questions.id = q_true_false.q_id
where answers.u_id = '". $email ."' and answers.e_id = ".$examId;
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["q_text" => $row["q_text"], "answer" => $row["answer"], "qtype" => $row["qtype"],"qmc_answer" => $row["qmc_answer"],"qtf_answer" => $row["qtf_answer"],"q_id" => $row["q_id"],"u_id" => $row["u_id"],"True_Answer" => $row["True_Answer"] ]);
        }
        return $info;
    } else {
        header('Location: ../sign_in.php');
    }

}

?>


