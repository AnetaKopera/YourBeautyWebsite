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

<form action="add_new_service.php" method="post">

<label for="typeOfService">Type of service: </label>
<input type="text" id = "typeOfService" name = "typeOfService"><br>

<label for="description">Description: </label>
<input type="text" id = "description" name = "description"><br>


<label for="price">Price: </label>
<input type="text" id = "price" name = "price"><br>


<label for="timeOfService">Time of service: </label>
<input type="text" id = "timeOfService" name = "timeOfService"><br>


<label for="idFirm">Id firm: </label>
<input type="text" id = "idFirm" name = "idFirm"><br>
          
<input type="submit" value="Create service">
</form>

</body>
</html>