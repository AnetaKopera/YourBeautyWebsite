<?php 
session_start();
if(!isset($_SESSION['admin']))
{
  header("location: login_form.php");
  exit();
}

$mondayStart = ltrim(rtrim(filter_input(INPUT_POST, "mondayStart", FILTER_SANITIZE_STRING)));
$mondayStop = ltrim(rtrim(filter_input(INPUT_POST, "mondayStop", FILTER_SANITIZE_STRING)));
if (!empty($mondayStart) &&  (empty($mondayStop)))
{
	$_SESSION['error_monday_stop'] = "Empty monday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($mondayStart) &&  (!empty($mondayStop)))
{
	$_SESSION['error_monday_start'] = "Empty monday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$tuesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStart", FILTER_SANITIZE_STRING)));
$tuesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStop", FILTER_SANITIZE_STRING)));
if (!empty($tuesdayStart) &&  (empty($tuesdayStop)))
{
	$_SESSION['error_tuesday_stop'] = "Empty tuesday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($tuesdayStart) &&  (!empty($tuesdayStop)))
{
	$_SESSION['error_tuesday_start'] = "Empty tuesday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$wednesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStart", FILTER_SANITIZE_STRING)));
$wednesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStop", FILTER_SANITIZE_STRING)));
if (!empty($wednesdayStart) &&  (empty($wednesdayStop)))
{
	$_SESSION['error_wednesday_stop'] = "Empty wednesday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($wednesdayStart) &&  (!empty($wednesdayStop)))
{
	$_SESSION['error_wednesday_start'] = "Empty wednesday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$thursdayStart = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStart", FILTER_SANITIZE_STRING)));
$thursdayStop = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStop", FILTER_SANITIZE_STRING)));
if (!empty($thursdayStart) &&  (empty($thursdayStop)))
{
	$_SESSION['error_thursday_stop'] = "Empty thursday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($thursdayStart) &&  (!empty($thursdayStop)))
{
	$_SESSION['error_thursday_start'] = "Empty thursday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$fridayStart = ltrim(rtrim(filter_input(INPUT_POST, "fridayStart", FILTER_SANITIZE_STRING)));
$fridayStop = ltrim(rtrim(filter_input(INPUT_POST, "fridayStop", FILTER_SANITIZE_STRING)));
if (!empty($fridayStart) &&  (empty($fridayStop)))
{
	$_SESSION['error_friday_stop'] = "Empty friday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($fridayStart) &&  (!empty($fridayStop)))
{
	$_SESSION['error_friday_start'] = "Empty friday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$saturdayStart = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStart", FILTER_SANITIZE_STRING)));
$saturdayStop = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStop", FILTER_SANITIZE_STRING)));
if (!empty($saturdayStart) &&  (empty($saturdayStop)))
{
	$_SESSION['error_saturday_stop'] = "Empty saturday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($saturdayStart) &&  (!empty($saturdayStop)))
{
	$_SESSION['error_saturday_start'] = "Empty saturday start";
	header("location: create_timeofworking_form.php");
	exit();
}

$sundayStart = ltrim(rtrim(filter_input(INPUT_POST, "sundayStart", FILTER_SANITIZE_STRING)));
$sundayStop = ltrim(rtrim(filter_input(INPUT_POST, "sundayStop", FILTER_SANITIZE_STRING)));
if (!empty($sundayStart) && (empty($sundayStop)))
{
	$_SESSION['error_sunday_stop'] = "Empty sunday stop";
	header("location: create_timeofworking_form.php");
	exit();
}
if (empty($sundayStart) &&  (!empty($sundayStop)))
{
	$_SESSION['error_sunday_start'] = "Empty sunday start";
	header("location: create_timeofworking_form.php");
	exit();
}
if(empty($mondayStart) && empty($mondayStop) && empty($tuesdayStart) && empty($tuesdayStop) 
	&& empty($wednesdayStart) && empty($wednesdayStop) && empty($thursdayStart) && empty($thursdayStop) && empty($fridayStart) 
	&& empty($fridayStop) && empty($saturdayStart) && empty($saturdayStop) && empty($sundayStart) && empty($sundayStop)  )
{
	$_SESSION['error_empty'] = "Empty time of working!!!";
	header("location: create_timeofworking_form.php");
	exit();
}

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');


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


try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_timeofworking']=false;
	header("location: create_timeofworking_form.php");
	exit();
}

$_SESSION['added_timeofworking']=true;
header("location: create_timeofworking_form.php");
exit();


?>