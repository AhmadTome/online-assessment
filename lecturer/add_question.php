<?php
session_start();

?>
<!DOCTYPE html>
<html>
<title>Add Question</title>
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
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Add new question&nbsp;&nbsp;</h2>
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
                    <form action="../database/add_question.php" method="post">

                        <div class="form-group mb-lg">
                            <label class="pull-left">Qustion Type :</label>
                            <div class="input-group input-group-icon">
                                <select class="form-control" name="question-type" id="question-type">
                                    <option value="none">--select question type--</option>
                                    <option value="multiple-choice" selected>multiple choice question</option>
                                    <option value="essay">essay question</option>
                                    <option value="true-false">True & False question</option>
                                    <option value="code-correction">code correction question</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-lg multiple-choice" >
                            <label class="pull-left">Question Text</label>
                            <div class="input-group input-group-icon">
                                <textarea class="form-control" rows="5" name="mq_text"></textarea>
                            </div>
                            <br>
                            <label class="pull-left">choice 1</label>
                            <div class="input-group input-group-icon">
                                <input name="choice1" type="text" class="form-control" placeholder="choice 1" />

                            </div>
                            <br>
                            <label class="pull-left">choice 2</label>
                            <div class="input-group input-group-icon">
                                <input name="choice2" type="text" class="form-control" placeholder="choice 2" />

                            </div>
                            <br>
                            <label class="pull-left">choice 3</label>
                            <div class="input-group input-group-icon">
                                <input name="choice3" type="text" class="form-control" placeholder="choice 3" />

                            </div>
                            <br>
                            <label class="pull-left">choice 4</label>
                            <div class="input-group input-group-icon">
                                <input name="choice4" type="text" class="form-control" placeholder="choice 4" />

                            </div>
                            <br>
                            <label class="pull-left">The Ansuwer is choice number : </label>
                            <div class="input-group input-group-icon">
                                <input name="choiceAnsuwer" type="number" class="form-control" placeholder="1 or 2 or 3 or 4" />

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-left pull-left">
                                    <label class="pull-left">Level</label><br>
                                    <div class="radio">
                                        <label><input type="radio" name="mlevel" value="Easy" checked>Easy</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="mlevel" value="Medium">Medium</label>
                                    </div>
                                    <div class="radio ">
                                        <label><input type="radio" name="mlevel" value="Hard">Hard</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-lg essay" style="display: none">
                            <label class="pull-left">Question Text</label>
                            <div class="input-group input-group-icon">
                                <textarea class="form-control" rows="5" name="eq_text"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-left pull-left">
                                    <label class="pull-left">Level</label><br>
                                    <div class="radio">
                                        <label><input type="radio" name="elevel" value="Easy" checked>Easy</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="elevel" value="Medium">Medium</label>
                                    </div>
                                    <div class="radio ">
                                        <label><input type="radio" name="elevel" value="Hard">Hard</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-lg true-false" style="display: none">
                            <label class="pull-left">Question Text</label>
                            <div class="input-group input-group-icon">
                                <textarea class="form-control" rows="5" name="tfq_text"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-left pull-left">
                                    <label class="pull-left">Answer</label><br>
                                    <div class="radio">
                                        <label><input type="radio" name="optiontf" value="true">True</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optiontf" value="false">False</label>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-left pull-left">
                                    <label class="pull-left">Level</label><br>
                                    <div class="radio">
                                        <label><input type="radio" name="tflevel" value="Easy" checked>Easy</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="tflevel" value="Medium">Medium</label>
                                    </div>
                                    <div class="radio ">
                                        <label><input type="radio" name="tflevel" value="Hard">Hard</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-lg code-correction" style="display: none">
                            <label class="pull-left">The Code :</label>
                            <div class="input-group input-group-icon">
                                <textarea class="form-control" rows="5" name="cq_text"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-left pull-left">
                                    <label class="pull-left">The errers in lines :</label><br>
                                    <div class="input-group input-group-icon">
                                        <input name="c_answer" type="text" class="form-control input-lg" placeholder="2,4,6 .... etc" />
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="radio">
                                    <label><input type="radio" name="clevel" value="Easy" checked>Easy</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="clevel" value="Medium">Medium</label>
                                </div>
                                <div class="radio ">
                                    <label><input type="radio" name="clevel" value="Hard">Hard</label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-8 text-right pull-right">
                                <button type="submit" class="btn btn-primary">Add the question</button>
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
        $('#question-type').on("change",function () {
            var val = $(this).val();
            if(val == "multiple-choice"){
                $(".multiple-choice").show();
                $(".essay").hide();
                $(".true-false").hide();
                $(".code-correction").hide();
            }else if (val == "essay"){
                $(".essay").show();
                $(".multiple-choice").hide();
                $(".true-false").hide();
                $(".code-correction").hide();
            }else if(val == "true-false") {
                $(".true-false").show();
                $(".multiple-choice").hide();
                $(".essay").hide();
                $(".code-correction").hide();
            }else if(val == "code-correction"){
                $(".code-correction").show();
                $(".multiple-choice").hide();
                $(".essay").hide();
                $(".true-false").hide();
            }else{
                $(".multiple-choice").hide();
                $(".essay").hide();
                $(".true-false").hide();
                $(".code-correction").hide();
            }
        })
    })
</script>
