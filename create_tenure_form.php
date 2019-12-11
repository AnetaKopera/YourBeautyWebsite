<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create tenure</title>

<link rel="stylesheet" href="style.css">

</head>
<body>


<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php" >Add service</a>
  <a class="active" >Add tenure </a>
  <a href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a href="create_worker_form.php">Add worker </a>
</div>

<div class="formularz">
	<form action="add_new_tenure.php" method="post">


	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>


	<label for="idService">Id service: </label>
	<input type="text" id = "idService" name = "idService"><br>


	<label for="idWorker">Id worker: </label>
	<input type="text" id = "idWorker" name = "idWorker"><br>

			  
	<button class="button" type="submit"><span>Create tenure</span></button>
	</form>
</div>

<div id="snackbar">Tenure successfull added!</div>
	
	<script>
	function MyFunction()
	{
		var x = document.getElementById("snackbar"); 
		x.className = "show";
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
	</script>
	<?php
	if(isset($_SESSION['added_tenure']) && ($_SESSION['added_tenure']==true))
	{
	
		echo '<script type="text/javascript">',
		'MyFunction();',
		'</script>';
		
		unset($_SESSION['added_tenure']);
		
	}
	?>

</body>
</html>