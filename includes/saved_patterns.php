<?php 
session_start();
include  "db.php";
include "functions.php";

if (!isset($_SESSION['userSession'])) 
{
    redirect('../index.php');
}
$query = $conn->query("SELECT * FROM users WHERE user_id =" .$_SESSION['userSession']);
$userRow = $query->fetch_array();

 include 'homenav.php';

echo "<div class='history'>";
echo "<h1 class='dsc3'>Generated Patterns</h1>";
$result = $conn->query("SELECT * FROM gen_patterns WHERE user_id = " . $_SESSION['userSession'] . " ORDER BY id DESC");
if ($result->num_rows > 0) {
	$i = 0;

	while ($gen_pattern = $result->fetch_assoc()) {
		$img_paths = explode(", ", $gen_pattern['pattern_img_paths']);

		$i = 1; //flag to know when full iteration of array has been made
		//$myArr = sqrt(count($generated));
		foreach ($img_paths as $img_path){
		    echo "<img src='../img/{$img_path}' style='width: 120px; height: 100px'>";
		    if ($i % $gen_pattern['pattern_num'] == 0) {
		        echo '<br>';
		    }

		    $i++;
		}
		echo "Date generated:" . $gen_pattern['date_gen'];
		echo '<br>';
		$id = $gen_pattern['id'];
		echo "<a href='preview.php?d=$id' class=' btn btn-3d btn-sm  btn-info'>Preview Pattern</a>";

		
		echo '<br><br>';
	}
} else {

}
$conn->close();
echo "</div>";
/*
while ($query->fetch_array()) {
	$gen_patterns = 
}
} else {
    echo "0 results";
}
//$gen_patterns = $query->fetch_assoc();

$conn->close();
*/
/*echo "<pre>";
print_r($gen_patterns);
echo "</pre>";
die();
*/
/*
$i = 1; //flag to know when full iteration of array has been made
//$myArr = sqrt(count($generated));
foreach ($gen_patterns as $gen_pattern){
    echo "<img src='../img/{$gen_pattern['pattern_img_paths']}' style='width: 120px; height: 100px'>";
    if ($i % $gen_pattern['pattern_num'] == 0) {
        echo '<br>';
    }
    $i++;
}*/

?>
    <?php include "footer.php" ?>