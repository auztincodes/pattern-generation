<?php 
session_start();
if(isset($_SESSION['userSession'])!="")
{
	header("Location: home.php");
	exit;
}
include "includes/db.php";
include "includes/functions.php";	
if(isset($_POST['submit']))
{
	$uname = $conn->real_escape_string(trim($_POST['user_name']));
	$email = $conn->real_escape_string(trim($_POST['user_email']));
	$upass = $conn->real_escape_string(trim($_POST['password']));
	
	$new_password = ($upass);
	
	$check_email = $conn->query("SELECT user_email FROM users WHERE user_email='$email'");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		$query = "INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$new_password')";
		
		if($conn->query($query))
		{
			$_SESSION['userSession'] = $row['user_id'];
		
		redirect('login.php');
		}
		else
		{
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
	}
	else{
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	
	$conn->close();
}


	 include "includes/header.php" ;
	 include "includes/navigation.php" ;

 ?>
		

<div class = "container login">

		<h2>SIGN UP HERE</h2>

	<div class="register">
		  <?php
		if(isset($msg)){
			echo $msg;
		}
		else{
			?>
            <div class='alert alert-info'>
				<span class='glyphicon glyphicon-asterisk'></span> &nbsp; all the fields are mandatory !
			</div>
            <?php
		}
		?>
		
		<form action="" method="post">
					<input type="text" placeholder="Username" name="user_name" required >
					<input type="email" placeholder="Email Address " name="user_email" required >
					<input type="password" placeholder="Password" name="password" required >
					
					<input type="submit" name="submit" value="Register">

		<h4>Already have an account!</h4>
		<p><a href="login.php">Login Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</form>

	</div>
 </div>
		

	<?php include "includes/footer.php" ?>
