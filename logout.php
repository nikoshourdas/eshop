<?php

session_start();

if(isset($_SESSION['ID']))
{
	unset($_SESSION['ID']);
	session_destroy();

}

header("Location: login.php");
die;
?>