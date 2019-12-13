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
<title>Create services</title>
<link rel="stylesheet" href="style.css">

</head>
<body>


<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a class="active" >Add service</a>
  <a href="create_tenure_form.php">Add tenure </a>
  <a href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a href="create_worker_form.php">Add worker </a>
</div>

<div class="formularz">
	<form action="add_new_service.php" method="post">

	<label for="typeOfService">Type of service: </label>
	<input type="text" id = "typeOfService" name = "typeOfService"><br>
	<?php 
		if(isset($_SESSION['error_typeofservice'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_typeofservice'] ."</p>";
			unset($_SESSION['error_typeofservice']);
		}
	?>

	<label for="description">Description: </label>
	<input type="text" id = "description" name = "description"><br>
	<?php 
		if(isset($_SESSION['error_description'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_description'] ."</p>";
			unset($_SESSION['error_description']);
		}
	?>


	<label for="price">Price: </label>
	<input type="text" id = "price" name = "price"><br>
	<?php 
		if(isset($_SESSION['error_price'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_price'] ."</p>";
			unset($_SESSION['error_price']);
		}
	?>


	<label for="timeOfService">Time of service: </label>
	<input type="text" id = "timeOfService" name = "timeOfService"><br>
	<?php 
		if(isset($_SESSION['error_timeofservice'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_timeofservice'] ."</p>";
			unset($_SESSION['error_timeofservice']);
		}
	?>


	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>
	<?php 
		if(isset($_SESSION['error_idFirm'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_idFirm'] ."</p>";
			unset($_SESSION['error_idFirm']);
		}
	?>
			  
	<button class="button" type="submit"><span>Create service</span></button>
	</form>
	
</div>

	
	
<script>
	function TextPositive()
	{
		document.getElementById('snackbar').textContent = "Service successfully aded.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Service NOT aded.";
	}
</script>

	
<div id="snackbar"></div>	
<script>
	function SnackbarShow()
	{
		var x = document.getElementById("snackbar"); 
		x.className = "show";
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>

<?php
	if(isset($_SESSION['added_service']) )
	{
		echo '<script>';
		if($_SESSION['added_service'] ==true) 		{ echo 'TextPositive();';}
		else 										{ echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['added_service']);
		
	}
?>



</body>
</html>