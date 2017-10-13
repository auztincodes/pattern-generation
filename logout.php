<?php
session_start();
include "includes/functions.php";

if(!isset($_SESSION['userSession']))
{
	redirect( "index.php");
}
else if(isset($_SESSION['userSession'])!="")
{
	redirect( "home.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['userSession']);
	redirect( "index.php");
}
?>