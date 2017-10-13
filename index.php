<?php
session_start();
include  "includes/db.php";
include "includes/functions.php";
 if (isset($_SESSION['userSession'])) 
{
	redirect('includes/home.php');
}
?>
<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>


<!-- <section class="section"> -->
	<div class="bg_display">
		 
               
                  <div class="content-caption">
                    <!-- Title -->
                    <h1 class="main_text">MAKE DESIGNING EASIER</h1>
                   <p class="main_text1"> WITH PATTERN STUDIO <br> upload and create beautiful custom fabric patterns.</p>
                   
                      <div class="">
                        <a class="btn btn-3d btn-lg  btn-warning getstarted" href="register.php">Get Started</a>
                      </div>       
                     
                  </div>
                
           
		

	</div>
<!-- Footer -->

</body>
       <footer class="footer">
      
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2 ">
        <p>© 2017 <span class="fot">Pattern Studio.</span> All rights reserved || <a class="fot" href="admin/admin.php">Admin Login<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a> 
</p>
        </div>
      </div>
    </footer>



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</html>


