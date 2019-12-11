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

<form action="add_new_firm.php" method="post">

<label for="nameOfCompany">Name of company: </label>
<input type="text" id = "nameOfCompany" name = "nameOfCompany"><br>

<label for="idOwner">Id owner: </label>
<input type="text" id = "idOwner" name = "idOwner"><br>


<label for="city">City: </label>
<input type="text" id = "city" name = "city"><br>


<label for="street">Street: </label>
<input type="text" id = "street" name = "street"><br>


<label for="category">Category: </label>
<input type="text" id = "category" name = "category"><br>
          
<input type="submit" value="Create firm">
</form>

</body>
</html>