<?php
$eventCategory 			= $_POST['eventCategory'];
$eventName 				= $_POST['eventName'];
$eventInformation 		= $_POST['eventInformation'];
$organizerName			= $_POST['organizerName'];
$venue 					= $_POST['venue'];
$objectives 			= $_POST['objectives'];
$startDate				= $_POST['startDate'];
$startTime				= $_POST['startTime'];
$endDate				= $_POST['endDate'];
$endTime				= $_POST['endTime'];
$competitionStructure 	= $_POST['competitionStructure'];
$estAttendees			= $_POST['estAttendees'];
$sourceFunding			= $_POST['sourceFunding'];
$actTitle				= $_POST['actTitle'];
$amount					= $_POST['amount'];
$totalFunding			= $_POST['totalFunding'];
$itemPart				= $_POST['itemPart'];
$itemQty				= $_POST['itemQty'];
$itemAmount				= $_POST['itemAmount'];
$totalExpense			= $_POST['totalExpense'];	
$matQty					= $_POST['matQty'];
$materials				= $_POST['materials'];
$actionPlan				= $_POST['actionPlan'];
$programAct				= $_POST['programAct'];

if (!empty($eventCategory) || 
	!empty($eventName) || 
	!empty($eventInformation) || 
	!empty($organizerName)	|| 
	!empty($venue) || 
	!empty($objectives) || 
	!empty($startDate) ||
	!empty($startTime) ||
	!empty(endDate) ||
	!empty(endTime) ||
	!empty($competitionStructure) ||
	!empty($estAttendees) ||
	!empty($sourceFunding) ||
	!empty($actTitle) ||
	!empty($amount) ||
	!empty($totalFunding) ||
	!empty($itemPart) ||
	!empty($itemQty) ||
	!empty($itemAmount) ||
	!empty($totalExpense) ||
	!empty($matQty) ||
	!empty($materials) ||
	!empty($actionPlan) ||
	!empty($programAct) 
	) {
    
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "ersbs";
    //create connection
    //
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
	 
	 $SELECT = "SELECT eventName From event Where eventName = ? Limit 1";
     $INSERT = "INSERT Into event (eventCategory, 
									eventName, 
									eventInformation, 
									organizerName, 
									venue, 
									objectives, 
									startDate,
									startTime,
									endDate,
									endTime,
									competitionStructure,
									estAttendees,
									sourceFunding,
									actTitle,
									amount,
									totalfunding,
									itemPart,
									itemQty,
									itemAmount,
									totalExpense,
									matQty,
									materials,
									actionPlan,
									programAct) 
									
									
				values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
									
									
	 //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $eventName);
     $stmt->execute();
     $stmt->bind_result($eventName);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
	 if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssssssssissiisiiiisss", 
						$eventCategory, 
						$eventName, 
						$eventInformation, 
						$organizerName, 
						$venue, 
						$objectives, 
						$startDate,
						$startTime,
						$endDate,
						$endTime,
						$competitionStructure,
						$estAttendees,
						$sourceFunding,
						$actTitle,
						$amount,
						$totalFunding,
						$itemPart,
						$itemQty,
						$itemAmount,
						$totalExpense,
						$matQty,
						$materials,
						$actionPlan,
						$programAct );
						
						
      $stmt->execute();
	  
	  $message = "Proposal successfully sent to OSEA Department";
	  echo "<script type='text/javascript'>alert('$message');</script>" . 
	  include("homepage.php");
	  
     } else {
	  $message_err = "Someone already created an event using this event name"; 	
      echo "<script type='text/javascript'>alert('$message_err');</script>" .
	  include("form.php");
     }
	 
     $stmt->close();
     $conn->close();
    }
} else {
		$message_else = "All fields are required"; 	
		echo "<script type='text/javascript'>alert('$message_else');</script>";
 
 die();
}
?>
