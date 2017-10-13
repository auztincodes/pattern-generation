<?php
session_start();
include  "db.php";

if (!isset($_SESSION['userSession'])) 
{
    redirect('../index.php');
}

$user_id = $_SESSION['userSession'];
$pattern_num = $_POST['pattern_num'];
$pattern_img_paths = $_POST['pattern_img_paths'];
$date_gen = date('d M Y H:i:s');

$query = "INSERT INTO gen_patterns (user_id, pattern_num, pattern_img_paths, date_gen)
    VALUES('$user_id', '$pattern_num', '$pattern_img_paths', '$date_gen')";

if ($conn->query($query)) {
	$_SESSION['msg'] = 'Your pattern was saved successfully.';
	$page = 'saved_patterns.php';
} else {
	$_SESSION['msg'] = 'Sorry, your pattern could not be saved.';
	$page = 'generate.php';
}

header('Location: ' . $page);
exit();
?>