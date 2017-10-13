
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







    <title>Welcome - <?php echo $userRow['user_name']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link  rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.css"/>
    <link rel="stylesheet" type="text/css" href="../css/home.css"/>

 

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
               <a class="navbar-brand" href="home.php"><img src="../images/logo1.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse navcol">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="generate.php">Create Design</a></li>
                    <li><a href="motif_library.php">Motif Library</a></li>
                    <li ><a href="saved_patterns.php">My Designs</a></li>
                    <li><a href="#">About Us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                            <li><a href="../logout.php?logout=true"><span class="glyphicon glyphicon-off"></span>&nbsp;Sign Out</a></li>
                         </ul>
                    </li>
                </ul>


            </div><!-- /.navbar-collapse -->
        </div>
    </header>
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

