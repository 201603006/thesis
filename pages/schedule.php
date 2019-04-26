<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<html>
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

	<br><br><br><br>
		<h1><center>Insert Calendar ni Rongie here</h1>
		<h5><center>SAMPLE TO NG WORKING OUTPUT NI ALMICH</h5>

 <div class="container">
        <p><br><br></p>
        <form name="cart">
            <table name="cart" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Item Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr name="line_items">
                        <td><button name="remove" class="btn btn-danger btn-sm">Remove</button></td>
                <td>  <input type="text" name="fname"></td>
                        <td><input type="text" name="qty" value="" class="form-control form-control-sm"/></td>
                        <td><input type="text" name="price" value="" class="form-control form-control-sm"/></td>
                        <td><input type="text" name="item_total" jAutoCalc="{qty} * {price}" class="form-control form-control-sm"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total</td>
                        <td>&nbsp;</td>
                        <td><input type="text" name="total" jAutoCalc="SUM({item_total})" class="form-control form-control-sm"/></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <button name="add" class="btn btn-primary">Add</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
	<script src="js/jquery.min.js"></script>
    <script src="js/jautocalc.js"></script>
    <script src="js/script.js"></script>
	<script src="js/form.js" charset="utf-8"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			var i=1;
			$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
			});

		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id");
			$('#row'+button_id+'').remove();
			});

		});
	</script>
</body>
</html>
