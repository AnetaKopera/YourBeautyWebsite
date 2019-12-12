<?php 
  session_start();
  if(isset($_SESSION['admin']))
  {
    header("location: mainMenu.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link rel="stylesheet" href="style.css">

</head>
<body>


<div class="formularz">
	<form action="login.php" method="post">

	<label for="email">Login: </label>
	<input type="text" id = "login" name = "login"><br>
	<?php 
		if(isset($_SESSION['error_login'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_login'] ."</p>";
			unset($_SESSION['error_login']);
		}
	?>

	<label for="password">Password: </label>
	<input type="password" id = "password" name = "password"><br>
	<?php 
		if(isset($_SESSION['error_password'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_password'] ."</p>";
			unset($_SESSION['error_password']);
		}
	?>

	<?php 
		if(isset($_SESSION['error_signin'] ) )
		{
			echo "<p class='error'>" .$_SESSION['error_signin'] ."</p>";
			unset($_SESSION['error_signin']);
		}
	?>
			  
	<button class="button" type="submit"><span>Log in</span></button>
	</form>
	
</div>

</body>
</html>