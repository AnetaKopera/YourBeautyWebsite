<?php 

session_start();
if(!isset($_SESSION['admin']) )
{
  header("location: login.php");
  exit();
}

$surname = ltrim(rtrim(filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING)));
if (empty($surname) || (!filter_var($surname, FILTER_SANITIZE_STRING)) )
{
	$_SESSION['error_surname'] = "Empty or error in surname";
	header("location: create_user_form.php");
	exit();
}

$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
if (empty($name) || (!filter_var($name, FILTER_SANITIZE_STRING)) )
{
	$_SESSION['error_name'] = "Empty or error in name";
	header("location: create_user_form.php");
	exit();
}

$name2 = ltrim(rtrim(filter_input(INPUT_POST, "name2", FILTER_SANITIZE_STRING)));
if(!filter_var($surname, FILTER_SANITIZE_STRING) )
{
	$_SESSION['error_name2'] = "Empty or error in second name";
	header("location: create_user_form.php");
	exit();
}


$account_type = ltrim(rtrim(filter_input(INPUT_POST, "account_type", FILTER_SANITIZE_STRING)));
if ((empty($account_type)) || ((($account_type)!='C') && (($account_type)!='W') && (($account_type)!='A') && (($account_type)!='O') ) || (!filter_var($account_type, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_account_type'] = "Empty or error in account type";
	header("location: create_user_form.php");
	exit(); 
}

$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
if ((empty($email)) || (!filter_var($email, FILTER_SANITIZE_EMAIL))) 
{
	$_SESSION['error_email'] = "Empty or error in email";
	header("location: create_user_form.php");
	exit(); 
}

$password = ltrim(rtrim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
if ((empty($password)) || (!filter_var($password, FILTER_SANITIZE_STRING)))
{
	$_SESSION['error_password'] = "Empty or error in password";
	header("location: create_user_form.php");
	exit(); 
}

$password = password_hash($password, PASSWORD_DEFAULT);

require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbConnection->query('SET CHARSET utf8');

$query = "INSERT INTO users (surname, name, name2, userType, email, password) VALUES(:surname, :name, :name2, :account_type, :email, :password)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":surname", $surname, PDO::PARAM_STR);
$statement->bindParam(":name", $name, PDO::PARAM_STR);
$statement->bindParam(":name2", $name2, PDO::PARAM_STR);
$statement->bindParam(":account_type", $account_type, PDO::PARAM_STR);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->bindParam(":password", $password, PDO::PARAM_STR);

try 
{
	$statement->execute();
} 
catch (Exception $th) 
{
	$_SESSION['added_user']=false;
	header("location: create_user_form.php");
	exit();
}
	$_SESSION['added_user']=true;
	header("location: create_user_form.php");
	exit();

?>