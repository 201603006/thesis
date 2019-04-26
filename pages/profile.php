<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE userid = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss",
							$param_password,
							$param_userid);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_userid = $_SESSION["userid"];

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: index.php");
                exit();
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

	</head>
  <body>
    <!--Navbar-->
    <div id="navigation">
      <?php
        include("navbarstudent.php");
      ?>
      </div>
    </div>


    <div id="profileSection">
      <div class="container d-block">
        <div class="wrapper mx-auto profileWrapper">
          <h4>ID Number: <b><?php echo htmlspecialchars($_SESSION["idnumber"]); ?></b> </h4>
          <h4>Name:   </h4>
          <h4>E-mail:</h4>
          <h4>Course:</h4>
          <h4>Contact Number: </h4>

          <button 	type="button"
					class="btn btn-primary btn-sm"
					data-toggle="modal"
					data-target="#edit">
            Edit Profile
          </button>

		  <button 	type="button"
					class="btn btn-secondary btn-sm"
					data-toggle="modal"
					data-target="#respass">
			Change Password
		  </button>

        </div>

      </div>
    </div>

    <!-- Modal EDIT PROFILE-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form>
            <div class="form-group">
              <label for="idnumber">ID Number</label>
              <input type="text" readonly class="form-control" id="idnumber" name="idnumber" value="<?php echo htmlspecialchars($_SESSION["idnumber"]); ?>" placeholder="ID Number">
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" placeholder="First Name">
              </div>

              <div class="form-group col-md-6">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
              </div>
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" placeholder="Email">
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCourse">Course</label>
                <select id="inputCourse" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="contactno">Contact Number</label>
                <input type="text" class="form-control" id="contactno" placeholder="Contact Number">
              </div>

            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="update_profile">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal RESET PASSWORD-->
    <div class="modal fade" id="respass" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLabel">Reset Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">

				<label>New Password</label>
                <input 	type="password"
						name="new_password"
						class="form-control"
						value="<?php echo $new_password; ?>">
				<span class="help-block"><?php echo $new_password_err; ?>
				</span>

            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

				<label>Confirm Password</label>
                <input 	type="password"
						name="confirm_password"
						class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?>
				</span>

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="homepage.php">Cancel</a>
            </div>
			</form>

          </div>
          <div class="modal-footer">
            <button type="submit"
					class="btn btn-primary"
					value="Submit"
					name="update_profile"
					href="homepage.php">
					Save changes
			</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script>
	$(function(){
		$("#respassholder").load("reset-password.php");
	});
	</script>
  </body>
  </html>
