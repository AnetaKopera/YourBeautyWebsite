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
<title>Create time of working</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php" >Add service</a>
  <a href="create_tenure_form.php" >Add tenure </a>
  <a class="active" href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a  href="create_worker_form.php">Add worker </a>
</div>

<div id="panel-page-container">
<div class="formularz">
	<form action="add_new_timeofworking.php" method="post">


	<label for="mondayStart">Monday start: </label>
	<input type="time" id = "mondayStart" name = "mondayStart"><br>
	<?php 
		if(isset($_SESSION['error_monday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_monday_start'] ."</p>";
			unset($_SESSION['error_monday_start']);
		}
	?>

	<label for="mondayStop">Monday stop: </label>
	<input type="time" id = "mondayStop" name = "mondayStop"><br>
	<?php 
		if(isset($_SESSION['error_monday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_monday_stop'] ."</p>";
			unset($_SESSION['error_monday_stop']);
		}
	?>


	<label for="tuesdayStart">Tuesday start: </label>
	<input type="time" id = "tuesdayStart" name = "tuesdayStart"><br>
	<?php 
		if(isset($_SESSION['error_tuesday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_tuesday_start'] ."</p>";
			unset($_SESSION['error_tuesday_start']);
		}
	?>

	<label for="tuesdayStop">Tuesday stop: </label>
	<input type="time" id = "tuesdayStop" name = "tuesdayStop"><br>
	<?php 
		if(isset($_SESSION['error_tuesday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_tuesday_stop'] ."</p>";
			unset($_SESSION['error_tuesday_stop']);
		}
	?>

	<label for="wednesdayStart">Wednesday start: </label>
	<input type="time" id = "wednesdayStart" name = "wednesdayStart"><br>
	<?php 
		if(isset($_SESSION['error_wednesday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_wednesday_start'] ."</p>";
			unset($_SESSION['error_wednesday_start']);
		}
	?>

	<label for="wednesdayStop">Wednesday stop: </label>
	<input type="time" id = "wednesdayStop" name = "wednesdayStop"><br>
	<?php 
		if(isset($_SESSION['error_wednesday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_wednesday_stop'] ."</p>";
			unset($_SESSION['error_wednesday_stop']);
		}
	?>

	<label for="thursdayStart">Thursday start: </label>
	<input type="time" id = "thursdayStart" name = "thursdayStart"><br>
	<?php 
		if(isset($_SESSION['error_thursday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_thursday_start'] ."</p>";
			unset($_SESSION['error_thursday_start']);
		}
	?>

	<label for="thursdayStop">Thursday stop: </label>
	<input type="time" id = "thursdayStop" name = "thursdayStop"><br>
	<?php 
		if(isset($_SESSION['error_thursday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_thursday_stop'] ."</p>";
			unset($_SESSION['error_thursday_stop']);
		}
	?>

	<label for="fridayStart">Friday start: </label>
	<input type="time" id = "fridayStart" name = "fridayStart"><br>
	<?php 
		if(isset($_SESSION['error_friday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_friday_start'] ."</p>";
			unset($_SESSION['error_friday_start']);
		}
	?>

	<label for="fridayStop">Friday stop: </label>
	<input type="time" id = "fridayStop" name = "fridayStop"><br>
	<?php 
		if(isset($_SESSION['error_friday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_friday_stop'] ."</p>";
			unset($_SESSION['error_friday_stop']);
		}
	?>

	<label for="saturdayStart">Saturday start: </label>
	<input type="time" id = "saturdayStart" name = "saturdayStart"><br>
	<?php 
		if(isset($_SESSION['error_saturday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_saturday_start'] ."</p>";
			unset($_SESSION['error_saturday_start']);
		}
	?>

	<label for="saturdayStop">Saturday stop: </label>
	<input type="time" id = "saturdayStop" name = "saturdayStop"><br>
	<?php 
		if(isset($_SESSION['error_saturday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_saturday_stop'] ."</p>";
			unset($_SESSION['error_saturday_stop']);
		}
	?>

	<label for="sundayStart">Sunday start: </label>
	<input type="time" id = "sundayStart" name = "sundayStart"><br>
	<?php 
		if(isset($_SESSION['error_sunday_start'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_sunday_start'] ."</p>";
			unset($_SESSION['error_sunday_start']);
		}
	?>

	<label for="sundayStop">Sunday stop: </label>
	<input type="time" id = "sundayStop" name = "sundayStop"><br>
	<?php 
		if(isset($_SESSION['error_sunday_stop'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_sunday_stop'] ."</p>";
			unset($_SESSION['error_sunday_stop']);
		}
	?>
	<?php 
		if(isset($_SESSION['error_empty'] ) )
		{
			echo "<br><p class='error'>" .$_SESSION['error_empty'] ."</p>";
			unset($_SESSION['error_empty']);
		}
	?>
	<button class="button" type="submit"><span>Create time of working</span></button>
	</form>


</div>

	
<script>
	function TextPositive()
	{
		document.getElementById('snackbar').textContent = "Time of working successfully aded.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Time of working NOT aded.";
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
	if(isset($_SESSION['added_timeofworking']) )
	{
		echo '<script>';
		if($_SESSION['added_timeofworking'] ==true) 		{ echo 'TextPositive();';}
		else 												{ echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['added_timeofworking']);
		
	}
?>

</div>
</div>

</body>
</html>