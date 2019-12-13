<?php 
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: login_form.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add a new record to a database</title>

<link rel="stylesheet" href="style.css">

</head>
<body>


<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php" >Add service</a>
  <a href="create_tenure_form.php" >Add tenure </a>
  <a href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a class="active" href="create_worker_form.php">Add worker </a>
</div>

<div class="formularz">
	<form action="add_new_worker.php" method="post">

	<label for="idUser">Id user: </label>
	<input type="text" id = "idUser" name = "idUser"><br>
	<?php 
		if(isset($_SESSION['error_iduser'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_iduser'] ."</p>";
			unset($_SESSION['error_iduser']);
		}
	?>

	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>
	<?php 
		if(isset($_SESSION['error_idfirm'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_idfirm'] ."</p>";
			unset($_SESSION['error_idfirm']);
		}
	?>

	<label for="idWorkSchedule"> Id work schedule: </label>
	<input type="text" id = "idWorkSchedule" name = "idWorkSchedule"><br>
	<?php 
		if(isset($_SESSION['error_idworkschedule'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_idworkschedule'] ."</p>";
			unset($_SESSION['error_idworkschedule']);
		}
	?>

	<button class="button" type="submit"><span>Create worker</span></button>
	</form>
</div>
	
<script>
	function TextPositive()
	{
		document.getElementById('snackbar').textContent = "Worker successfully aded.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Worker NOT aded.";
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
	if(isset($_SESSION['added_worker']) )
	{
		echo '<script>';
		if($_SESSION['added_worker'] ==true) 		{ echo 'TextPositive();';}
		else 										{ echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['added_worker']);
		
	}
?>

</body>
</html>