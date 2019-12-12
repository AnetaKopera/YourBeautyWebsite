<?php 
  session_start();
  if(!isset($_SESSION['admin']))
  {
	header("location: login_form.php");
	exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create firm</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a class="active" href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php">Add service</a>
  <a href="create_tenure_form.php">Add tenure </a>
  <a href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a href="create_worker_form.php">Add worker </a>
</div>

<div class="formularz">
	<form action="add_new_firm.php" method="post">

	<label for="nameOfCompany">Name of company: </label>
	<input type="text" id = "nameOfCompany" name = "nameOfCompany"><br>
	<?php 
		if(isset($_SESSION['error_nameOfCompany'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_nameOfCompany'] ."</p>";
			unset($_SESSION['error_nameOfCompany']);
		}
	?>

	<label for="idOwner">Id owner: </label>
	<input type="text" id = "idOwner" name = "idOwner"><br>
	<?php 
		if(isset($_SESSION['error_idOwner'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_idOwner'] ."</p>";
			unset($_SESSION['error_idOwner']);
		}
	?>


	<label for="city">City: </label>
	<input type="text" id = "city" name = "city"><br>
	<?php 
		if(isset($_SESSION['error_city'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_city'] ."</p>";
			unset($_SESSION['error_city']);
		}
	?>


	<label for="street">Street: </label>
	<input type="text" id = "street" name = "street"><br>
	<?php 
		if(isset($_SESSION['error_street'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_street'] ."</p>";
			unset($_SESSION['error_street']);
		}
	?>


	<label for="category">Category: </label>
	<input type="text" id = "category" name = "category"><br>
	<?php 
		if(isset($_SESSION['error_category'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_category'] ."</p>";
			unset($_SESSION['error_category']);
		}
	?>
			  
	<button class="button" type="submit"><span>Create firm</span></button>
	
</form>
	
	<div id="snackbar">Firm succesfully added!</div>
	<div id="snackbar2">Firm not added!</div>
	
	<script>
	function Positive()
	{
		var x = document.getElementById("snackbar"); 
		x.className = "show";
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}

	function Negative()
	{
		var x = document.getElementById("snackbar2"); 
		x.className = "show";
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
	</script>
	<?php
	if(isset($_SESSION['added_firm']) && ($_SESSION['added_firm']==true))
	{
		echo '<script type="text/javascript">',
		'Positive();',
		'</script>';
		unset($_SESSION['added_firm']);
		
	}

	if(isset($_SESSION['added_firm']) && ($_SESSION['added_firm']==false))
	{
		echo '<script type="text/javascript">',
		'Negative();',
		'</script>';
		unset($_SESSION['added_firm']);	
	}
	?>
	
</div>

</body>
</html>