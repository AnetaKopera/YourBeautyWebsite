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
<title>Update tenure</title>
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
  <a class="active" href="create_firm_form.php">Update tenure</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
	<form action="update_tenure.php" method="post">

	<label for="id">Id: </label>
	<input type="text" id = "id" name = "id" readonly><br>

	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>
	
	<label for="idService">Id service: </label>
	<input type="text" id = "idService" name = "idService"><br>

	<label for="idWorker">Id worker: </label>
	<input type="text" id = "idWorker" name = "idWorker"><br>
	
	<button class="button" type="submit"><span>Update tenure</span></button>
	
</form>
</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
       	document.getElementById('id').value = getURLValue('id');
        document.getElementById('idFirm').value = getURLValue('idFirm');
        document.getElementById('idService').value = getURLValue('idService');
        document.getElementById('idWorker').value = getURLValue('idWorker');
		
    }
    
</script>

</body>
</html>