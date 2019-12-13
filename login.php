<?php 

session_start();

$login = ltrim(rtrim(filter_input(INPUT_POST, "login", FILTER_SANITIZE_EMAIL)));

if (empty($login) || (!filter_var($login, FILTER_VALIDATE_EMAIL)))
{
	$_SESSION['error_login'] = "Error in login";
	
	header("location: login_form.php");
	exit();
}

$password = ltrim(rtrim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
if (empty($password))
{
	$_SESSION['error_password'] = "Error in password";
	header("location: login_form.php");
	exit();
}


require_once "configuration.php";

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
$dbConnection->query('SET CHARSET utf8');

$query = "SELECT id FROM `users` WHERE email= :email AND  password= :password AND userType = 'A' ";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":email", $login, PDO::PARAM_STR);
$statement->bindParam(":password", $password, PDO::PARAM_STR);
$statement->execute();


   if ($statement->rowCount() > 0) {

		$_SESSION['admin']=true;
		header("location: mainMenu.php");
		exit();
    } 
	else {
		$_SESSION['error_signin'] = "Bad email or password!";
		header("location: login_form.php");
		exit();
    }


?>