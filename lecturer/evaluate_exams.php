<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Evaluations</title>
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
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Evaluations&nbsp;&nbsp;</h2>
                </div>
                <div class="panel-body">
                    <form action="exam_answer.php" method="post" id="examform">
                        <?php
                        $info  = getInfo();
                        //print_r($info[0]);
                        if(count($info)<1){

                            echo ' <p class="text-left" style="color: white; background-color: red" > Access to this page is illegal, Please sign in </p>';
                        }
                        ?>

                        <div style="border: 0.1px solid grey; padding: 10px;" >
                            <h3>The Statistic Information :</h3>
                            <select class="browser-default custom-select" id="statistic_select">
                                <option selected>Open this select menu</option>
                                <option value="1">The Average students pass the exam</option>
                                <option value="2">The number of students passed the exam </option>
                                <option value="3">The number of students failed the exam </option>
                            </select><br><br>
                            <input class="form-control" type="text" readonly id="statistic">
                        </div>
                        <?php
                         echo ' <table class="table">
                                            <thead>
                                            <tr>
                                                    <th>Student Name</th>
                                                    <th>Exam Title</th>
                                                    <th>Preview</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                              ';

                            for($i=0;$i<count($info);$i++){

                                              echo'
                                                    <tr>
                                                        <td>'. $info[$i]["name"] .'</td>
                                                        <td>'. $info[$i]["title"] .'</td>
                                                        <td><input data-examid='. $info[$i]["id"] .' data-email='. $info[$i]["email"] .' type="button" class="btn btn-success preview" value="preview"></td>
                                                    </tr>
                                                   ';
                            }

                            echo ' </tbody>
                                        </table>'
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
        $('.preview').on("click",function () {
            var examId = $(this).attr('data-examid');
            var email = $(this).attr('data-email');


            var exanAction = $("#examform").attr('action');
            console.log(exanAction)
            var index = exanAction.indexOf("?");
            console.info(index)
            if(index > 0){
                $("#examform").attr('action', $("#examform").attr('action').substring(0,index));
            }
            console.info($("#examform").attr('action')+'?examId=' +examId+'&email='+email)
            $("#examform").attr('action',$("#examform").attr('action')+'?examId=' +examId+'&email='+email);

            $("#examform").submit();
        });


        $('#statistic_select').on("change",function () {
            var val = $(this).val();
            $.ajax({
                type: "get",
                url: "http://localhost/online_assessment/database/statistic.php",
                data: {"val":val},
                async: false
            }).done(function (data) {
                $("#statistic").val(data)
            })

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

    if(!isset($_SESSION['user_email'])) return ;
    $query = "SELECT DISTINCT exam.id,users.email, users.name , exam.title FROM `users` inner join answers on users.email = answers.u_id inner join exam on exam.id = answers.e_id where answers.submitted='yes'";
    $result = $conn->query($query);
    $user_id = "";
    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["email" => $row["email"], "id" => $row["id"], "name" => $row["name"], "title" => $row["title"]]);
        }
        return $info;
    } else {
        header('Location: ../sign_in.php');
    }

}

?>


