<?php

if (isset($_COOKIE)) {
  session_start();
  foreach ($_COOKIE as $key => $value) {
    $_SESSION["$key"] = "$value";
  }
} else {
  session_start();
}

if (isset($_SESSION['error'])) {
  $_SESSION["error"] = null;
};

if (isset($_SESSION['errores'])) {
 $_SESSION["errores"] = null;
};

if (isset($_SESSION['inputsValues'])) {
  $_SESSION['inputsValues'] = null;
}
 ?>

<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Food and Restorent One page Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">



        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/animate/animate.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right">
                            <div class="call_us_text"></div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-pinterest-p"></i></a>
                                <a href=""><i class="fa fa-youtube"></i></a>
                                <a href=""><i class="fa fa-phone"></i></a>
                                <a href=""><i class="fa fa-camera"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- End navbar-collapse-->

            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="index.php"><img src="assets/images/logo.png" alt="" /></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                      <?php if (isset($_SESSION['nombre'])) { ?>
                                          <li><a href="index.php">Home</a></li>
                                      <li><a href="controllers/logout.controller.php">Log-Out</a></li>
                                    <?php } else { ?>
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="login.php">Log in</a></li>
                                      <li><a href="registro.php">Register</a></li>
                                    <?php } ?>
                                        <?php if (isset($_SESSION['nombre'])) { ?>
                                        <li><a class="booking"><?php echo "Hola,". $_SESSION['nombre']."!"; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Section -->

        <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1>About Us</h1>
                                    <button href="login.php" class="btn-lg">Join here</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                              <div class="container ">
                                <div class="panel-group" id="faqAccordion">
                                    <div class="panel panel-default ">
                                        <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                             <h4 class="panel-title">
                                                <a class="ing">Q: What is Lorem Ipsum?</a>
                                          </h4>

                                        </div>
                                        <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five <a href="http://jquery2dotnet.com/" class="label label-success">http://jquery2dotnet.com/</a> centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default ">
                                        <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                             <h4 class="panel-title">
                                                <a  class="ing">Q: Why do we use it?</a>
                                          </h4>

                                        </div>
                                        <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default ">
                                        <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                             <h4 class="panel-title">
                                                <a  class="ing">Q: Where does it come from?</a>
                                          </h4>

                                        </div>
                                        <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default ">
                                        <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                             <h4 class="panel-title">
                                                <a  class="ing">Q: Where can I get some?</a>
                                          </h4>

                                        </div>
                                        <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default ">
                                        <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                                             <h4 class="panel-title">
                                                <a  class="ing">Q: Where can I eat some?</a>
                                          </h4>

                                        </div>
                                        <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/panel-group-->
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="footer_widget" class="footer_widget">
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content text-center">
                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="2s">
                                <h3>Take it easy with location</h3>

                                <div class="single_widget_info">
                                    <p>112-Legere ancillae vix ne.

                                        <span>Te elit putent propriae eum,</span>
                                        <span>aliquip nominati</span>
                                        <span class="phone_email">phone: 00 000 000</span>
                                        <span>Email: support@templatemela.com</span></p>
                                </div>

                                <div class="footer_socail_icon">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                    <a href=""><i class="fa fa-pinterest-p"></i></a>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                    <a href=""><i class="fa fa-phone"></i></a>
                                    <a href=""><i class="fa fa-camera"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="4s">
                                <h3>Take it easy with location</h3>

                                <div class="single_widget_info">
                                    <p><span class="date_day">Monday To Friday</span>
                                        <span>8:00am to 10:00pm(Breakfast)</span>
                                        <span>11:00am to 10:00pm(Lunch/Diner)</span>

                                        <span class="date_day">Saturday & Sunday</span>
                                        <span>10:00am to 11:00pm(Brunch)</span>
                                        <span>11:00am to 12:00pm(Lunch/Dinner)</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="5s">
                                <h3>Take it easy with location</h3>

                                <div class="single_widget_form text-left">
                                    <form action="#" id="formid">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="first name" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Subject">
                                        </div> <!-- end of form-group -->

                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                                        </div>

                                        <input type="submit" value="click here" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright wow zoomIn" data-wow-duration="3s">
							<p></p>
						</div>
                    </div>
                </div>
            </div>
        </footer>

		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
