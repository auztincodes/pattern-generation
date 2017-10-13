
<?php 
session_start();
include  "db.php";
include "functions.php";

if (!isset($_SESSION['userSession'])) 
{
	redirect('../index.php');
}
$query = $conn->query("SELECT * FROM users WHERE user_id =" .$_SESSION['userSession'] );
$userRow = $query->fetch_array();




?>
<?php include 'homenav.php';?>

 <div class="container">
    	<h6 class="dsc">Download Motifs From Library</h6>
    	<hr class="line"><br>
</div>

<?php
$query = $conn->query("SELECT * FROM img_library" . " ORDER BY id DESC");
	


while ($result = $query-> fetch_array()) {
	$path = $result['file_path'];
	$id = $result['id'];
		
	echo '<img src=" '.$path.' " width= "250px" height="200px" style="margin-bottom: 100px"/>' ;

	 ?><a href="download.php?id= <?php echo $id ?>"> Download </a> &nbsp&nbsp<?php

}


?>
<?php $conn->close();?>

	<?php include "footer.php" ?>
