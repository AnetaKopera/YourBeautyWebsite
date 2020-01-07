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



/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
$dbConnection->query('SET CHARSET utf8');



/* Perform Query */

$query = "SELECT * FROM users";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";


/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Surname</th><th>Name</th><th>Second name</th><th>Date of birth</th><th>Gender</th> ";
	echo "<th>User type</th><th>Email</th><th>Bank account number</th>";
    foreach ($result as $row)
    {
		if($row->name2==null){$row->name2="-";}
		if($row->bankAccountNumber==null){$row->bankAccountNumber="-";}
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->surname . "</td><td>" . $row->name . "</td>
		<td>" . $row->name2 . "</td><td>" . $row->dateOfBirth . "</td><td>"  . $row->gender . "</td>
		<td>" . $row->userType . "</td><td>" . $row->email . "</td><td>"  . $row->bankAccountNumber . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>" . $statement->rowCount() . " records found.</p>";

echo "</div>";
?> 

</form>

</div>
</div>

</body>
</html>