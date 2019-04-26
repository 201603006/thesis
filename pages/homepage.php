<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--favicon-->
		<link rel="icon" type="image/png" href="">
		<!--bootstrap-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<!--custom css-->
		<link rel="stylesheet" href="css/style.css">
		<!--fontawesome-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<title> ERSBS | iACADEMY's Official Event Management Platform </title>

	</head>
  <body>
  <!--Navbar-->
  <div id="navigation">
    <?php
      include("navbarstudent.php");
    ?>
    </div>
	</div>

  <!-- Landing page -->
  <div id="main-landing">
    <div id="carouselCustom" class="carousel slide carousel-fade d-none d-lg-block" data-ride="carousel">
        <div class="carousel-caption d-none d-md-block">
          <h2>Welcome to ERSBS</h2>
          <p>The official iACADEMY's Events Registration, <br> Scheduling & Bracketing System. </p>
        </div>

        <ol class="carousel-indicators">
          <li data-target="#carouselCustom" data-slide-to="0" class="active"></li>
          <li data-target="#carouselCustom" data-slide-to="1"></li>
          <li data-target="#carouselCustom" data-slide-to="2"></li>
        <li data-target="#carouselCustom" data-slide-to="3"></li>
        <li data-target="#carouselCustom" data-slide-to="4"></li>
          <li data-target="#carouselCustom" data-slide-to="5"></li>
        <li data-target="#carouselCustom" data-slide-to="6"></li>
        </ol>


        <!--CONTENTS NUNG CAROUSEL-->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/img01.jpg" alt="First slide">
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/img02.jpg" alt="Second slide">
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/img03.jpg" alt="Third slide">
          </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="img/img04.jpg" alt="Third slide">
          </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="img/img05.jpg" alt="Third slide">
          </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="img/img06.jpg" alt="Third slide">
          </div>
        </div>


        <!--NAVIGATION BUTTON NG CAROUSEL-->
        <a class="carousel-control-prev" href="#carouselCustom" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselCustom" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

    </div>
  </div>

    <!--Events Posters -->
    <div class="container mx-auto" id="postersCarousel">
        <div class="row blog">
            <div class="col-md-12">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#blogCarousel" data-slide-to="1"></li>
                    </ol>

                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style="height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style="height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style="height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style="height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style=" height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                                <div class="col-md-4 mx-auto poster">
                                    <a href="#">
                                        <img src="img/sample.png" alt="Image" style="height: 442px;
                                        width:595px; max-width:100%;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="announcementSection">
      <div class="container">

      </div>
    </div>
		<!-- About -->
		<div id="aboutSection">
			<div class="row">
          <div class="col-md-6">
						<img class="about-img" src="img/sample.png" alt="Card image cap">
					</div>

					<div class="col-md-6 details">
		 					<div class="about">
								<h5>About Us</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget accumsan quam. Aenean ac ligula lectus. Pellentesque rutrum sodales justo ut fringilla. Praesent imperdiet leo a ipsum cursus, at dictum risus facilisis.</p>
							</div>
      				<br>
							<div class="contact">
								<h5>Contact Us</h5>
								<p><span class="title"> Address:</span> <span> iACADEMY Nexus Campus, 7434 Yakal, Makati, 1203</span></p>
								<p><span class="title"> E-mail: </span><span>inquire@iacademy.edu.ph</span></p>
								<p><span class="title"> Phone: </span><span> (02) 889-5555</span><p>
							</div>
					</div>
			</div>
		</div>

		<!-- Footer -->
		<footer class="page-footer font-small">
		  <div class="footer-copyright text-center py-3">© 2019 Copyright -
		    <a href="homepage.php"> ERSBS</a>
		  </div>

		</footer>

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<script>

  </body>
  </html>
