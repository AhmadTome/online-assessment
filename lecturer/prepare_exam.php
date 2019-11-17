<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Prepare Exam</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/stylesheets/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
<style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 120px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
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
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Prepare Exam&nbsp;&nbsp;</h2>
                </div>
                <div class="panel-body">
                    <p class="text-left" style="color: red">
                        <?php
                        if( isset($_SESSION['Error']) )
                        {
                            echo $_SESSION['Error'];

                            unset($_SESSION['Error']);

                        }
                        ?>
                    </p>

                    <p class="text-left" style="color: white; background-color: green" >
                        <?php
                        if( isset($_SESSION['success']) )
                        {
                            echo $_SESSION['success'];

                            unset($_SESSION['success']);

                        }
                        ?>
                    </p>
                    <form action="../database/publish_exam.php" method="post">

                        <div class="form-group mb-lg">
                            <label class="pull-left">Exam Title :</label>
                            <div class="input-group input-group-icon">
                                <input name="title" type="text" class="form-control input-lg" placeholder="Enter Exam Title" />
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <label class="pull-left">Exam duration per minute :</label>
                            <div class="input-group input-group-icon">
                                <input name="questiontime" type="text" class="form-control input-lg" placeholder="Enter Exam duration per minute" />
                            </div>
                        </div>

                            <span class="form-group mb-lg col-sm-8">
                                <label class="pull-left">Select Question :</label>
                                <div class="input-group input-group-icon ">
                                    <select class="form-control input-lg" id="question_select">
                                        <?php
                                        $info  = getquestionInfo();
                                        print_r($info[0]);
                                        if(count($info)<1){

                                            echo ' <p class="text-left" style="color: white; background-color: red" > Access to this page is illegal, Please sign in </p>';
                                        }else{

                                            for($i=0;$i<count($info);$i++){
                                                echo '<option data-text='. $info[$i]["q_text"] .' data-level='. $info[$i]["level"] .' data-type='. $info[$i]["q_type"] .' value='. $info[$i]["id"] .'>'. $info[$i]["q_text"] .'</option>';
                                            }

                                        }
                                        ?>

                                    </select>
                                </div>
                            </span>

                            <span class="form-group mb-lg col-sm-2" style="margin-top: 26px;">
                                <input type="button" id="preview"  style="background-color: gainsboro" value="preview">
                            </span>

                           <span class="form-group mb-lg col-sm-2" style="margin-top: 26px; ">
                                <input type="button" id="add" style="background-color: greenyellow" value="add">
                            </span>

                        <div class="form-group mb-lg">
                            <label class="pull-left">The selected questions are :</label>
                            <input type="hidden" id="selectedQhidden" name="selectedQhidden">
                            <div class="input-group input-group-icon" id="selected-question">
                                <ul name="selectedquestion">

                                </ul>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6 text-right pull-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Publish The Exam</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Publish The Exam</button>
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
        $("#preview").on("click",function () {
            var text = $("#question_select option:selected").text();
            var level = $("#question_select option:selected").data("level");
            var type = $("#question_select option:selected").data("type");
            alert('The Question text is ' + text + '\n' + "The level is "+  level+ '\n' + "The Question Type is "+type +"")
        });
        $("#add").on("click",function () {
            $("#selectedQhidden").val($("#selectedQhidden").val()+','+ $("#question_select option:selected").val()+',')
            $("#selected-question>ul").append('<div class="addelement"><li class="pull-left" data-id="'+  $("#question_select option:selected").val() +'"> <button  type="button" class="close pull-left" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  '+ $("#question_select option:selected").text() +' &nbsp;  &nbsp;  </li> </br></div>')
            $(".close").on("click",function () {
                $(this).closest('.addelement').remove();
                $('#selectedQhidden').val($('#selectedQhidden').val().split(','+$(this).closest('li').data('id')+',').join(""))
            });
        });

    })
</script>


<?php

function getquestionInfo(){


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

    if(!isset($_SESSION['user_email'])) return ;
    $query = "SELECT * FROM `questions`;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["q_text" => $row["q_text"], "q_type" => $row["q_type"], "level" => $row["level"], "id" => $row["id"]]);
        }
        return $info;
    } else {
        return [];
    }

}

?>


