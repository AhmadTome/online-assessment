<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Exam</title>
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

    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 120px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 120px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        border-radius: 5px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Exam&nbsp;&nbsp;</h2>
                </div>
                <div class="panel-body">
                    <form action="exam_content.php" method="post" class="" id="examform">
                        <?php
                        $info  = getInfo();
                        //print_r($info[0]);
                        if(count($info)<1){

                            echo ' <p class="text-left" style="color: white; background-color: red" > There is no Exams Opened! </p>';
                        }else{
                            for($i=0;$i<count($info);$i++) {
                              echo '<div class="form-group mb-lg">
                                        <div class="card">
                                        <div  style="  padding: 2px 16px;" >
                                          <h4><b>'. $info[$i]["title"] .'</b></h4> 
                                          <p style="margin-bottom: 20px;">The time period for this exam is '. $info[$i]["time"] .' min <span class="pull-right"><input type="submit" data-id='. $info[$i]["id"] .' class="btn btn-success" value="Start"></span></p> 
                                         </div>
                                       </div>
                                       </div>';
                            }


                        }
                        ?>
                        <p class="text-left" style="color: white; background-color: green" >
                            <?php
                            if( isset($_SESSION['success']) )
                            {
                                echo $_SESSION['success'];

                                unset($_SESSION['success']);

                            }
                            ?>
                        </p>



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
        $('.btn.btn-success').on("click",function () {
                var examId = $(this).attr('data-id');
                $("#examform").attr('name',examId);
                var exanAction = $("#examform").attr('action');
                console.log(exanAction)
                var index = exanAction.indexOf("?");
                console.info(index)
                if(index > 0){
                    $("#examform").attr('action', $("#examform").attr('action').substring(0,index));
                }
                console.info($("#examform").attr('action')+'?examId=' +examId)
                $("#examform").attr('action',$("#examform").attr('action')+'?examId=' +examId);

                /*
                $.ajax({
                    type: "get",
                    url: 'http://localhost/online_assessment/database/start_exam.php',
                    data: {'id':examId}
                }).done(function (data) {
                   // data = JSON.parse(data);
                    console.log(data)
                    //location.reload();
                })
                    .fail(function (err) {
                        alert("error")
                        console.log("err", err);
                    });

*/

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
    $query = "SELECT * FROM `exam` where id not in (select e_id from answers where u_id = '". $_SESSION['user_email'] ."' and submitted='yes'); ";
    $result = $conn->query($query);
    $user_id = "";
    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["id" => $row["id"], "title" => $row["title"], "time" => $row["time"]]);
        }
        return $info;
    } else {
        return [];
    }

}

?>


