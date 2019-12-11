<?php 


$response = array();

$mondayStart = ltrim(rtrim(filter_input(INPUT_POST, "mondayStart", FILTER_SANITIZE_STRING)));
if (empty($mondayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute mondayStart";
    echo json_encode($response);
	exit();
}

$mondayStop = ltrim(rtrim(filter_input(INPUT_POST, "mondayStop", FILTER_SANITIZE_STRING)));
if (empty($mondayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute mondayStop";
    echo json_encode($response);
	exit();
}

$tuesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStart", FILTER_SANITIZE_STRING)));
if (empty($tuesdayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute tuesdayStart";
    echo json_encode($response);
	exit();
}
 
$tuesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStop", FILTER_SANITIZE_STRING)));
if (empty($tuesdayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute tuesdayStop";
    echo json_encode($response);
	exit();
} 

$wednesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStart", FILTER_SANITIZE_STRING)));
if (empty($wednesdayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute wednesdayStart";
    echo json_encode($response);
	exit();
}

$wednesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStop", FILTER_SANITIZE_STRING)));
if (empty($wednesdayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute wednesdayStop";
    echo json_encode($response);
	exit();
}

$thursdayStart = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStart", FILTER_SANITIZE_STRING)));
if (empty($thursdayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute thursdayStart";
    echo json_encode($response);
	exit();
}
$thursdayStop = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStop", FILTER_SANITIZE_STRING)));
if (empty($thursdayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute thursdayStop";
    echo json_encode($response);
	exit();
}

$fridayStart = ltrim(rtrim(filter_input(INPUT_POST, "fridayStart", FILTER_SANITIZE_STRING)));
if (empty($fridayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute fridayStart";
    echo json_encode($response);
	exit();
}

$fridayStop = ltrim(rtrim(filter_input(INPUT_POST, "fridayStop", FILTER_SANITIZE_STRING)));
if (empty($fridayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute fridayStop";
    echo json_encode($response);
	exit();
}

$saturdayStart = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStart", FILTER_SANITIZE_STRING)));
if (empty($saturdayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute saturdayStart";
    echo json_encode($response);
	exit();
}

$saturdayStop = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStop", FILTER_SANITIZE_STRING)));
if (empty($saturdayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute saturdayStop";
    echo json_encode($response);
	exit();
}

$sundayStart = ltrim(rtrim(filter_input(INPUT_POST, "sundayStart", FILTER_SANITIZE_STRING)));
if (empty($sundayStart))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute sundayStart";
    echo json_encode($response);
	exit();
}

$sundayStop = ltrim(rtrim(filter_input(INPUT_POST, "sundayStop", FILTER_SANITIZE_STRING)));
if (empty($sundayStop))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute sundayStop";
    echo json_encode($response);
	exit();
}
require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "INSERT INTO timeofworking (mondayStart, mondayStop, tuesdayStart, tuesdayStop, wednesdayStart, wednesdayStop, thursdayStart, thursdayStop, fridayStart, fridayStop, saturdayStart, saturdayStop, sundayStart, sundayStop)
 VALUES(:mondayStart, :mondayStop, :tuesdayStart, :tuesdayStop, :wednesdayStart, :wednesdayStop, :thursdayStart, :thursdayStop, :fridayStart, :fridayStop, :saturdayStart, :saturdayStop, :sundayStart, :sundayStop)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":mondayStart", $mondayStart, PDO::PARAM_STR);
$statement->bindParam(":mondayStop", $mondayStop, PDO::PARAM_STR);
$statement->bindParam(":tuesdayStart", $tuesdayStart, PDO::PARAM_STR);
$statement->bindParam(":tuesdayStop", $tuesdayStop, PDO::PARAM_STR);
$statement->bindParam(":wednesdayStart", $wednesdayStart, PDO::PARAM_STR);
$statement->bindParam(":wednesdayStop", $wednesdayStop, PDO::PARAM_STR);
$statement->bindParam(":thursdayStart", $thursdayStart, PDO::PARAM_STR);
$statement->bindParam(":thursdayStop", $thursdayStop, PDO::PARAM_STR);
$statement->bindParam(":fridayStart", $fridayStart, PDO::PARAM_STR);
$statement->bindParam(":fridayStop", $fridayStop, PDO::PARAM_STR);
$statement->bindParam(":saturdayStart", $saturdayStart, PDO::PARAM_STR);
$statement->bindParam(":saturdayStop", $saturdayStop, PDO::PARAM_STR);
$statement->bindParam(":sundayStart", $sundayStart, PDO::PARAM_STR);
$statement->bindParam(":sundayStop", $sundayStop, PDO::PARAM_STR);
$statement->execute();



  if ($query) 
  {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Time of working created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else 
	{
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Error in crete time of working";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>