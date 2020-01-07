<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}
$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));

$typeOfService = ltrim(rtrim(filter_input(INPUT_POST, "typeOfService", FILTER_SANITIZE_STRING)));
if (empty($typeOfService)  || (!filter_var($typeOfService, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}

$description = ltrim(rtrim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING)));
if (empty($description)  || (!filter_var($description, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}

$price = ltrim(rtrim(filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT)));
if (empty($price)  || (!filter_var($price, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}

$timeOfService = ltrim(rtrim(filter_input(INPUT_POST, "timeOfService", FILTER_VALIDATE_INT)));
if (empty($timeOfService)  || (!filter_var($timeOfService, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_VALIDATE_INT)));
if (empty($idFirm)  || (!filter_var($idFirm, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "UPDATE `services` SET typeOfService=:typeOfService, description=:description, price=:price, timeOfService=:timeOfService, idFirm=:idFirm WHERE id=:id";

$statement = $dbConnection->prepare($query);
$statement->bindParam(":typeOfService", $typeOfService, PDO::PARAM_STR);
$statement->bindParam(":description", $description, PDO::PARAM_STR);
$statement->bindParam(":price", $price, PDO::PARAM_INT);
$statement->bindParam(":timeOfService", $timeOfService, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":id", $id, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['updated_service']=false;
	header("location: display_services.php");
	exit();
}
	$_SESSION['updated_service']=true;
	header("location: display_services.php");
	exit();
?>