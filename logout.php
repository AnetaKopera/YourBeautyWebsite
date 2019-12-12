<?php
    session_start();
    unset($_SESSION['admin']);
    header("location: login_form.php");
    exit();

?>