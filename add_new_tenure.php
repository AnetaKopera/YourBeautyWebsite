<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_VALIDATE_INT)));
if (empty($idFirm) || (!filter_var($idFirm, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_idFirm'] = "Empty or error in id firm";
	header("location: create_tenure_form.php");
	exit();
}

$idService = ltrim(rtrim(filter_input(INPUT_POST, "idService", FILTER_VALIDATE_INT)));
if ((empty($idService)) || (!filter_var($idService, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_idService'] = "Empty or error in id service";
	header("location: create_tenure_form.php");
	exit();
}

$idWorker = ltrim(rtrim(filter_input(INPUT_POST, "idWorker", FILTER_VALIDATE_INT)));
if (empty($idWorker) || (!filter_var($idWorker, FILTER_VALIDATE_INT)))
{
	$_SESSION['error_idWorker'] = "Empty or error in id worker";
	header("location: create_tenure_form.php");
	exit();
}

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');


$query = "INSERT INTO tenure (idFirm, idService, idWorker) VALUES(:idFirm, :idService, :idWorker)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idService", $idService, PDO::PARAM_INT);
$statement->bindParam(":idWorker", $idWorker, PDO::PARAM_INT);


try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_tenure']=false;
	header("location: create_tenure_form.php");
	exit();
}
	$_SESSION['added_tenure']=true;
	header("location: create_tenure_form.php");
	exit();

?>