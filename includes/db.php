<?php
	$DB_HOST = "localhost";
	$DB_USER = "root";
	$DB_PASS = "";
	$DB_NAME = "pattern";

	$conn = new MySQLi($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if ($conn->connect_errno)
	{
		die("ERROR : -> ".$conn->connect_error);
	}
?>