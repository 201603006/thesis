<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
    header("location: index.php");
    exit;
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
		<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
		
		#register_form fieldset:not(:first-of-type) {
		display: none;
		}
		</style>
		<title> ERSBS | Event's Proposal Page </title>

	</head>
  <body>

    <div id="navigation">
			<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
				  <a class="navbar-brand" href="homepage.php">ERSBS</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
							<span class="navbar-toggler-icon"></span>
				  </button>


				  <div class="collapse navbar-collapse justify-content-end" id="myNavbar">
						<form class="form-inline ml-auto search-custom">
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Search an event" aria-label="Recipient's username" aria-describedby="basic-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-light" type="button">
										<i class="fa fa-search"></i>
									</button>
							</div>
							</div>
						</form>

						<ul class="navbar-nav ml-auto">
		            <li class="nav-item">
		                <a href="homepage.php" class="nav-link m-1 menu-item nav-active text-white">
						Home</a>
		            </li>
					<li class="nav-item">
		                <a href="user_profile.php" class="nav-link m-1 menu-item text-white">
						My Profile</a>
		            </li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle m-1 text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Events
						</a>
					  <div class="dropdown-menu dropdown-custom" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-white" href="#">
							My Events</a>
						<a class="dropdown-item text-white" href="form.php">
							Create Event</a>
					  </div>
					</li>
					<li class="nav-item">
		                <a href="#" class="nav-link m-1 menu-item text-white">
						Schedule</a>
		            </li>

					<button type="button" class="btn btn-outline-light m-1 inline" button onclick="location.href='logout.php'">
					Sign Out</button>
					</ul>
				  </div>
			</nav>
		</div>
			
<br><br><br><br><br><br>
<div class="container">

		<div class="progress">
			<div class="progress-bar progress-bar-striped active" 
				role="progressbar" 
				aria-valuemin="0" 
				aria-valuemax="100">
			</div>
		</div>
			<!--<div class="alert alert-success hide"></div>-->
	<form id="register_form" action="insert.php" method="POST">

		<br>
		<fieldset>
			<div class="form-group">	
				<label>
					<b>Step 1 - </b>
					<i>Select Event Category</i>
				</label>
				<br>
				<br>
				<p>Event Category :</p>
				<select name="eventCategory" class="form-control" required>
					<option selected hidden value=""> -- </option>
					<option value="Try-Outs/Auditions">	  Try-Outs/Auditions</option>
					<option value="Workshops">			  Workshops</option>
					<option value="Selling">			  Selling </option>
					<option value="Campaigns">			  Campaigns</option>
					<option value="Performances">		  Performances </option>
					<option value="Conventions/Symposia"> Conventions/Symposia</option>
					<option value="General Assemblies">	  General Assemblies</option>
					<option value="Trainings">			  Trainings </option>
					<option value="Competitions">		  Competitions</option>
				</select>
			</div>
			<input type="button" 
					name="next" 
					class="next-form btn btn-info" 
					value="Next" />
		</fieldset>

	<fieldset>
		<div class="form-group">
			<label>
				<b>Step 2 - </b>
				<i>Base Information</i>
			</label>
			<br>
			<br>
				<p>Event Name :</p>
				<input type="text" 
						name="eventName" 
						autocomplete="off"
						class="form-control" required>
			   <br>
			   <p>Organizer's ID :</p>
			   <input type="text" 
						name="organizerName" 
						class="form-control" 
						value=<?php echo htmlspecialchars($_SESSION["idnumber"]);?> 
						readonly>
			   <br>
			   <p>Venue :</p>
			   <input type="text" 
						name="venue" 
						class="form-control" required>
				<br>
			   
			   
			   
			   <p>Objectives :</p>
			   <input type="text" 
						name="objectives" 
						class="form-control" required>
				
				
				
				
				
				
				
				
				
				<br>
				<div class="row">
					<div class="form-group col-lg-6">
						<p>Start Date :</p>
						<input 	type="date" 
								name="startDate" 
								class="form-control"
								min="<?php echo date('Y-m-d'); ?>"
								onkeydown="return false"
								required>
						</div>
						
						<div class="form-group col-lg-6">
						<p>Start Time :</p>
						<input 	type="time" 
								name="startTime" 
								class="form-control" required>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-lg-6">
						<p>End Date :</p>
						<input 	type="date" 
								name="endDate" 
								class="form-control" 
								min="<?php echo date('Y-m-d'); ?>"
								onkeydown="return false"
								required> 
					</div>
					<div class="form-group col-lg-6">
						<p>End Time :</p>
						<input 	type="time" 
								name="endTime" 
								class="form-control" required>
					</div>
				</div>
				<br>
				<p>Maximum No. Of Participant :</p>
				
						<input type="number" 
								name="estAttendees" 
								class="form-control"
								min="1"
								oninput="validity.valid||(value='');"
								required>
	
						<br>
						<p>Competition Structure :</p>
						<select name="competitionStructure" 
								class="form-control" required>
									<option selected hidden value="">	-- </option>
									<option value="singleElimination">	Single Elimination</option>
									<option value="doubleElimination">	Double Elimination</option>
									<option value="roundRobin">		  	Round Robin</option>
				</select>
				<br>
		</div>
			<input type="button" 
					name="previous" 
					class="previous-form btn btn-default" 
					value="Previous" />
					
			<input type="button" 
					name="next" 
					class="next-form btn btn-info" 
					value="Next" />	
	</fieldset>

	
	<fieldset> 
	<div class="form-group">
			<label>
				<b>Step 3 - </b>
				<i>Budget Proposal</i>
			</label>
			<br>
			<br>
			<p>Source Funding :</p>
			<input type="text" 
					name="sourceFunding" 
					class="form-control" required>
			<br>
			<p>Activity Title :</p>
			<input type="text" 
					name="actTitle" 
					class="form-control" required>
			<br>
			<p>Amount :</p>
			<input type="number" 
					name="amount" 
					class="form-control"					
					min="0"
					oninput="validity.valid||(value='');"
					required>
			<br>
			<p>Total funding for the project :</p>
			<input type="number" 
					name="totalFunding" 
					class="form-control" 
					oninput="validity.valid||(value='');"
					required>

			<br>
			<p>Particular Items:</p>
			 <input type="text" 
					name="itemPart" 
					class="form-control" required>
			<br>
			<p>Quantity:</p>
			 <input type="number" 
					name="itemQty" 
					class="form-control" 
					min="0"
					oninput="validity.valid||(value='');"
					required>
			<br>
			<p>Amount :</p>
			 <input type="number" 
					name="itemAmount" 
					class="form-control"
					oninput="validity.valid||(value='');"
					required>
			<br>
			<p>Total expense for the project :</p>
			 <input type="number" 
					name="totalExpense" 
					class="form-control"
					oninput="validity.valid||(value='');"
					required>

		</div>		
			<input type="button" 
					name="previous" 
					class="previous-form btn btn-default" 
					value="Previous" />	
			<input type="button" 
					name="next" 
					class="next-form btn btn-info" 
					value="Next" />
	</fieldset>

	
   <fieldset>
		<div class="form-group">
			<label>
				<b>Step 4 - </b>
				<i>Event Details</i>
			</label>
			<br>
			<br>
			<p>List of Needed Equipments/Materials<p>
			<br>
			<p>Quantity :</p>
			<input type="number" 
					name="matQty" 
					class="form-control"
					oninput="validity.valid||(value='');"
					required>
			<br>
			<br>
			<p>Materials/Equipment:</p>
			<input type="text" 
					name="materials" 
					class="form-control" required>
			<br>
			<p>Action Plan :</p>
			<input type="text" 
					name="actionPlan" 
					class="form-control" required>
			<br>
			<p>Event Description :</p>
			<input type="text" 
					name="eventInformation" 
					class="form-control" required>
		<!--
		<	br>
			<p>Venue Setup :</p>
			<br>
			<p>Select file to upload: </p>
			<input type="file" 
					name="fileToUpload" 
					id="fileToUpload">
			<br>
			<input type="submit" 
					value="Upload File" 
					name="submit">
			<br>
			<p>Event Poster :</p>
			<br>
			<p>Select file to upload: </p>
			<input type="file" 
					name="fileToUpload" 
					id="fileToUpload">
			<br>
			<input type="submit" 
					value="Upload File" 
					name="submit">
			<br>
		-->
	</div>
			<input type="button" 
					name="previous" 
					class="previous-form btn btn-default" 
					value="Previous" />
			
			<input type="button" 
					name="next" 
					class="next-form btn btn-info" 
					value="Next" />
	</fieldset>

	
   <fieldset>
	<div class="form-group">
		<label>
			<b>Step 5 - </b>
			<i>Program</i>
		</label>
		<br>	
		<br>
		<p>Date :</p>
		<input type="date" 
				name="progamDate" 
				class="form-control" 
				min="<?php echo date('Y-m-d'); ?>"
				onkeydown="return false"
				required>
		<br>
		<p>Time :</p>
		<input type="time" 
				name="programTime" 
				class="form-control" required>
		<br>
		<p>Activity :</p>
		<input type="text" 
				name="programAct" 
				class="form-control" required>
	</div>  
		<input type="button" 
				name="previous" 
				class="previous-form btn btn-default" 
				value="Previous" />
    
	</fieldset>
	<br><hr>
	<div class="form-group">
	<input type="submit" 
				class="btn btn-primary" 
				value="Submit">
	</div>
	</form>
</div>
	<script src="js/form.js" 
			charset="utf-8">
	</script>
	
</body>
</html>
