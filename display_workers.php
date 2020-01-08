<?php 
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: login_form.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Users</title>

<link rel="stylesheet" href="style.css">

</head>
<body>
<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Firms</a>
  <a href="display_services.php">Services</a>
  <a href="display_tenure.php" >Tenure</a>
  <a href="display_timeofworking.php">Time of working</a>
  <a href="display_users.php">Users</a>
  <a href="display_visits.php">Visits</a>
  <a class="active">Workers</a>
</div>

<div id="panel-page-container">
<?php

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$dbConnection->query('SET CHARSET utf8');

$query = "SELECT * FROM workers";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";

if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Id user</th><th>Id Firm</th><th>Id work schedule</th><th>Edit</th><th>Delete</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->idUser . "</td><td>" . $row->idFirm . "</td>
        <td>" . $row->idWorkSchedule . "</td>" 
        . "</td><td><a href='update_worker_form.php?id=" . $row->id .
            "&idUser=" . $row->idUser .
            "&idFirm=" . $row->idFirm .
            "&idWorkSchedule=" . $row->idWorkSchedule .
            "' class='tablelink'>Edit</a></td>" 
            ."<td><a href='javascript:deleteRecord(" . $row->id . ")' class='tablelink'>Delete</a></td>" ;
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>" . $statement->rowCount() . " records found.</p>";

echo "</div>";

?> 

</form>

<script>
	function TextPositive()
	{
		document.getElementById('snackbar').textContent = "Worker successfully updated.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Worker NOT updated.";
	}
  function TextPositive2()
	{
		document.getElementById('snackbar').textContent = "Worker successfully deleted.";
	}
	function TextNegative2()
	{
		document.getElementById('snackbar').textContent = "Worker NOT deleted.";
	}

  
</script>

<form id = 'deleteRecord' action = 'delete_worker.php' method = 'post'>
<input type = 'hidden' id = 'id' name = 'id'>
</form>

<script>
    function deleteRecord(id)
    {
        document.getElementById('id').value = id.toString();
        document.getElementById('deleteRecord').submit();
    }
</script>

<div id="snackbar"></div>	
<script>
	function SnackbarShow()
	{
		var x = document.getElementById("snackbar"); 
		x.className = "show";
		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>


<?php
	if(isset($_SESSION['updated_worker']) )
	{
		echo '<script>';
		if($_SESSION['updated_worker'] ==true) 		          { echo 'TextPositive();';}
		else 									                              { echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['updated_worker']);
		
  }
  else if(isset($_SESSION['deleted_worker']) )
	{
		echo '<script>';
		if($_SESSION['deleted_worker'] ==true) 	        	{ echo 'TextPositive2();';}
		else 								                  	          { echo 'TextNegative2();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['deleted_worker']);
		
	}
?>
</div>
</div>

</body>
</html>