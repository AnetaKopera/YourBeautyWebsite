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
<title>Create user</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php" >Add service</a>
  <a href="create_tenure_form.php" >Add tenure </a>
  <a href="create_timeofworking_form.php">Add time of working </a>
  <a class="active" href="create_user_form.php">Add user </a>
  <a  href="create_worker_form.php">Add worker </a>
</div>

<div id="panel-page-container">
<div class="formularz">
	<form action="add_new_user.php" method="post">

	<label for="surname">Surname: </label>
	<input type="text" id = "surname" name = "surname"><br>
	<?php 
		if(isset($_SESSION['error_surname'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_surname'] ."</p>";
			unset($_SESSION['error_surname']);
		}
	?>

	<label for="name">Name: </label>
	<input type="text" id = "name" name = "name"><br>
	<?php 
		if(isset($_SESSION['error_name'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_name'] ."</p>";
			unset($_SESSION['error_name']);
		}
	?>

	<label for="name2">Second name: </label>
	<input type="text" id = "name2" name = "name2"><br>
	<?php 
		if(isset($_SESSION['error_name2'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_name2'] ."</p>";
			unset($_SESSION['error_name2']);
		}
	?>

	<label for="date_of_birth">Date of birth: </label>
	<input type="text" id = "date_of_birth" name = "date_of_birth"><br>
	<?php 
		if(isset($_SESSION['error_date_of_birth'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_date_of_birth'] ."</p>";
			unset($_SESSION['error_date_of_birth']);
		}
	?>

	<label for="gender">Gender: </label>
	<input type="text" id = "gender" name = "gender"><br>
	<?php 
		if(isset($_SESSION['error_gender'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_gender'] ."</p>";
			unset($_SESSION['error_gender']);
		}
	?>

	<label for="account_type">Account type: </label>
	<input type="text" id = "account_type" name = "account_type"><br>
	<?php 
		if(isset($_SESSION['error_account_type'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_account_type'] ."</p>";
			unset($_SESSION['error_account_type']);
		}
	?>

	<label for="email"> Email: </label>
	<input type="text" id = "email" name = "email"><br>
	<?php 
		if(isset($_SESSION['error_email'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_email'] ."</p>";
			unset($_SESSION['error_email']);
		}
	?>

	<label for="password"> Password: </label>
	<input type="password" id = "password" name = "password"><br>
	<?php 
		if(isset($_SESSION['error_password'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_password'] ."</p>";
			unset($_SESSION['error_password']);
		}
	?>

	<label for="bank_account_number"> Bank account number: </label>
	<input type="text" id = "bank_account_number" name = "bank_account_number"><br>
	<?php 
		if(isset($_SESSION['error_bank_account_number'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_bank_account_number'] ."</p>";
			unset($_SESSION['error_bank_account_number']);
		}
	?>
			  
	<button class="button" type="submit"><span>Create user</span></button>
	</form>
</div>


	
<script>
	function TextPositive()
	{
		document.getElementById('snackbar').textContent = "User successfully aded.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "User NOT aded.";
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
	if(isset($_SESSION['added_user']) )
	{
		echo '<script>';
		if($_SESSION['added_user'] ==true) 		{ echo 'TextPositive();';}
		else 										{ echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['added_user']);
		
	}
?>


</div>
</div>

</body>
</html>