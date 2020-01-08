<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));


$idUser = ltrim(rtrim(filter_input(INPUT_POST, "idUser", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idUser) || (!filter_var($idUser, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['updated_worker'] = false;
	header("location: display_workers.php");
	exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idFirm) || (!filter_var($idFirm, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['updated_worker'] = false;
	header("location: display_workers.php");
	exit();
}

$idWorkSchedule = ltrim(rtrim(filter_input(INPUT_POST, "idWorkSchedule", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idWorkSchedule) || (!filter_var($idWorkSchedule, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['updated_worker'] = false;
	header("location: display_workers.php");
	exit();
}


require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');


$query = "UPDATE  `workers` SET idUser=:idUser, idFirm = :idFirm, idWorkSchedule=:idWorkSchedule WHERE id=:id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idUser", $idUser, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idWorkSchedule", $idWorkSchedule, PDO::PARAM_INT);
$statement->bindParam(":id", $id, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
    $_SESSION['updated_worker']=false;
	header("location: display_workers.php");
    exit();
}
    $_SESSION['updated_worker']=true;
    header("location: display_workers.php");
    exit();
    
?>