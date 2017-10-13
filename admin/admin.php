<?php
	session_start();
	include "../includes/db.php";
    include "../includes/functions.php";


    if (!isset($_SESSION['adminSession'])) 
    {
        redirect('admin_login.php');
    }
    $query = $conn->query("SELECT * FROM admin WHERE admin_id =" .$_SESSION['adminSession']);
    $adminRow = $query->fetch_array();



      /*  // $filename = $_FILES['files']['name'];
        // $extension = strtolower(substr($filename, strpos($filename, '.') + 1));
        // $tmp_name = $_FILES['files']['tmp_name'];;
        // $type = $_FILES['files']['type'];
        // move_uploaded_file($tmp_name, 'library/'.$filename);$target_dir = "uploads/";
     /*  */ $target_dir = "../includes/library/";
        $img_name = basename($_FILES["files"]["name"]);
        $target_file = $target_dir . $img_name ;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadOk = 1;


    if(isset($_POST['submit'])){
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.' !
                    </div>";
                
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 'Sorry, your file was not uploaded.' !
                    </div>";
                
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
                    $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; The file ". $img_name. " has been uploaded.
                    </div>";
                  
                } else {
                     $msg = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 'Sorry, there was an error uploading your file.' !
                    </div>";
                
                }
            }

            $query = "INSERT INTO img_library (file_name,file_path) VALUES ('$img_name', '$target_file')";
            if ($conn->query($query)) {
                    $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 'The file ". $img_name. " has been uploaded' !
                    </div>";
                 
                } else {
                    $msg = "<div class='alert alert-success'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 'Sorry, there was an error uploading your file.' !
                    </div>";
                    
                }
	$conn->close();
            }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="view port" content="width=device-width,initial-scale=1.0">
        <meta name="description" content="Fabric Pattern, Textile Design, ">
        <meta name="author" content="Austincodez">  
         <link rel="icon.png" href="../images/logo1.png">
        <link rel="shortcut icon" href="../images/logo1.png">
        <link rel="apple-touch-icon-precomposed" sizes="144X144" href="../images/logo1.png">
        <link rel="apple-touch-icon-precomposed" sizes="114X114" href="../images/logo1.png">
        <link rel="apple-touch-icon-precomposed" sizes="72X72" href="../images/logo1.png">
        <link rel="apple-touch-icon-precomposed" href="../images/logo1.png"> 

    <title>Welcome - <?php echo $adminRow['admin_name']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/fontawesome.css"/>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>


</head>
<body>

    <header class="navbar navbar-default navbar-fixed-top nav_style" >
        <div class="container" role= "banner">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1><a class="navbar-brand" href="home.php"><img src="../images/logo1.png" ></a></h1>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse navcol">
                
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $adminRow['admin_name']; ?>&nbsp;<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-off"></span>&nbsp;Sign Out</a></li>
                         </ul>
                    </li>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div>
    </header>



    <div class="container">
        <h4 class="dsc">UPDATE MOTIF LIBRARY </h4>
        <div class="register" style="width: 40%; margin-left: 30%">
        <?php
        if(isset($msg)){
            echo $msg;
        }
            ?>
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <h4>Select Motif To Upload:</h4><br>
                <input type="file" name="files" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
        
        

        <?php include "../includes/footer.php" ?>

