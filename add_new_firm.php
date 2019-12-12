<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$nameOfCompany = ltrim(rtrim(filter_input(INPUT_POST, "nameOfCompany", FILTER_SANITIZE_STRING)));
if (empty($nameOfCompany))
{
	$_SESSION['error_nameOfCompany'] = "Empty name of company";
	header("location: create_firm_form.php");
	exit();
}

$idOwner = ltrim(rtrim(filter_input(INPUT_POST, "idOwner", FILTER_SANITIZE_STRING)));
if (empty($idOwner))
{
	$_SESSION['error_idOwner'] = "Empty idOwner";
	header("location: create_firm_form.php");
	exit();
}


$city = ltrim(rtrim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
if (empty($city))
{
	$_SESSION['error_city'] = "Empty city";
	header("location: create_firm_form.php");
	exit();
}


$street = ltrim(rtrim(filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING)));
if (empty($street))
{
	$_SESSION['error_street'] = "Empty street";
	header("location: create_firm_form.php");
	exit();
}

$category = ltrim(rtrim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING)));
if (empty($category))
{
	$_SESSION['error_category'] = "Empty category";
	header("location: create_firm_form.php");
	exit();
}

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "INSERT INTO firms (nameOfCompany, idOwner, city, street, category) VALUES(:nameOfCompany, :idOwner, :city, :street, :category)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":nameOfCompany", $nameOfCompany, PDO::PARAM_STR);
$statement->bindParam(":idOwner", $idOwner, PDO::PARAM_INT);
$statement->bindParam(":city", $city, PDO::PARAM_STR);
$statement->bindParam(":street", $street, PDO::PARAM_STR);
$statement->bindParam(":category", $category, PDO::PARAM_STR);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_firm']=false;
	header("location: create_firm_form.php");
	exit();
}

$_SESSION['added_firm']=true;
header("location: create_firm_form.php");
exit();

?>