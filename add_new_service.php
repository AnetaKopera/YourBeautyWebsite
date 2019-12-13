<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$typeOfService = ltrim(rtrim(filter_input(INPUT_POST, "typeOfService", FILTER_SANITIZE_STRING)));
if (empty($typeOfService)  || (!filter_var($typeOfService, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_typeofservice'] = "Empty or error in type of service";
	header("location: create_service_form.php");
	exit();
}

$description = ltrim(rtrim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING)));
if (empty($description)  || (!filter_var($description, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_description'] = "Empty or error in description";
	header("location: create_service_form.php");
	exit();
}

$price = ltrim(rtrim(filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT)));
if (empty($price)  || (!filter_var($price, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_price'] = "Empty or error in price";
	header("location: create_service_form.php");
	exit();
}

$timeOfService = ltrim(rtrim(filter_input(INPUT_POST, "timeOfService", FILTER_VALIDATE_INT)));
if (empty($timeOfService)  || (!filter_var($timeOfService, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_timeofservice'] = "Empty or error in time in service";
	header("location: create_service_form.php");
	exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_VALIDATE_INT)));
if (empty($idFirm)  || (!filter_var($idFirm, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_idFirm'] = "Empty or error in id firm";
	header("location: create_service_form.php");
	exit();
}

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "INSERT INTO services (typeOfService, description, price, timeOfService, idFirm) VALUES(:typeOfService, :description, :price, :timeOfService, :idFirm)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":typeOfService", $typeOfService, PDO::PARAM_STR);
$statement->bindParam(":description", $description, PDO::PARAM_STR);
$statement->bindParam(":price", $price, PDO::PARAM_INT);
$statement->bindParam(":timeOfService", $timeOfService, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_service']=false;
	header("location: create_service_form.php");
	exit();
}
	$_SESSION['added_service']=true;
	header("location: create_service_form.php");
	exit();
?>