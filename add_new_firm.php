<?php 

session_start();


$response = array();

$nameOfCompany = ltrim(rtrim(filter_input(INPUT_POST, "nameOfCompany", FILTER_SANITIZE_STRING)));
if (empty($nameOfCompany))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute nameOfCompany";
    echo json_encode($response);
	header("location: create_firm_form.php");
	exit();
}


//tu tez z listy potem bedzie wiec nie koniecznie musimy dawac tego ifa
$idOwner = ltrim(rtrim(filter_input(INPUT_POST, "idOwner", FILTER_SANITIZE_STRING)));
if (empty($idOwner))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute idOwner";
    echo json_encode($response);
	header("location: create_firm_form.php");
	exit();
}


$city = ltrim(rtrim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING)));
if ((empty($city)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute city";
    echo json_encode($response);
	header("location: create_firm_form.php");
	exit();
}


$street = ltrim(rtrim(filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING)));
if ((empty($street)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute street";
    echo json_encode($response);
	header("location: create_firm_form.php");
	exit();
}


//sprawdzic powinna to apka z poziomu androida ze zawsze ktores wybrane bedzie
$category = ltrim(rtrim(filter_input(INPUT_POST, "category", FILTER_SANITIZE_STRING)));




require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/* Perform Query */
$query = "INSERT INTO firms (nameOfCompany, idOwner, city, street, category) VALUES(:nameOfCompany, :idOwner, :city, :street, :category)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":nameOfCompany", $nameOfCompany, PDO::PARAM_STR);
$statement->bindParam(":idOwner", $idOwner, PDO::PARAM_INT);
$statement->bindParam(":city", $city, PDO::PARAM_STR);
$statement->bindParam(":street", $street, PDO::PARAM_STR);
$statement->bindParam(":category", $category, PDO::PARAM_STR);
$statement->execute();


  if ($query) {
		$_SESSION['added_firm']=true;
		header("location: create_firm_form.php");
		exit();
    } 
	else {
		$_SESSION['added_firm']=false;
		header("location: create_firm_form.php");
		exit();
    }

?>