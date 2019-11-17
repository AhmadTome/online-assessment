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

<?php include 'side_bar.php'; ?>
<!-- Page Content -->
<div class="w3-padding-large" id="main">

    <!-- start: page -->
    <section class="body-sign col-xs-12 col-lg-offset-3">
        <div class="center-sign">
                        <?php
                            $info = getInfo();
                        ?>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-left">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Exam&nbsp;Started
                        &nbsp;</h2>
                </div>
                <div class="panel-body">
                    <div style="text-align: center" class="panel-title-sign mt-x4 text-left">
                        <h2 class="title text-uppercase text-bold m-none time"><?php echo $info[0]["time"] ?>
                            &nbsp;</h2>
                    </div><br>
                    <form action="../database/submit_exam.php" method="post" id="examform">
                        <input type="hidden" name="examId" id="examId" value="<?php echo $info[0]["examId"] ?>">
                        <?php

                      //print_r($info);
                        if (count($info) < 1) {
                            echo ' <p class="text-left" style="color: white; background-color: red" > There is no Questions</p>';
                        } else {
                            for ($i = 0; $i < count($info); $i++) {
                                if ($info[$i]["q_type"] == "true-false") {
                                    echo '<div class="form-group mb-lg">
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h4 data-qid='. $info[$i]["q_id"] .' data-qtype='. $info[$i]["q_type"] .' data-qanswer='. $info[$i]["transwer"] .'><b>' . $info[$i]["q_text"] . '</b></h4> 
                                          <p style="margin-bottom: 20px;">
                                                <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="true" >True</label>
                                                </div>
                                                <div class="radio">
                                                     <label><input type="radio" name='. $info[$i]["q_id"] .' value="false" >False</label>
                                                </div>
                                            </p> 
                                         </div>
                                       </div>
                                       </div>';
                                }else if($info[$i]["q_type"] == "multiple-choice"){
                                    echo '<div class="form-group mb-lg">
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h4 data-qid='. $info[$i]["q_id"] .' data-qtype='. $info[$i]["q_type"] .'  data-qanswer='. $info[$i]["manswer"] .'><b>' . $info[$i]["q_text"] . '</b></h4> 
                                          <h1 hidden>'. $info[$i]["manswertext"]  .'</h1>
                                          <p style="margin-bottom: 20px;">
                                             <div class="radio row">
                                              <label class="pull-left col-lg-offset-1"><input type="radio" name='. $info[$i]["q_id"] .' data-text='. $info[$i]["choice_1"] .'>'. $info[$i]["choice_1"] .'</label>
                                              <label class="pull-left col-lg-offset-5"><input type="radio"  name='. $info[$i]["q_id"] .' data-text='. $info[$i]["choice_2"] .'>'. $info[$i]["choice_2"] .'</label>
                                            </div>
                                            <div class="radio row">
                                               <label class="pull-left col-lg-offset-1"><input type="radio"  name='. $info[$i]["q_id"] .' data-text='. $info[$i]["choice_3"] .' >'. $info[$i]["choice_3"] .'</label>
                                              <label class="pull-left col-lg-offset-5"><input type="radio"  name='. $info[$i]["q_id"] .' data-text='. $info[$i]["choice_4"] .'>'. $info[$i]["choice_4"] .'</label>
                                            </div>
                                            </p> 
                                         </div>
                                       </div>
                                       </div>';
                                }else if($info[$i]["q_type"] == "essay"){
                                    echo '<div class="form-group mb-lg">
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h4 data-qid='. $info[$i]["q_id"] .' data-qtype='. $info[$i]["q_type"] .'><b>' . $info[$i]["q_text"] . '</b></h4> 
                                          <p style="margin-bottom: 20px;">
                                                <textarea class="form-control" rows="5" ></textarea>
                                            </p> 
                                         </div>
                                       </div>
                                       </div>';

                                }else if($info[$i]["q_type"] == "code-correction"){

                                    $row_num = (substr_count($info[$i]["q_text"], "\n"));
                                    $html = "";
                                    $text = explode(PHP_EOL,$info[$i]["q_text"]) ;
                                    for($j = 0; $j<$row_num;$j++){
                                        $html = $html.'<tr>
                                                    <td>
                                                        <div class="checkbox">
                                                          <label><input type="checkbox" name='. $info[$i]["q_id"] .' value=""></label>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                    <label>'.$text[$j].'</label>
                                                   
                                                    </td>  
                                                        
                                                        </tr>';
                                    }


                                    echo '<div class="form-group mb-lg" >
                                        <div class="card" style="background-color: gainsboro">
                                        <div  style="  padding: 2px 16px;" >
                                     <h4 data-qid='. $info[$i]["q_id"] .' data-qtype='. $info[$i]["q_type"] .'><b>Please check the line you guess that is it not correct! </b></h4> 
                                       <table ">
                                          '.$html.'
                                        </table>
                                         </div>
                                       </div>
                                       </div>';
                                }

                            }
                        }
                        ?>
                        <p class="text-left" style="color: white; background-color: green">
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo $_SESSION['success'];

                                unset($_SESSION['success']);

                            }
                            ?>
                        </p>

                        <div class="row">
                            <div class="col-sm-8 text-right pull-right">
                                <input type="button" class="btn btn-success hidden-xs" value="Save" id="saveexam">
                                <input type="submit" class="btn btn-primary hidden-xs" value="Submit" id="submit">
                            </div>
                        </div>
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

        var min = parseInt($(".time").text());
        var Minutes = 60 * min,
            display = document.querySelector('.time');
        startTimer(Minutes, display);

        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.innerHTML = minutes + ":" + seconds;

                if (--timer < 0) {
                    $("#submit").trigger("click");
                    timer = duration;
                }
            }, 1000);
        }

        var q_counter=0;
        var mark_counter=0;

        $("#saveexam").on("click",function () {
            alert("Your Answers saved successfully, Please be Noted that the exam does not submitted!! ")
            save()
        });
            function save() {
                var examId = document.querySelector("#examId").value;


                $.ajax({
                    type: "get",
                    url: "http://localhost/online_assessment/database/delete_answers.php",
                    data: {"examId":examId},
                    async:false
                }).done(function (data) {
                    //alert(data)
                })
                    .fail(function (err) {
                        alert("error")
                        console.log("err", err);
                    });


                var questions = document.querySelectorAll('h4');
                console.log(qtype)

                for(var i = 0; i<questions.length;i++){
                    var qtype = questions[i].attributes[1].value ;
                    if(qtype == "true-false"){
                        q_counter++;
                        var qanswer = questions[i].attributes[2].value;
                        var qid = questions[i].attributes[0].value;
                        var selected;

                        var options = (questions[i].parentElement).querySelectorAll('input');
                        if(options[0].checked){
                            selected = true;
                        }else if(options[1].checked){
                            selected = false;
                        }else{
                            selected = 'nan';
                        }

                        console.log("qanswer "+qanswer)
                        console.log("selected "+selected)
                        if(String(qanswer) == String(selected)){
                            mark_counter++;
                            console.log("inside mark_counter "+mark_counter)
                        }
                        console.log("outside mark_counter "+mark_counter)


                        console.log(qtype)
                        console.log(qanswer)
                        console.log(selected)

                        if(selected != "nan"){
                            $.ajax({
                                type: "get",
                                url: "http://localhost/online_assessment/database/add_answer.php",
                                data: {"examId":examId,"qid":qid,"selected":selected,"qtype":qtype},
                                async: false
                            }).done(function (data) {
                                //alert(data)
                            })
                                .fail(function (err) {
                                    alert("error")
                                    console.log("err", err);
                                });
                        }
                    }else if(qtype=="essay"){
                        var answer = (questions[i].parentElement).querySelector('textarea').value;
                        var qid = questions[i].attributes[0].value;
                        if(answer != ""){
                            $.ajax({
                                type: "get",
                                url: "http://localhost/online_assessment/database/add_answer.php",
                                data: {"examId":examId,"qid":qid,"answer":answer,"qtype":qtype},
                                async: false
                            }).done(function (data) {
                                //alert(data)
                            })
                                .fail(function (err) {
                                    alert("error")
                                    console.log("err", err);
                                });
                        }
                    }else if(qtype=="multiple-choice"){
                        q_counter++;

                        var selected;
                        var options = ((questions[i].parentElement).querySelectorAll('input'));
                        console.log(options)

                        if(options[0].checked){
                            selected = (options[0].parentElement).innerText;
                        }else if(options[1].checked){
                            selected = (options[1].parentElement).innerText;
                        }else if(options[2].checked){
                            selected = (options[2].parentElement).innerText;
                        }else if(options[3].checked){
                            selected = (options[3].parentElement).innerText;
                        }else{
                            selected = 'nan';
                        }


                        var qanswer = ((questions[i].parentElement).querySelector('h1')).innerHTML;
                        console.log("qanswer "+ qanswer)
                        console.log("selected "+ selected)

                        if(qanswer == selected){
                            mark_counter++;
                            console.log("inside mark_counter "+mark_counter)
                        }
                        console.log("outside mark_counter "+mark_counter)

                        var qid = questions[i].attributes[0].value;
                        if(selected != "nan"){
                            $.ajax({
                                type: "get",
                                url: "http://localhost/online_assessment/database/add_answer.php",
                                data: {"examId":examId,"qid":qid,"selected":selected,"qtype":qtype},
                                async: false
                            }).done(function (data) {
                                //alert(data)
                            })
                                .fail(function (err) {
                                    alert("error")
                                    console.log("err", err);
                                });
                        }
                    }else if(qtype=="code-correction"){
                        var options = (questions[i].parentElement).querySelectorAll('input');
                        var selected = "" ;
                        for(var j=0;j<options.length;j++){
                            if(options[j].checked){
                                selected+=(j+1)+",";
                            }
                        }
                        var qid = questions[i].attributes[0].value;

                        if(selected != ""){
                            $.ajax({
                                type: "get",
                                url: "http://localhost/online_assessment/database/add_answer.php",
                                data: {"examId":examId,"qid":qid,"selected":selected,"qtype":qtype},
                                async: false
                            }).done(function (data) {
                                //alert(data)
                            })
                                .fail(function (err) {
                                    alert("error")
                                    console.log("err", err);
                                });
                        }




                    }
                }

            }

        $('#submit').on("click",function () {
            save();
            alert(' The Exam submitted successfully \n Your result is '+mark_counter +'/'+q_counter +' \n'+' The rest of the questions will evaluate manually please follow up with the lecturer');
            $("#examform").submit();

        })




            });
</script>

<?php

function getInfo()
{

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


    $examId = $_REQUEST['examId'];
//echo $examId;

    $query = "SELECT exam.id as examId, exam.title,exam.time, questions.q_type,questions.q_text,questions.id as q_idd,q_multiple_choice.*,q_multiple_choice.answer as manswer,q_multiple_choice.choice_text as manswertext ,q_true_false.*,q_true_false.answer as transwer FROM `exam_questions` inner join exam on exam.id = exam_questions.e_id
inner join questions on questions.id = exam_questions.q_id
left JOIN q_multiple_choice on questions.id = q_multiple_choice.q_id
left join q_true_false on questions.id = q_true_false.q_id
where exam.id = '" . $examId . "'";

//echo $query;

    $result = $conn->query($query);
    if ($result->num_rows > 0) {

        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["examId" => $row["examId"],"time" => $row["time"], "title" => $row["title"], "q_type" => $row["q_type"]
                , "q_text" => $row["q_text"], "choice_1" => $row["choice_1"], "choice_2" => $row["choice_2"],
                "choice_3" => $row["choice_3"], "choice_4" => $row["choice_4"], "q_id" => $row["q_idd"], "manswer" => $row["manswer"], "manswertext" => $row["manswertext"], "transwer" => $row["transwer"]]);
        }

        return $info;


    } else {
        return;
    }
}

?>


