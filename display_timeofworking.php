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
<title>Time of working</title>

<link rel="stylesheet" href="style.css">

</head>
<body>
<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Firms</a>
  <a href="display_services.php">Services</a>
  <a href="display_tenure.php" >Tenure</a>
  <a class="active">Time of working</a>
  <a href="display_users.php">Users</a>
  <a href="display_visits.php">Visits</a>
  <a href="display_workers.php">Workers</a>
</div>

<div id="panel-page-container">
<?php

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
$dbConnection->query('SET CHARSET utf8');

$query = "SELECT * FROM timeofworking";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div class= 'myscrollbar'> ";

if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Monday start</th><th>Monday stop</th><th>Tuesday start</th><th>Tuesday stop</th><th>Wednesday start</th> ";
	echo "<th>Wednesday stop</th><th>Thursday start</th><th>Thursday stop</th><th>Friday start</th><th>Friday stop</th>";
	echo "<th>Saturday start</th><th>Saturday stop</th><th>Sunday start</th><th>Sunday stop</th><th>Edit</th><th>Delete</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->mondayStart . "</td><td>" . $row->mondayStop . "</td>
              <td>" . $row->tuesdayStart . "</td><td>" . $row->tuesdayStop . "</td><td>"  . $row->wednesdayStart . "</td>
              <td>" . $row->wednesdayStop . "</td><td>" . $row->thursdayStart . "</td><td>"  . $row->thursdayStop . "</td>
              <td>" . $row->fridayStart . "</td><td>" . $row->fridayStop . "</td><td>"  . $row->saturdayStart . "</td>
              <td>" . $row->saturdayStop . "</td><td>" . $row->sundayStart . "</td><td>"  . $row->sundayStop . "</td>"
                 . "</td><td><a href='update_timeofworking_form.php?id=" . $row->id .
                  "&mondayStart=" . $row->mondayStart .
                  "&mondayStop=" . $row->mondayStop .
                  "&tuesdayStart=" . $row->tuesdayStart .
                  "&tuesdayStop=" . $row->tuesdayStop .
                  "&wednesdayStart=" . $row->wednesdayStart .
                  "&wednesdayStop=" . $row->wednesdayStop .
                  "&thursdayStart=" . $row->thursdayStart .
                  "&thursdayStop=" . $row->thursdayStop .
                  "&fridayStart=" . $row->fridayStart .
                  "&fridayStop=" . $row->fridayStop .
                  "&saturdayStart=" . $row->saturdayStart .
                  "&saturdayStop=" . $row->saturdayStop .
                  "&sundayStart=" . $row->sundayStart .
                  "&sundayStop=" . $row->sundayStop .
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
		document.getElementById('snackbar').textContent = "Time of working successfully updated.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Time of working NOT updated.";
	}
  function TextPositive2()
	{
		document.getElementById('snackbar').textContent = "Time of working successfully deleted.";
	}
	function TextNegative2()
	{
		document.getElementById('snackbar').textContent = "Time of working NOT deleted.";
	}

  
</script>

<form id = 'deleteRecord' action = 'delete_timeofworking.php' method = 'post'>
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
	if(isset($_SESSION['updated_timeofworking']) )
	{
		echo '<script>';
		if($_SESSION['updated_timeofworking'] ==true) 		  { echo 'TextPositive();';}
		else 									                              { echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['updated_timeofworking']);
		
  }
  else if(isset($_SESSION['deleted_timeofworking']) )
	{
		echo '<script>';
		if($_SESSION['deleted_timeofworking'] ==true) 		{ echo 'TextPositive2();';}
		else 								                  	          { echo 'TextNegative2();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['deleted_timeofworking']);
		
	}
?>

</div>
</div>

</body>
</html>