<?php 


$response = array();

$typeOfService = ltrim(rtrim(filter_input(INPUT_POST, "typeOfService", FILTER_SANITIZE_STRING)));
if (empty($typeOfService))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute typeOfService";
    echo json_encode($response);
	exit();
}

$description = ltrim(rtrim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING)));
if (empty($description))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute description";
    echo json_encode($response);
	exit();
}


$price = ltrim(rtrim(filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING)));
if ((empty($price)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute price";
    echo json_encode($response);
	exit();
}


$timeOfService = ltrim(rtrim(filter_input(INPUT_POST, "timeOfService", FILTER_SANITIZE_STRING)));
if ((empty($timeOfService)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute timeOfService";
    echo json_encode($response);
	exit();
}


//sprawdzic powinna to apka z poziomu androida ze zawsze ktores wybrane bedzie
$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_SANITIZE_STRING)));




require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/* Perform Query */
$query = "INSERT INTO services (typeOfService, description, price, timeOfService, idFirm) VALUES(:typeOfService, :description, :price, :timeOfService, :idFirm)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":typeOfService", $typeOfService, PDO::PARAM_STR);
$statement->bindParam(":description", $description, PDO::PARAM_STR);
$statement->bindParam(":price", $price, PDO::PARAM_INT);
$statement->bindParam(":timeOfService", $timeOfService, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->execute();


   if ($query) {
		$_SESSION['added_service']=true;
		header("location: create_service_form.php");
		exit();
    } 
	else {
		$_SESSION['added_service']=false;
		header("location: create_service_form.php");
		exit();
    }


?>