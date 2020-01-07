<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$id = ltrim(rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING)));


$surname = ltrim(rtrim(filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING)));
if (empty($surname) || (!filter_var($surname, FILTER_SANITIZE_STRING)) )
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}

$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
if (empty($name) || (!filter_var($name, FILTER_SANITIZE_STRING)) )
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}

$name2 = ltrim(rtrim(filter_input(INPUT_POST, "name2", FILTER_SANITIZE_STRING)));
if(!filter_var($surname, FILTER_SANITIZE_STRING) )
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}

$dateOfBirth = ltrim(rtrim(filter_input(INPUT_POST, "dateOfBirth", FILTER_SANITIZE_STRING)));
if ((empty($dateOfBirth)) || (!filter_var($dateOfBirth, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}

$gender = ltrim(rtrim(filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING)));
if ((empty($gender)) || ((($gender)!="M") && (($gender)!="W")) || (!filter_var($gender, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}


$userType = ltrim(rtrim(filter_input(INPUT_POST, "userType", FILTER_SANITIZE_STRING)));
if ((empty($userType)) || ((($userType)!='C') && (($userType)!='W') && (($userType)!='A') && (($userType)!='O') ) || (!filter_var($userType, FILTER_SANITIZE_STRING)))
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
if ((empty($email)) || (!filter_var($email, FILTER_SANITIZE_EMAIL))) 
{
	$_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit();
}


$bankAccountNumber = ltrim(rtrim(filter_input(INPUT_POST, "bankAccountNumber", FILTER_SANITIZE_STRING)));


if ( ((empty($bankAccountNumber)) && ((($userType)=='C')  || (($userType)=='O') )) || $bankAccountNumber!=(filter_var($bankAccountNumber, FILTER_SANITIZE_STRING)))
{
   $_SESSION['updated_user'] = false;
	header("location: display_users.php");
	exit(); 
}
else if(empty($bankAccountNumber) || $bankAccountNumber=="-")
{
    $bankAccountNumber= null;
}

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');


$query = "UPDATE  `users` SET 
        surname=:surname, name=:name, name2=:name2,
        dateOfBirth=:dateOfBirth, gender=:gender,
        userType=:userType, email=:email, bankAccountNumber =:bankAccountNumber
        WHERE id=:id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":surname", $surname, PDO::PARAM_STR);
$statement->bindParam(":name", $name, PDO::PARAM_STR);
$statement->bindParam(":name2", $name2, PDO::PARAM_STR);
$statement->bindParam(":dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
$statement->bindParam(":gender", $gender, PDO::PARAM_STR);
$statement->bindParam(":userType", $userType, PDO::PARAM_STR);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->bindParam(":bankAccountNumber", $bankAccountNumber, PDO::PARAM_STR);
$statement->bindParam(":id", $id, PDO::PARAM_INT);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
    $_SESSION['updated_user']=false;
	header("location: display_users.php");
    exit();
}
    $_SESSION['updated_user']=true;
    header("location: display_users.php");
    exit();
    
?>