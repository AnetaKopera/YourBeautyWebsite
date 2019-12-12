<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Opinions</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Display firms</a>
  <a href="display_services.php" >Display services</a>
  <a class="active">Display opinions</a>
  <a href="display_tenure.php" >Display tenure</a>
  <a href="display_timeofworking.php">Display time of working</a>
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

$query = "SELECT id, idUser, idFirm, idService, opinion, stars FROM opinions";
$statement = $dbConnection->prepare($query);
$statement->execute();


/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Id user</th><th>Id firm</th><th>Id service</th><th>Opinion</th><th>stars</th> ";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->idUser . "</td><td>" . $row->idFirm . "</td>
		<td>" . $row->idService . "</td><td>" . $row->opinion . "</td><td>"  . $row->stars . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>" . $statement->rowCount() . " records found.</p>";




?> 

</form>



</body>
</html>