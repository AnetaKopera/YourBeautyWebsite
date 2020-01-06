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
<title>Firms</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a class="active" >Display firms</a>
  <a href="display_services.php">Display services</a>
  <a href="display_opinions.php">Display opinions</a>
  <a href="display_tenure.php" >Display tenure</a>
  <a href="display_timeofworking.php">Display time of working</a>
  <a href="display_users.php">Display users</a>
  <a href="display_visits.php">Display visits</a>
  <a href="display_workers.php">Display workers</a>
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

$query = "SELECT id, nameOfCompany, idOwner, city, street, category FROM firms";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";


/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Name of company</th><th>Id owner</th><th>City</th><th>Street</th><th>Category</th><th>Edit</th><th>Delete</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->nameOfCompany . "</td><td>" . $row->idOwner . "</td>
        <td>" . $row->city . "</td><td>" . $row->street . "</td><td>"  . $row->category 
          . "</td><td><a href='update_firm_form.php?id=" . $row->id .
          "&nameOfCompany=" . $row->nameOfCompany .
          "&idOwner=" . $row->idOwner .
          "&city=" . $row->city .
          "&street=" . $row->street .
          "&category=" . $row->category . "'>Edit</a></td>" ."<td><a href='javascript:deleteRecord(" . $row->id . ")'>Delete</a></td>" ;
      
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
		document.getElementById('snackbar').textContent = "Firm successfully updated.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Firm NOT updated.";
	}
  function TextPositive2()
	{
		document.getElementById('snackbar').textContent = "Firm successfully deleted.";
	}
	function TextNegative2()
	{
		document.getElementById('snackbar').textContent = "Firm NOT deleted.";
	}

  
</script>

<form id = 'deleteRecord' action = 'delete_firm.php' method = 'post'>
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
	if(isset($_SESSION['updated_firm']) )
	{
		echo '<script>';
		if($_SESSION['updated_firm'] ==true) 		{ echo 'TextPositive();';}
		else 									{ echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['updated_firm']);
		
  }
  else if(isset($_SESSION['deleted_firm']) )
	{
		echo '<script>';
		if($_SESSION['deleted_firm'] ==true) 		{ echo 'TextPositive2();';}
		else 								                  	{ echo 'TextNegative2();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['deleted_firm']);
		
	}
?>

</div>
</div>

</body>
</html>