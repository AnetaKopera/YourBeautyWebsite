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
  <a class="active" href="create_user_form.php">Add user </a>
  <a  href="create_worker_form.php">Add worker </a>
</div>

<form action="add_new_user.php" method="post">

<label for="surname">Surname: </label>
<input type="text" id = "surname" name = "surname"><br>

<label for="name">Name: </label>
<input type="text" id = "name" name = "name"><br>

<label for="name2">Second name: </label>
<input type="text" id = "name2" name = "name2"><br>

<label for="date_of_birth">Date of birth: </label>
<input type="text" id = "date_of_birth" name = "date_of_birth"><br>

<label for="gender">Gender: </label>
<input type="text" id = "gender" name = "gender"><br>

<label for="account_type">Account type: </label>
<input type="text" id = "account_type" name = "account_type"><br>

<label for="email"> Email: </label>
<input type="text" id = "email" name = "email"><br>

<label for="password"> Password: </label>
<input type="text" id = "password" name = "password"><br>

<label for="bank_account_number"> Bank account number: </label>
<input type="text" id = "bank_account_number" name = "bank_account_number"><br>
          
<input type="submit" value="Create user">
</form>

</body>
</html>