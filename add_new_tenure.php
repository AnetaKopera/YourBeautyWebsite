<?php 


$response = array();



$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_SANITIZE_STRING)));
if (empty($idFirm))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute idFirm";
    echo json_encode($response);
	exit();
}

$idService = ltrim(rtrim(filter_input(INPUT_POST, "idService", FILTER_SANITIZE_STRING)));
if ((empty($idService)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute idService";
    echo json_encode($response);
	exit();
}

$idWorker = ltrim(rtrim(filter_input(INPUT_POST, "idWorker", FILTER_SANITIZE_STRING)));
if (empty($idWorker))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute idWorker";
    echo json_encode($response);
	exit();
}
require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/* Perform Query */
$query = "INSERT INTO tenure (idFirm, idService, idWorker) VALUES(:idFirm, :idService, :idWorker)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idService", $idService, PDO::PARAM_INT);
$statement->bindParam(":idWorker", $idWorker, PDO::PARAM_INT);
$statement->execute();



  if ($query) 
  {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Tenure created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else 
	{
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Error in crete tenure";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>