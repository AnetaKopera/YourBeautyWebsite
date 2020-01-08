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
<title>Visits</title>

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
  <a class="active">Visits</a>
  <a href="display_workers.php">Workers</a>
</div>

<div id="panel-page-container">
<?php

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "SELECT * FROM visits";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";

if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Id service</th><th>Date of visit</th><th>Hour of visit</th><th>Pay in advance</th><th>Id worker</th> ";
	echo "<th>Id client</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->idService . "</td><td>" . $row->dateVisit . "</td>
		<td>" . $row->hourVisit . "</td><td>" . $row->payInAdvance . "</td><td>"  . $row->idWorker . "</td>
		<td>" . $row->idClient . "</td>";
      
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