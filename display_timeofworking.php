<?php
session_start();
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

<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Display firms</a>
  <a href="dispaly_services" >Display services</a>
  <a href="display_opinions.php">Display opinions</a>
  <a href="display_tenure.php" >Display tenure</a>
  <a  class="active" >Display time of working</a>
  <a href="display_users.php">Display users</a>
  <a href="display_visits.php">Display visits</a>
  <a href="display_workers.php">Display workers</a>
</div>

<?php



/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception
$dbConnection->query('SET CHARSET utf8');



/* Perform Query */

$query = "SELECT * FROM timeofworking";
$statement = $dbConnection->prepare($query);
$statement->execute();


/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Monday start</th><th>Monday stop</th><th>Tuesday start</th><th>Tuesday stop</th><th>Wednesday start</th> ";
	echo "<th>Wednesday stop</th><th>Thursday start</th><th>Thursday stop</th><th>Friday start</th><th>Friday stop</th>";
	echo "<th>Saturday start</th><th>Saturday stop</th><th>Sunday start</th><th>Sunday stop</th>";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->mondayStart . "</td><td>" . $row->mondayStop . "</td>
		<td>" . $row->tuesdayStart . "</td><td>" . $row->tuesdayStop . "</td><td>"  . $row->wednesdayStart . "</td>
		<td>" . $row->wednesdayStop . "</td><td>" . $row->thursdayStart . "</td><td>"  . $row->thursdayStop . "</td>
		<td>" . $row->fridayStart . "</td><td>" . $row->fridayStop . "</td><td>"  . $row->saturdayStart . "</td>
		<td>" . $row->saturdayStop . "</td><td>" . $row->sundayStart . "</td><td>"  . $row->sundayStop . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>" . $statement->rowCount() . " records found.</p>";

?> 

</form>



</body>
</html>