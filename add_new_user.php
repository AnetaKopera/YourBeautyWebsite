<?php 


$response = array();

$surname = ltrim(rtrim(filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING)));
if (empty($surname))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute surname";
    echo json_encode($response);
	exit();
}

$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
if (empty($name))
{
	$response["success"] = 0;
    $response["message"] = "Errror in attribute name";
    echo json_encode($response);
	exit();
}

$name2 = ltrim(rtrim(filter_input(INPUT_POST, "name2", FILTER_SANITIZE_STRING)));
//ten parametr moze byc pusty

$date_of_birth = ltrim(rtrim(filter_input(INPUT_POST, "date_of_birth", FILTER_SANITIZE_STRING)));
if ((empty($date_of_birth)) || (!filter_var($date_of_birth, FILTER_SANITIZE_STRING)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute date_of_birth";
    echo json_encode($response);
	exit();
}

$gender = ltrim(rtrim(filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING)));
//nie trzeba sprawdzac bo w kodzie wysyłamy na podstawie buttona prawidlowe wartosci zaawsze


//na sztywno chwilowo

$account_type = "C"; //ltrim(rtrim(filter_input(INPUT_POST, "account_type", FILTER_SANITIZE_STRING)));
/*if ((empty($account_type)) || (!filter_var($account_type, FILTER_SANITIZE_STRING))) 
{
	$response["success"] = 0;
    $response["message"] = "";
    echo json_encode($response);
	exit(); 
}*/


//potem dodac sprawdzanie czy taki email w bazie juz nie istnieje
$email = ltrim(rtrim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
if ((empty($email)) || (!filter_var($email, FILTER_SANITIZE_STRING))) 
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute email";
    echo json_encode($response);
	exit();
}

$password = ltrim(rtrim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
if ((empty($password)) || (!filter_var($password, FILTER_SANITIZE_STRING)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute password";
    echo json_encode($response);
	exit();
}

//jesli dla innych userow tez to moze byc pusty bo worker nie potrzebuje dodawac nr konta
$bank_account_number = ltrim(rtrim(filter_input(INPUT_POST, "bank_account_number", FILTER_SANITIZE_NUMBER_INT)));
if ((empty($bank_account_number)) || (!filter_var($bank_account_number, FILTER_SANITIZE_NUMBER_INT)))
{
	$response["success"] = 0;
    $response["message"] = "Error in attribute bank_account_number";
    echo json_encode($response);
	exit();  
}


require_once "configuration.php";


$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/* Perform Query */
$query = "INSERT INTO users (surname, name, name2, dateOfBirth, gender, userType, email, password, bankAccountNumber) VALUES(:surname, :name, :name2, :date_of_birth, :gender, :account_type, :email, :password, :bank_account_number)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":surname", $surname, PDO::PARAM_STR);
$statement->bindParam(":name", $name, PDO::PARAM_STR);
$statement->bindParam(":name2", $name2, PDO::PARAM_STR);
$statement->bindParam(":date_of_birth", $date_of_birth, PDO::PARAM_STR);
$statement->bindParam(":gender", $gender, PDO::PARAM_STR);
$statement->bindParam(":account_type", $account_type, PDO::PARAM_STR);
$statement->bindParam(":email", $email, PDO::PARAM_STR);
$statement->bindParam(":password", $password, PDO::PARAM_STR);
$statement->bindParam(":bank_account_number", $bank_account_number, PDO::PARAM_INT);
$statement->execute();


 if ($query) {
		$_SESSION['added_user']=true;
		header("location: create_user_form.php");
		exit();
    } 
	else {
		$_SESSION['added_user']=false;
		header("location: create_user_form.php");
		exit();
    }

?>