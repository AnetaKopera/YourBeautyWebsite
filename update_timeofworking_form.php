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
<title>Update time of working</title>
<script>    

    function getURLValue(name)
    {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        let regexS = "[\\?&]" + name + "=([^&#]*)";
        let regex = new RegExp(regexS);
        let results = regex.exec(window.location.href);
        if (results === null)
        {
            return null;
        }
        else
        {
            return results[1];
        }
    }
</script>
<link rel="stylesheet" href="style.css">

</head>
<body>
  <div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a class="active">Update time of working</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
	<form action="update_timeofworking.php" method="post">

	<label for="id">Id: </label>
    <input type="text" id = "id" name = "id" readonly><br>
    
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
	
	<button class="button" type="submit"><span>Update time</span></button>
	
</form>
</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
       	document.getElementById('id').value = getURLValue('id');
        document.getElementById('mondayStart').value = getURLValue('mondayStart');
        document.getElementById('mondayStop').value = getURLValue('mondayStop');
        document.getElementById('tuesdayStart').value = getURLValue('tuesdayStart');
        document.getElementById('tuesdayStop').value = getURLValue('tuesdayStop');
        document.getElementById('wednesdayStart').value = getURLValue('wednesdayStart');
        document.getElementById('wednesdayStop').value = getURLValue('wednesdayStop');
        document.getElementById('thursdayStart').value = getURLValue('thursdayStart');
        document.getElementById('thursdayStop').value = getURLValue('thursdayStop');
        document.getElementById('fridayStart').value = getURLValue('fridayStart');
        document.getElementById('fridayStop').value = getURLValue('fridayStop');
        document.getElementById('saturdayStart').value = getURLValue('saturdayStart');
        document.getElementById('saturdayStop').value = getURLValue('saturdayStop');
        document.getElementById('sundayStart').value = getURLValue('sundayStart');
        document.getElementById('sundayStop').value = getURLValue('sundayStop');
		
    }
    
</script>

</body>
</html>