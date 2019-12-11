<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create time of working</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="create_firm_form.php">Add firm</a>
  <a href="create_service_form.php" >Add service</a>
  <a href="create_tenure_form.php" >Add tenure </a>
  <a class="active" href="create_timeofworking_form.php">Add time of working </a>
  <a href="create_user_form.php">Add user </a>
  <a  href="create_worker_form.php">Add worker </a>
</div>

<form action="add_new_timeofworking.php" method="post">


<label for="mondayStart">Monday start: </label>
<input type="time" id = "mondayStart" name = "mondayStart"><br>


<label for="mondayStop">Monday stop: </label>
<input type="time" id = "mondayStop" name = "mondayStop"><br>


<label for="tuesdayStart">Tuesday start: </label>
<input type="time" id = "tuesdayStart" name = "tuesdayStart"><br>


<label for="tuesdayStop">Tuesday stop: </label>
<input type="time" id = "tuesdayStop" name = "tuesdayStop"><br>

<label for="wednesdayStart">Wednesday start: </label>
<input type="time" id = "wednesdayStart" name = "wednesdayStart"><br>

<label for="wednesdayStop">Wednesday stop: </label>
<input type="time" id = "wednesdayStop" name = "wednesdayStop"><br>

<label for="thursdayStart">Thursday start: </label>
<input type="time" id = "thursdayStart" name = "thursdayStart"><br>

<label for="thursdayStop">Thursday stop: </label>
<input type="time" id = "thursdayStop" name = "thursdayStop"><br>

<label for="fridayStart">Friday start: </label>
<input type="time" id = "fridayStart" name = "fridayStart"><br>

<label for="fridayStop">Friday stop: </label>
<input type="time" id = "fridayStop" name = "fridayStop"><br>

<label for="saturdayStart">Saturday start: </label>
<input type="time" id = "saturdayStart" name = "saturdayStart"><br>

<label for="saturdayStop">Saturday stop: </label>
<input type="time" id = "saturdayStop" name = "saturdayStop"><br>

<label for="sundayStart">Sunday start: </label>
<input type="time" id = "sundayStart" name = "sundayStart"><br>

<label for="sundayStop">Sunday stop: </label>
<input type="time" id = "sundayStop" name = "sundayStop"><br>


          
<input type="submit" value="Create time of working">
</form>

</body>
</html>