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
<title>Update worker</title>
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
  <a class="active" >Update worker</a>
  
</div>
<div id="panel-page-container">
<div class="formularz">
	<form action="update_worker.php" method="post">

	<label for="id">Id: </label>
	<input type="text" id = "id" name = "id" readonly><br>

    <label for="idUser">Id user: </label>
	<input type="text" id = "idUser" name = "idUser"><br>
	
	<label for="idFirm">Id firm: </label>
	<input type="text" id = "idFirm" name = "idFirm"><br>

	<label for="idWorkSchedule"> Id work schedule: </label>
	<input type="text" id = "idWorkSchedule" name = "idWorkSchedule"><br>

	<button class="button" type="submit"><span>Update worker</span></button>
	
</form>
</div>

</div>
</div>

<script>
    if (getURLValue('id') !== null)
    {
       	document.getElementById('id').value = getURLValue('id');
        document.getElementById('idUser').value = getURLValue('idUser');
        document.getElementById('idFirm').value = getURLValue('idFirm');
        document.getElementById('idWorkSchedule').value = getURLValue('idWorkSchedule');
		
    }
    
</script>

</body>
</html>