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
<title>Tenure</title>

<link rel="stylesheet" href="style.css">

</head>
<body>
<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Firms</a>
  <a href="display_services.php">Services</a>
  <a class="active" >Tenure</a>
  <a href="display_timeofworking.php">Time of working</a>
  <a href="display_users.php">Users</a>
  <a href="display_visits.php">Visits</a>
  <a href="display_workers.php">Workers</a>
</div>

<div id="panel-page-container">
<?php



/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
$dbConnection->query('SET CHARSET utf8');



/* Perform Query */

$query = "SELECT id, idFirm, idService, idWorker FROM tenure";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";

/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Id firm</th><th>Id Service</th><th>Id worker</th><th>Edit</th><th>Dispaly</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->idFirm . "</td><td>" . $row->idService . "</td>
        <td>" . $row->idWorker . "</td>"
        . "</td><td><a href='update_tenure_form.php?id=" . $row->id .
            "&idFirm=" . $row->idFirm .
            "&idService=" . $row->idService .
            "&idWorker=" . $row->idWorker ."' class='tablelink'>Edit</a></td>" 
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
		document.getElementById('snackbar').textContent = "Tenure successfully updated.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Tenure NOT updated.";
	}
  function TextPositive2()
	{
		document.getElementById('snackbar').textContent = "Tenure successfully deleted.";
	}
	function TextNegative2()
	{
		document.getElementById('snackbar').textContent = "Tenure NOT deleted.";
	}

  
</script>

<form id = 'deleteRecord' action = 'delete_tenure.php' method = 'post'>
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
	if(isset($_SESSION['updated_tenure']) )
	{
		echo '<script>';
		if($_SESSION['updated_tenure'] ==true) 		  { echo 'TextPositive();';}
		else 									                      { echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['updated_tenure']);
		
  }
  else if(isset($_SESSION['deleted_tenure']) )
	{
		echo '<script>';
		if($_SESSION['deleted_tenure'] ==true) 		{ echo 'TextPositive2();';}
		else 								                  	  { echo 'TextNegative2();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['deleted_tenure']);
		
	}
?>
</div>
</div>

</body>
</html>