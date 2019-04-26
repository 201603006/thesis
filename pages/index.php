<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: homepage.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$idnumber = $password = "";
$idnumber_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if idnumber is empty
    if(empty(trim($_POST["idnumber"]))){
        $idnumber_err = "Please enter ID Number.";
    } else{
        $idnumber = trim($_POST["idnumber"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($idnumber_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userid, idnumber, password FROM users WHERE idnumber = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_idnumber);

            // Set parameters
            $param_idnumber = $idnumber;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if idnumber exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($id, $idnumber, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] 	= true;
                            $_SESSION["userid"] 	= $userid;
                            $_SESSION["idnumber"] 	= $idnumber;
                            $_SESSION["role"]		= $role;

                            // Redirect user to welcome page
                            header("location: homepage.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if idnumber doesn't exist
                    $idnumber_err = "No account found with that idnumber.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

			<title> ERSBS | iACADEMY's Official Event Management Platform </title>
		<style>
			.mapouter{
				position:relative;
				text-align:right;
				height:100%;
				width:100%;
        display: block;
			}
			.gmap_canvas {
				overflow:hidden;
				background:none!important;
				height:100%;
				width:100%;
        display: block;
			}
		</style>
	</head>
  <body>

    <!--NAVBAR-->
    <div id="navigation">
      <?php
        include("navbarguest.php");
      ?>
    </div>

    <!--MODAL CONTAINER AND RESULT-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

    		<div class="modal-header">
    			<h4 class="modal-title" id="exampleModalCenterTitle">Log In</h4>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
    			</button><br>
    		</div>

    		<div class="modal-body">
    			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    				<div class="form-group <?php echo (!empty($idnumber_err)) ? 'has-error' : ''; ?>">
    					<label>ID Number</label>
    					<input type="text"
    							name="idnumber"
    							class="form-control"
    							onpaste="return false"
    							onCopy="return false"
    							onCut="return false"
    							onDrag="return false"
    							onDrop="return false"
    							autocomplete="off"
    							value="<?php echo $idnumber; ?>">
    					<span class="help-block"><?php echo $idnumber_err; ?></span>
    				</div>

    				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    					<label>Password</label>
    					<input type="password"
    							name="password"
    							id="password1"
    							class="form-control">
    					<span class="help-block"><?php echo $password_err; ?></span>
    				</div>

    				<div class="form-group text-center">
    					<input type="submit" class="btn btn-primary btn-block mt-5" value="Login">
    				</div>


    				<div class="g-recaptcha" data-sitekey="6LekOpgUAAAAAJN5UMmSCUMgrukmcU4aUrDlbW2g"></div>


    				<div class="form-group text-center">
    					<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    				</div>
    		</div>

    	<!--	<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    		</div> -->
    			</form>
        </div>
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

   <!-- Events -->
		<div id="eventSection">
			<div class="container d-block">

					<div class="heading">
						<h4 class="text-center">Upcoming Events</h4>
					</div>

					<div class="row">
							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
								  <img class="card-img-top" src="img/sample.png" alt="Card image cap">
								  <div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								  </div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
								  <img class="card-img-top" src="img/sample.png" alt="Card image cap">
								  <div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								  </div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
								  <img class="card-img-top" src="img/sample.png" alt="Card image cap">
								  <div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								  </div>
								</div>
							</div>
					</div>

					<div class="row">
							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
									<img class="card-img-top" src="img/sample.png" alt="Card image cap">
									<div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
									<img class="card-img-top" src="img/sample.png" alt="Card image cap">
									<div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card mx-auto" style="width: 18rem;">
									<img class="card-img-top" src="img/sample.png" alt="Card image cap">
									<div class="card-body">
										<h5 class="event-title">Title of the Event Here</h5>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							</div>
					</div>

					<div class="more-events">
						  <h5 class="text-center"><a href="#">See More Events</a></h5>
					</div>
			</div>
		</div>

		<!-- About -->
		<div id="aboutSection">
			<div class="row">
				<div class="col-md-6">
					<div class="mapouter">
						<div class="gmap_canvas">
							<iframe width="600"
									height="100%"
									id="gmap_canvas"
									src="https://maps.google.com/maps?q=iacademy%20yakal&t=&z=17&ie=UTF8&iwloc=&output=embed"
									frameborder="0"
									scrolling="no"
									marginheight="0"
									marginwidth="0">
							</iframe>
						</div>
					<style>

					</style>
				</div>
				</div>

					<div class="col-md-6 details">
		 					<div class="about">
								<h5>About Us</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget accumsan quam. Aenean ac ligula lectus. Pellentesque rutrum sodales justo ut fringilla. Praesent imperdiet leo a ipsum cursus, at dictum risus facilisis.</p>
							</div>
      				<br>
							<div class="contact">
								<h5>Contact Us</h5>
								<p><span class="title"> Address:</span> <span>iACADEMY Nexus Campus, 7434 Yakal, Makati, 1203</span></p>
								<p><span class="title"> E-mail: </span><span>inquire@iacademy.edu.ph</span></p>
								<p><span class="title"> Phone: </span><span>(02) 889-5555</span><p>
							</div>
					</div>
			</div>
		</div>

    <!-- Footer -->
		<footer class="page-footer font-small">
		  <div class="footer-copyright text-center py-3">© 2019 Copyright -
		    <a href="index.php"> ERSBS</a>
		  </div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#password1').bind("cut copy paste",function(e) {
				e.preventDefault();
				});
			});


		</script>
  </body>
  </html>
