<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$nameOfCompany = ltrim(rtrim(filter_input(INPUT_POST, "nameOfCompany", FILTER_SANITIZE_STRING)));
if (empty($nameOfCompany)  || (!filter_var($nameOfCompany, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_nameOfCompany'] = "Empty or error in  name of company";
	header("location: create_firm_form.php");
	exit();
}

$idOwner = ltrim(rtrim(filter_input(INPUT_POST, "idOwner", FILTER_VALIDATE_INT)));
if (empty($idOwner)  || (!filter_var($idOwner, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_idOwner'] = "Empty or error in id Owner";
	header("location: create_firm_form.php");
	exit();
}


$city = ltrim(rtrim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
if (empty($city)  || (!filter_var($city, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_city'] = "Empty or error in city";
	header("location: create_firm_form.php");
	exit();
}


$street = ltrim(rtrim(filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING)));
if (empty($street)  || (!filter_var($street, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_street'] = "Empty or error in street";
	header("location: create_firm_form.php");
	exit();
}

$category = ltrim(rtrim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING)));
if (empty($category) || (!filter_var($category, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_category'] = "Empty or error in category";
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