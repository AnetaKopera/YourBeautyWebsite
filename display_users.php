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
  <a class="active">Users</a>
  <a href="display_visits.php">Visits</a>
  <a href="display_workers.php">Workers</a>
</div>

<div id="panel-page-container">
<?php

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$dbConnection->query('SET CHARSET utf8');

$query = "SELECT * FROM users";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div class= 'myscrollbar'>";

if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Surname</th><th>Name</th><th>Second name</th> ";
	echo "<th>User type</th><th>Email</th><th>Edit</th><th>Delete</th>";
    foreach ($result as $row)
    {
		if($row->name2==null){$row->name2="-";}
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->surname . "</td><td>" . $row->name . "</td>
            <td>" . $row->name2 . "</td>
            <td>" . $row->userType . "</td><td>" . $row->email . "</td>"
            . "</td><td><a href='update_user_form.php?id=" . $row->id .
            "&surname=" . $row->surname .
            "&name=" . $row->name .
            "&name2=" . $row->name2 .
            "&userType=" . $row->userType .
            "&email=" . $row->email .
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
		document.getElementById('snackbar').textContent = "Users successfully updated.";
	}
	function TextNegative()
	{
		document.getElementById('snackbar').textContent = "Users NOT updated.";
	}
  function TextPositive2()
	{
		document.getElementById('snackbar').textContent = "Users successfully deleted.";
	}
	function TextNegative2()
	{
		document.getElementById('snackbar').textContent = "Users NOT deleted.";
	}

  
</script>

<form id = 'deleteRecord' action = 'delete_user.php' method = 'post'>
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
	if(isset($_SESSION['updated_user']) )
	{
		echo '<script>';
		if($_SESSION['updated_user'] ==true) 		  { echo 'TextPositive();';}
		else 									                              { echo 'TextNegative();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['updated_user']);
		
  }
  else if(isset($_SESSION['deleted_user']) )
	{
		echo '<script>';
		if($_SESSION['deleted_user'] ==true) 		{ echo 'TextPositive2();';}
		else 								                  	          { echo 'TextNegative2();';}
		echo 'SnackbarShow();',
		'</script>';
		unset($_SESSION['deleted_user']);
		
	}
?>
</div>
</div>

</body>
</html>