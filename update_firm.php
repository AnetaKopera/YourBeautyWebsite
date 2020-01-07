<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}


$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));


$nameOfCompany = ltrim(rtrim(filter_input(INPUT_POST, "nameOfCompany", FILTER_SANITIZE_STRING)));
if (empty($nameOfCompany)  || (!filter_var($nameOfCompany, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}

$idOwner = ltrim(rtrim(filter_input(INPUT_POST, "idOwner", FILTER_VALIDATE_INT)));
if (empty($idOwner)  || (!filter_var($idOwner, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}


$city = ltrim(rtrim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
if (empty($city)  || (!filter_var($city, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}


$street = ltrim(rtrim(filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING)));
if (empty($street)  || (!filter_var($street, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}

$category = ltrim(rtrim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING)));
if (empty($category) || (!filter_var($category, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "UPDATE `firms` SET  nameOfCompany =:nameOfCompany, idOwner=:idOwner, city=:city, street=:street, category=:category WHERE id = :id ";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":nameOfCompany", $nameOfCompany, PDO::PARAM_STR);
$statement->bindParam(":idOwner", $idOwner, PDO::PARAM_INT);
$statement->bindParam(":city", $city, PDO::PARAM_STR);
$statement->bindParam(":street", $street, PDO::PARAM_STR);
$statement->bindParam(":category", $category, PDO::PARAM_STR);
$statement->bindParam(":id", $id, PDO::PARAM_STR);


try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['updated_firm']=false;
	header("location: display_firms.php");
	exit();
}

$_SESSION['updated_firm']=true;
header("location: display_firms.php");
exit();

?>