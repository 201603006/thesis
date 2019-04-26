<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$idnumber = $role = $email = $firstname = $lastname = $password = $confirm_password = "";
$idnumber_err = $role_err = $email_err = $firstname_err = $lastname_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate idnumber
    if(empty(trim($_POST["idnumber"]))){
        $idnumber_err = "Please enter a ID Number.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM users WHERE idnumber = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_idnumber);

            // Set parameters
            $param_idnumber = trim($_POST["idnumber"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $idnumber_err = "This ID Number is already taken.";
                } else{
                    $idnumber = trim($_POST["idnumber"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }


	// Validate Role
	 if(empty(trim($_POST["role"]))){
        $role_err = "Please select a role.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM users WHERE role = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_role);

            // Set parameters
            $param_role = trim($_POST["role"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $role_err = "This email is already taken.";
                } else{
                    $role = trim($_POST["role"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }



	// Validate Email
	    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an Email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM users WHERE email = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }


    if(empty(trim($_POST["firstname"]))){
      $firstname_err = "Please enter your first name.";
    } else{
      // Prepare a select statement
      $sql = "SELECT userid FROM users WHERE firstname = ?";

      if($stmt = $mysqli->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bind_param("s", $param_firstname);

          // Set parameters
          $param_firstname = trim($_POST["firstname"]);

          // Attempt to execute the prepared statement
          if($stmt->execute()){
              // store result
              $stmt->store_result();

              if($stmt->num_rows == 1){
                  $firstname_err = "This name is already taken.";
              } else{
                  $firstname = trim($_POST["firstname"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
	  $stmt->close();
    }

	if(empty(trim($_POST["lastname"]))){
      $lastname_err = "Please enter your first name.";
    } else{
      // Prepare a select statement
      $sql = "SELECT userid FROM users WHERE lastname = ?";

      if($stmt = $mysqli->prepare($sql)){
          // Bind variables to the prepared statement as parameters
          $stmt->bind_param("s", $param_lastname);

          // Set parameters
          $param_lastname = trim($_POST["lastname"]);

          // Attempt to execute the prepared statement
          if($stmt->execute()){
              // store result
              $stmt->store_result();

              if($stmt->num_rows == 1){
                  $lastname_err = "This name is already taken.";
              } else{
                  $lastname = trim($_POST["lastname"]);
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }
	  $stmt->close();
    }

	    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(
		empty($idnumber_err) &&
		empty($role_err) &&
		empty($email_err) &&
		empty($firstname_err) &&
		empty($lastname_err) &&
		empty($password_err) &&
		empty($confirm_password_err))
	{


        // Prepare an insert statement
        $sql = "INSERT INTO users (idnumber,
									role,
									email,
									firstname,
									lastname,
									password)
							VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss",
							  $param_idnumber,
							  $param_role,
							  $param_email,
							  $param_firstname,
							  $param_lastname,
							  $param_password);

            // Set parameters
            $param_idnumber  = $idnumber;
			$param_role		 = $role;
			$param_email	 = $email;
            $param_firstname = $firstname;
			$param_lastname  = $lastname;
			$param_password  = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <meta charset="UTF-8">
    <title>ERSBS - Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  <!--NAVBAR-->
  <div id="navigation">
    <?php
      include("navbarguest.php");
    ?>
  </div>

    <div class="wrapper mx-auto" id="registerWrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
      <hr>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

		<div class="form-group <?php echo (!empty($idnumber_err)) ? 'has-error' : ''; ?>">
			<label>ID Number</label>
			<input type="text" onkeypress="isInputNumber(event)" name="idnumber" class="form-control" placeholder="ID Number" value="<?php echo $idnumber; ?>">
			<span class="help-block"><?php echo $idnumber_err; ?></span>
		</div>

		<div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
			<p>Role</p>
			<select name="role" class="form-control" value="<?php echo $role; ?>" required>
					<option selected hidden value=""> -- </option>
					<option value="student">	Students</option>
					<option value="alumni">		Alumni</option>
					<option value="professor">	Professor</option>
			</select>
			<span class="help-block"><?php echo $role_err; ?></span>
		</div>

        <div class="row">
        <div class="form-group col-lg-6 <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
          <label for="firstname">First Name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="<?php echo $firstname; ?>">
          <span class="help-block"><?php echo $firstname_err; ?></span>
        </div>

        <div class="form-group col-lg-6 <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>">
          <span class="help-block"><?php echo $lastname_err; ?></span>
        </div>

		</div>

			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
				<label>Email address</label>
				<input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $email; ?>">
				<span class="help-block"><?php echo $email_err; ?></span>
			</div>

      <div class="row">
			<div class="form-group col-lg-6 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>


			<div class="form-group col-lg-6 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
      </div>

			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Clear">
      </div>
    </form>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
  </div>

	<div id="foot-placeholder">
	</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script>
			function isInputNumber(evt) {
				var ch = String.fromCharCode(evt.which);
				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
			$(function(){
				$("#foot-placeholder").load("footer.php");
			});
		</script>
</body>
</html>
