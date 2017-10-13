<?php
	session_start();
	include  "db.php";
	include "functions.php";

	$id = $_GET['id'];
	$query = $conn->query("SELECT * FROM img_library WHERE id = '$id'");
	while ($result = $query-> fetch_array()) {
		$path = $result['file_path'];
		header('content-Disposition: attachment; filename ='.$path.' ');
		header('content_type:application/octent-strem');
		header('content-length=' . filesize($path));
		readfile($path);



	}



?>