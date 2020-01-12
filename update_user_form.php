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
<title>Update users</title>
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
  <a class="active" >Update users</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
	<form action="update_user.php" method="post">

	<label for="id">Id: </label>
	<input type="text" id = "id" name = "id" readonly><br>

    <label for="surname">Surname: </label>
	<input type="text" id = "surname" name = "surname"><br>
	
	<label for="name">Name: </label>
	<input type="text" id = "name" name = "name"><br>

	<label for="name2">Second name: </label>
	<input type="text" id = "name2" name = "name2"><br>
	

	<label for="userType">Account type: </label>
	<input type="text" id = "userType" name = "userType"><br>

	<label for="email"> Email: </label>
	<input type="text" id = "email" name = "email"><br>

	<button class="button" type="submit"><span>Update user</span></button>
	
</form>
</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
       	document.getElementById('id').value = getURLValue('id');
        document.getElementById('surname').value = getURLValue('surname');
        document.getElementById('name').value = getURLValue('name');
        document.getElementById('name2').value = getURLValue('name2');
        document.getElementById('userType').value = getURLValue('userType');
        document.getElementById('email').value = getURLValue('email');
		
    }
    
</script>

</body>
</html>