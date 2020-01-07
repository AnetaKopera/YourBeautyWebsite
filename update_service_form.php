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
<title>Update service</title>
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
  <a class="active" href="create_service_form.php">Update service</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
<form action="update_service.php" method="post">

<label for="id">Id: </label>
<input type="text" id = "id" name = "id" readonly><br>

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
          
<button class="button" type="submit"><span>Update service</span></button>
</form>


</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
        
        document.getElementById('id').value = getURLValue('id');

        var tmp = getURLValue('typeOfService');
		tmp = tmp.replace(/%20/g, " ");
       	document.getElementById('typeOfService').value = tmp;
		
        tmp = getURLValue('description');
		tmp = tmp.replace(/%20/g, " ");
        document.getElementById('description').value = tmp ;

        document.getElementById('price').value = getURLValue('price');
		
        document.getElementById('timeOfService').value = getURLValue('timeOfService');
		
        document.getElementById('idFirm').value = getURLValue('idFirm');
    }
    
</script>

</body>
</html>