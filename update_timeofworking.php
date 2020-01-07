<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));


$mondayStart = ltrim(rtrim(filter_input(INPUT_POST, "mondayStart", FILTER_SANITIZE_STRING)));
$mondayStop = ltrim(rtrim(filter_input(INPUT_POST, "mondayStop", FILTER_SANITIZE_STRING)));
if (!empty($mondayStart) &&  (empty($mondayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($mondayStart) &&  (!empty($mondayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$tuesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStart", FILTER_SANITIZE_STRING)));
$tuesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "tuesdayStop", FILTER_SANITIZE_STRING)));
if (!empty($tuesdayStart) &&  (empty($tuesdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($tuesdayStart) &&  (!empty($tuesdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$wednesdayStart = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStart", FILTER_SANITIZE_STRING)));
$wednesdayStop = ltrim(rtrim(filter_input(INPUT_POST, "wednesdayStop", FILTER_SANITIZE_STRING)));
if (!empty($wednesdayStart) &&  (empty($wednesdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($wednesdayStart) &&  (!empty($wednesdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$thursdayStart = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStart", FILTER_SANITIZE_STRING)));
$thursdayStop = ltrim(rtrim(filter_input(INPUT_POST, "thursdayStop", FILTER_SANITIZE_STRING)));
if (!empty($thursdayStart) &&  (empty($thursdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($thursdayStart) &&  (!empty($thursdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$fridayStart = ltrim(rtrim(filter_input(INPUT_POST, "fridayStart", FILTER_SANITIZE_STRING)));
$fridayStop = ltrim(rtrim(filter_input(INPUT_POST, "fridayStop", FILTER_SANITIZE_STRING)));
if (!empty($fridayStart) &&  (empty($fridayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($fridayStart) &&  (!empty($fridayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$saturdayStart = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStart", FILTER_SANITIZE_STRING)));
$saturdayStop = ltrim(rtrim(filter_input(INPUT_POST, "saturdayStop", FILTER_SANITIZE_STRING)));
if (!empty($saturdayStart) &&  (empty($saturdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($saturdayStart) &&  (!empty($saturdayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}

$sundayStart = ltrim(rtrim(filter_input(INPUT_POST, "sundayStart", FILTER_SANITIZE_STRING)));
$sundayStop = ltrim(rtrim(filter_input(INPUT_POST, "sundayStop", FILTER_SANITIZE_STRING)));
if (!empty($sundayStart) && (empty($sundayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if (empty($sundayStart) &&  (!empty($sundayStop)))
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}
if(empty($mondayStart) && empty($mondayStop) && empty($tuesdayStart) && empty($tuesdayStop) 
	&& empty($wednesdayStart) && empty($wednesdayStop) && empty($thursdayStart) && empty($thursdayStop) && empty($fridayStart) 
	&& empty($fridayStop) && empty($saturdayStart) && empty($saturdayStop) && empty($sundayStart) && empty($sundayStop)  )
{
	$_SESSION['update_timeofworking'] = false;
	header("location: display_timeofworking.php");
	exit();
}


require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "UPDATE  `timeofworking` SET
        mondayStart=:mondayStart, mondayStop =:mondayStop,
        tuesdayStart=:tuesdayStart, tuesdayStop =:tuesdayStop,
        wednesdayStart =:wednesdayStart, wednesdayStop =:wednesdayStop,
        thursdayStart  =:thursdayStart, thursdayStop =:thursdayStop,
        fridayStart =:fridayStart, fridayStop =:fridayStop,
        saturdayStart =:saturdayStart, saturdayStop =:saturdayStop,
        sundayStart =:sundayStart, sundayStop =:sundayStop
        WHERE id=:id";
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
$statement->bindParam(":id", $id, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
    $_SESSION['updated_timeofworking']=false;
	header("location: display_timeofworking.php");
    exit();
}
    $_SESSION['updated_timeofworking']=true;
    header("location: display_timeofworking.php");
	exit();

?>