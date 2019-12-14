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
<title>Services</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div id="panel-container">
<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a href="display_firms.php">Display firms</a>
  <a class="active" >Display services</a>
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

$query = "SELECT id, typeOfService, description, price, timeofservice, idFirm FROM services";
$statement = $dbConnection->prepare($query);
$statement->execute();
echo "<div>";

/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Type Of Service</th><th>Description</th><th>Price</th><th>Time of service</th><th>Id firm</th> ";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->typeOfService . "</td><td>" . $row->description . "</td>
		<td>" . $row->price . "</td><td>" . $row->timeofservice . "</td><td>"  . $row->idFirm . "</td>";
      
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