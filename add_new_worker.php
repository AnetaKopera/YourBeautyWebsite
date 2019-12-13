<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$idUser = ltrim(rtrim(filter_input(INPUT_POST, "idUser", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idUser) || (!filter_var($idUser, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['error_iduser'] = "Empty or error in id user";
	header("location: create_worker_form.php");
	exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idFirm) || (!filter_var($idFirm, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['error_idfirm'] = "Empty or error in id firm";
	header("location: create_worker_form.php");
	exit();
}

$idWorkSchedule = ltrim(rtrim(filter_input(INPUT_POST, "idWorkSchedule", FILTER_SANITIZE_NUMBER_INT)));
if (empty($idWorkSchedule) || (!filter_var($idWorkSchedule, FILTER_SANITIZE_NUMBER_INT)) )
{
	$_SESSION['error_idworkschedule'] = "Empty or error in id work schedule";
	header("location: create_worker_form.php");
	exit();
}

require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "INSERT INTO workers (idUser, idFirm, idWorkSchedule) VALUES(:idUser, :idFirm, :idWorkSchedule)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idUser", $idUser, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idWorkSchedule", $idWorkSchedule, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_worker']=false;
		header("location: create_worker_form.php");
		exit();
}
	$_SESSION['added_worker']=true;
	header("location: create_worker_form.php");
	exit();

?>