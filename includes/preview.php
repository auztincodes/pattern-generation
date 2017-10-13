<?php 
session_start();
include  "db.php";
include "functions.php";

if (!isset($_SESSION['userSession'])) 
{
    redirect('../index.php');
}

$ident = $_GET['d'];
$userS = $_SESSION['userSession'];

$query = $conn->query("SELECT * FROM users WHERE user_id = '$userS' ");
$userRow = $query->fetch_array();

include 'homenav.php';

		$result = $conn->query("SELECT * FROM gen_patterns WHERE id = '$ident' " );
	
		if ($result->num_rows > 0) 
		{
			$i = 0;
			while ($gen_pattern = $result->fetch_assoc()) 
			{
				$img_paths = explode(", ", $gen_pattern['pattern_img_paths']);

				$i = 1; //flag to know when full iteration of array has been made
				//$myArr = sqrt(count($generated));
				?><div style="margin-top: 15%; text-align:center"><?php
				foreach ($img_paths as $img_path)
				{
				    echo "<img src='../img/{$img_path}' style='width: 160px; height: 100px '>";
				    if ($i % $gen_pattern['pattern_num'] == 0) 
				    {
				        echo '<br>';
				    }

				    $i++;
				}
				      ?> <button class=' btn btn-3d btn-lg  btn-warning' onclick='window.print()'>Print Pattern</button>
				      </div>
				      <?php
			}
		}
$conn->close();
?>