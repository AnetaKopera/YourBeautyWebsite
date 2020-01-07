<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}


$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "DELETE FROM tenure  WHERE id = :id ";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":id", $id, PDO::PARAM_STR);


try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
    echo $th;
	$_SESSION['deleted_tenure']=false;
	header("location: display_tenure.php");
	exit();
}

$_SESSION['deleted_tenure']=true;
header("location: display_tenure.php");
exit();

?>