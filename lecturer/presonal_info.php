<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Personal Info</title>
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
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Personal Info&nbsp;&nbsp;</h2>
                </div>
                <div class="panel-body">
                    <form action="../database/Edit_Info.php" method="post">
                        <?php
                        $info  = getInfo();
                        //print_r($info[0]);
                        if(count($info)<1){

                           echo ' <p class="text-left" style="color: white; background-color: red" > Access to this page is illegal, Please sign in </p>';
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


                        <div class="form-group mb-lg">
                            <label class="pull-left">email address :</label>
                            <div class="input-group input-group-icon">
                                <input name="username" type="text" class="form-control input-lg" placeholder="Username" required value="<?php echo $info[0]["email"] ?>" readonly/>
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Password :</label>

                            </div>
                            <div class="input-group input-group-icon">
                                <input name="pwd" type="text" class="form-control input-lg" placeholder="**********" value="<?php echo $info[0]["password"] ?>" required/>
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <label class="pull-left">Name :</label>
                            <div class="input-group input-group-icon">
                                <input name="name" type="text" class="form-control input-lg" placeholder="Username" required value="<?php echo $info[0]["name"] ?>"/>
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <label class="pull-left">ID :</label>
                            <div class="input-group input-group-icon">
                                <input name="age" type="text" class="form-control input-lg" placeholder="Username" required value="<?php echo $info[0]["age"] ?>"/>
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <label class="pull-left">Major :</label>
                            <div class="input-group input-group-icon">
                                <input name="type" type="text" class="form-control input-lg" placeholder="Username" required value="<?php echo $info[0]["type"] ?>" readonly/>
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 text-right pull-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Edit Info</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Edit Info</button>
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
    $query = "select * from  `users` where email = '" . $_SESSION['user_email'] . "'";
    $result = $conn->query($query);
    $user_id = "";
    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["email" => $row["email"], "type" => $row["type"], "name" => $row["name"], "age" => $row["age"], "password" => $row["password"]]);
        }
        return $info;
    } else {
        header('Location: ../sign_in.php');
    }

}

?>


