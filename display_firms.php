<?php
session_start();
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

<div class="topnav">
  <a href="mainMenu.php">Home</a>
  <a class="active" >Display firms</a>
  <a href="display_services.php">Display services</a>
  <a href="display_opinions.php">Display opinions</a>
</div>

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


/* Manipulate the query result */
if ($statement->rowCount() > 0)
{
    echo "<table>";
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
	echo "<th>Id</th> <th>Name of company</th><th>Id owner</th><th>City</th><th>Street</th><th>Category</th> ";
    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td>" . $row->id . "</td><td>" . $row->nameOfCompany . "</td><td>" . $row->idOwner . "</td>
		<td>" . $row->city . "</td><td>" . $row->street . "</td><td>"  . $row->category . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>" . $statement->rowCount() . " records found.</p>";




?> 

</form>



</body>
</html>