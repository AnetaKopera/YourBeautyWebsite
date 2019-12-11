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
	<form action="add_new_user.php" method="post">
	<!--INSERT INTO `workers`( `idUser`, `idFirm`, `idWorkSchedule`) VALUES (")-->
	<label for="idUser">Id user: </label>
	<input type="text" id = "idUser" name = "idUser"><br>

	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>

	<label for="idWorkSchedule"> Id work schedule: </label>
	<input type="text" id = "idWorkSchedule" name = "idWorkSchedule"><br>

	<button class="button" type="submit"><span>Create worker</span></button>
	</form>
</div>

<div id="snackbar">Worker successfull added!</div>
	
	<?php
	
	if(isset($_SESSION['added_worker']) && ($_SESSION['added_worker']==true))
	{
		
		echo '<script type="text/javascript">',
		'var x = document.getElementById("snackbar"); x.className = "show"; setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);',
		'</script>';
		
		unset($_SESSION['added_worker']);
		
	}
	?>

</body>
</html>