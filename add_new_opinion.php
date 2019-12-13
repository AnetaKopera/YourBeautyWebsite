<!--Ten plik chyba nie jest potrzebny bo opinie daje tylko klient wiec dla niego potrzebujemy
wersji z jsonem-->
<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$idUser = ltrim(rtrim(filter_input(INPUT_POST, "idUser", FILTER_SANITIZE_STRING)));
if (empty($idUser) || (!filter_var($idUser, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_idUser'] = "Empty id user";
	header("location: create_opinion_form.php");
	exit();
}

$idFirm = ltrim(rtrim(filter_input(INPUT_POST, "idFirm", FILTER_SANITIZE_STRING)));
if (empty($idFirm) || (!filter_var($idFirm, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_idFirm'] = "Empty id firm";
	header("location: create_opinion_form.php");
	exit();
}

$idService = ltrim(rtrim(filter_input(INPUT_POST, "idService", FILTER_SANITIZE_STRING)));
if ((empty($idService)) || (!filter_var($idService, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_idService'] = "Empty id service";
	header("location: create_opinion_form.php");
	exit();;
}

$opinion = ltrim(rtrim(filter_input(INPUT_POST, "opinion", FILTER_SANITIZE_STRING)));
if ((empty($opinion)) || (!filter_var($opinion, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_opinion'] = "Empty opinion";
	header("location: create_opinion_form.php");
	exit();
}


$stars = ltrim(rtrim(filter_input(INPUT_POST, "stars", FILTER_SANITIZE_STRING)));
if ((empty($stars)) || (!filter_var($stars, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_stars'] = "Empty stars";
	header("location: create_opinion_form.php");
	exit();
}

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "INSERT INTO opinions (idUser, idFirm, idService, opinion, stars) VALUES(:idUser, :idFirm, :idService, :opinion, :stars)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":idUser", $idUser, PDO::PARAM_INT);
$statement->bindParam(":idFirm", $idFirm, PDO::PARAM_INT);
$statement->bindParam(":idService", $idService, PDO::PARAM_INT);
$statement->bindParam(":opinion", $opinion, PDO::PARAM_STR);
$statement->bindParam(":stars", $stars, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_opinion']=true;
	header("location: create_opinion_form.php");
	exit();
}

	$_SESSION['added_opinion']=false;
	header("location: create_opinion_form.php");
	exit();

?>