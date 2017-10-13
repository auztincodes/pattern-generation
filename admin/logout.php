<?php
session_start();
include "../includes/functions.php";

if(!isset($_SESSION['adminSession']))
{
	redirect( "admin_login.php");
}
else if(isset($_SESSION['adminSession'])!="")
{
	redirect( "admin.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['adminSession']);
	redirect( "../index.php");
}
?>