<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));


$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_VALIDATE_INT)));
if (empty($idFirm) || (!filter_var($idFirm, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_tenure'] = false;
	header("location: display_tenure.php");
	exit();
}

$idService = ltrim(rtrim(filter_input(INPUT_POST, "idService", FILTER_VALIDATE_INT)));
if ((empty($idService)) || (!filter_var($idService, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_tenure'] = false;
	header("location: display_tenure.php");
	exit();
}

$idWorker = ltrim(rtrim(filter_input(INPUT_POST, "idWorker", FILTER_VALIDATE_INT)));
if (empty($idWorker) || (!filter_var($idWorker, FILTER_VALIDATE_INT)))
{
	$_SESSION['updated_tenure'] = false;
	header("location: display_tenure.php");
	exit();
}

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');


$query = "UPDATE  `tenure` SET idFirm=:idFirm, idService=:idService, idWorker=:idWorker WHERE id=:id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idService", $idService, PDO::PARAM_INT);
$statement->bindParam(":idWorker", $idWorker, PDO::PARAM_INT);
$statement->bindParam(":id", $id, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{

	$_SESSION['updated_tenure']=false;
	header("location: display_tenure.php");
    exit();
}
    $_SESSION['updated_tenure']=true;
    header("location: display_tenure.php");
	exit();

?>