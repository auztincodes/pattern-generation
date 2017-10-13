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
$conn->close();

?>
<?php include 'homenav.php';?>

                   	
                   	
    
    
    	
    <div class="container">
    	<h1 class="dsc">HOW IT WORKS</h1>
    	<hr class="line">
    	<p class="dsc2">Use our online custom fabric maker, upload your own motifs or use from our artist collections.<br>You do not have to be a graphic artist to create a beautiful custom printed fabric. Just use our online creator, it's that easy!</p>
    	<div class="row">
    		<div class="dsc4 col-xs-6 col-xs-offset-3 col-md-6 col-md-offset-4 ">
    			<a class="btn btn-3d btn-lg  btn-warning getstarted" href="generate.php">Start a New Pattern Design</a>
    		</div>
    	</div>
    </div>
    <?php include "footer.php" ?>


    