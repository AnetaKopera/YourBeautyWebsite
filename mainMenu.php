<?php 
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: login_form.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<title>YourBeauty Admin panel</title>

</head>
<body>

<div class="topnav">
  <a class="active" >Home</a>
  <a href="create_firm_form.php">Add values to tables</a>
  <a href="display_firms.php">Modify tables</a>
  <a href="logout.php">Log out</a>
</div>

<div style="padding-left:16px">
  <h2>Hello administrator!</h2>
  <p>Choose option in navigationbar to add values, edit or  display tables. </p>
</div>

</body>
</html>

