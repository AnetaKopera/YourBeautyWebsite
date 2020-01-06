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
<title>Create firm</title>
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
  <a class="active" href="create_firm_form.php">Update firm</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
	<form action="update_firm.php" method="post">

	<label for="id">Id: </label>
	<input type="text" id = "id" name = "id" readonly><br>

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
			  
	<button class="button" type="submit"><span>Update firm</span></button>
	
</form>
</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
       	document.getElementById('id').value = getURLValue('id');
		var tmp = getURLValue('nameOfCompany');
		tmp = tmp.replace(/%20/g, " ");
        document.getElementById('nameOfCompany').value = tmp ;
        document.getElementById('idOwner').value = getURLValue('idOwner');
		
		tmp = getURLValue('city');
		tmp = tmp.replace(/%20/g, " ");
        document.getElementById('city').value = tmp;
		
		tmp = getURLValue('street');
		tmp = tmp.replace(/%20/g, " ");
        document.getElementById('street').value = tmp; 
		
		tmp = getURLValue('category');
		tmp = tmp.replace(/%20/g, " ");
        document.getElementById('category').value = tmp;
    }
    
</script>

</body>
</html>