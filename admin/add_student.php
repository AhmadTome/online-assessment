<?php
session_start();
?>
<html>
<title>Add student</title>
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
<section class="body-sign col-xs-12 col-lg-offset-3">
    <div class="center-sign">

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-left">
                <h2 class="title text-uppercase text-bold m-none"> create account for Student &nbsp;&nbsp;<i class="fa fa-user mr-xs"></i></h2>
            </div>
            <div class="panel-body">
                <form name="loginForm" action="../database/register.php" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
                    <div class="form-group mb-lg">
                        <label class="pull-left">Name :</label>
                        <input  name="name" type="text" class="form-control input-lg text-left" placeholder="Enter your name ..." required/>
                    </div>

                    <div class="form-group mb-lg">
                        <label class="pull-left">ID :</label>
                        <input  name="age" type="text" class="form-control input-lg text-left" placeholder="Enter your age ..." required/>
                    </div>

                    <div class="form-group mb-lg">
                        <label class="pull-left">E-mail :</label>
                        <input name="email" type="email" class="form-control input-lg" placeholder="example@company.com" required/>
                    </div>

                    <div class="form-group mb-lg" >
                        <label class="pull-left">Password :</label>
                        <div class="input-group input-group-icon" >

                            <div class="col-xs-8"> <input name="pwd" id="pass" type="password" class="form-control input-lg col-xs-10" placeholder="Password" required/> </div>
                            <div class="col-xs-4"><input type="button" class="myButton" id="generate" value="generate"> <br> <input type="checkbox" onclick="myFunction()">
                                show</div>


                        </div>
                    </div>

                    <p class="text-left" style="color: red">
                        <?php
                        if( isset($_SESSION['Error']) )
                        {
                            echo $_SESSION['Error'];

                            unset($_SESSION['Error']);

                        }
                        ?>
                    </p>

                    <p class="text-left" style="color: green">
                        <?php
                        if( isset($_SESSION['added_correctly']) )
                        {
                            echo $_SESSION['added_correctly'];

                            unset($_SESSION['added_correctly']);

                        }
                        ?>
                    </p>
                    <div class="row pull-right col-sm-6">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Registor now </button>
                        </div>
                    </div>

                    <input type="text" name="hiddenInput" value="student" style="display: none;">

                    <!-- <p class="text-center">Do you have account ?  <a href="sign_in.php">login</a> -->

                </form>
            </div>
        </div>
    </div>
</section>
<!-- end: page -->
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
    function myFunction() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(document).ready(function () {
        $("#generate").on("click",function () {
            var randomstring = Math.random().toString(36).slice(-8);
            $("#pass").val(randomstring)


        })

    })

    function validateForm() {
        var pass = document.forms["loginForm"]["pwd"].value;
        var pass_confirm = document.forms["loginForm"]["pwd_confirm"].value;
        if (pass != pass_confirm) {
            alert("الرقم السري غير متطابق, الرجاء إعادة التطابق");
            return false;
        }
    }

</script>
