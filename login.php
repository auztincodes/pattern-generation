<?php
session_start();
include "includes/db.php";
include "includes/functions.php";

if(isset($_SESSION['userSession'])!="")
{
	header("Location: home.php");
	exit;
}
if (isset($_POST['submit'])) {
	$email = $conn->real_escape_string(trim($_POST['user_email']));
	$upass = $conn->real_escape_string(trim($_POST['password']));

	$query = $conn->query("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_email = '$email' OR user_name = '$email' ");
	$row = $query->fetch_array();

	$result = $query->num_rows;

	if ($result==1 AND $row['user_pass']==($upass)) {
		$_SESSION['userSession'] = $row['user_id'];
		
		redirect('includes/home.php');
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password does not exists !
				</div>";
	}
	
	$conn->close();

}


include "includes/header.php" ;
include "includes/navigation.php";


  ?>
		

		<div class = "container login">

		<h2>LOGIN FORM</h2>

	<div class="register">
		<?php
			if (isset($msg)) {
				echo "$msg";
			}
		?>
		
		<form action="#" method="post">
			<input type="text" placeholder="Email Address or Username" name="user_email" required >
			<input type="password" placeholder="Password" name="password" required>
			<div class="forgot">
				<a href="#">Forgot Password?</a>
			</div>
			
			<input type="submit" name="submit" value="Login">
		</form>
				<h4>For New People</h4>
			<p><a href="register.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>

	</div>
 </div>
	<?php include "includes/footer.php" ?>
