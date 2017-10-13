<!doctype html>
<html>
    <head>
        <title>Image shuffler</title>
        <link type="text/css"rel="stylesheet" href="css/cover.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="request">
                <h4>How many images do you want to process?</h4>
                <form action="app.php" method="get">
                    <input class="input" type="number" name="number" max="5" min="3" placeholder="choose from 3-5"><br>
                    <button type="submit">Get Files</button>
                </form>
            </div>
            <?php
                if (isset($_GET['number'])) {
                    echo '<form action="app.php" method="post" enctype="multipart/form-data">
                        <div class="files">';
                        for ($i = 0; $i < $_GET['number']; $i++) {
                            echo "<input type='file' name='input{$i}' class='input'><br>";
                        }
                        echo "<input type='hidden' name='number' value='" . $_GET['number'] . "'>
                        <input type='submit' name='getImages' value='Generate Pattern'>
                        </div>
                    </form>";
                }

                if (isset($_POST['getImages'])) {
                    include 'includes/test.php';
                    //checks for incomplete form
                    $arr = [];
                    foreach ($_FILES as $image){
                       $filename = basename($image['name']);
                       move_uploaded_file($image['tmp_name'], 'img/'.basename($image['name']));
                       array_push($arr, $filename);
                    }
                    $generated = generator($arr); //function call


                    echo '<h5 class="files">Generated Pattern</h5>
                    <div class="image">';
                        $i = 1; //flag to know when full iteration of array has been made
                        //$myArr = sqrt(count($generated));
                        foreach ($generated as $pattern){
                            echo "<img src='img/{$pattern}' style='width: 120px; height: 100px'>";
                            if ($i % $_POST['number'] == 0) {
                                echo '<br>';
                            }
                            $i++;
                        }
                    echo '</div>';

                    echo "<pre>";
                    var_dump($generated);
                    echo "</pre>";
                    die();
                }
            ?>
        </div>
    </body>
</html>


<?php
/*
                      unset($_SESSION['number']);
                      unset($_SESSION['generated']);
if (isset($_POST['getNumber'])) {
    $_SESSION['number'] = $_POST['number'];
} else if (isset($_POST['getImages'])) {
    //checks for incomplete form
    if (1==1){
       $arr = [];
       foreach ($_FILES as $image){
           $filename = basename($image['name']);
           move_uploaded_file( $image['tmp_name'],'img/'.basename($image['name']));
           array_push($arr,$filename);
       }
        $new_arr = generator($arr); //function call
        $_SESSION['generated'] = $new_arr;
    }
}

<!doctype html>
<head>
    <title>Image shuffler</title>
    <link type="text/css"rel="stylesheet" href="css/cover.css">
</head>
<body>
<div class="wrapper">
  <div class="request">
      <h4>How many images do you want to process?</h4>
      <form action="app.php" method="post">
          <input class="input" type="number" name="number" max="5" min="3" placeholder="choose from 3-5"><br>
          <input type="submit" name="getNumber" value="Get Files">
      </form>
  </div>

    <?php
    if(isset($_SESSION['number']) && !isset($_SESSION['generated'])){
        $output='';
        echo '<form action="app.php" method="post" enctype="multipart/form-data">';
            for($i=0;$i<$_SESSION['number'];$i++){
                $output .= "<input type='file' name='input{$i}' class='input'><br>";
            }
            $output .= "<input type='submit' name='getImages' value='Generate Pattern'>";
            echo '<div class="files">';
                echo $output;
            echo "</div>";
        echo '</form>';
        } elseif (isset($_SESSION['number']) && isset($_SESSION['generated'])){
        echo '<h5 class="files"> Generated Pattern</h5>';
            $generated = $_SESSION['generated'];
            $iteration = 1; //flag to know when full iteration of array has been made
            echo '<div class="image">';
                 $myArr = sqrt(count($generated));
                 $i = 0;
                 echo $_SESSION['number'];
                 die();
                 $num = $_POST['number'];
                 $seq = array();
                foreach ($generated as $pattern){
                        $seq[$i] = "img/{$pattern}";
                        echo "<img src='img/{$pattern}' style='width: 120px; height: 100px'>";
                        if ($iteration % $myArr == 0) {
                            echo '<br>';
                            
                            }
                            $iteration++;
                            $i++;
                    }

                    echo "<br><br>";

                    $i = 1;
                    foreach ($seq as $key => $value) {
                      echo "<img src='$value' style='width: 120px; height: 100px'>";
                      if ($i % $num == 0) {
                        echo '<br>';
                      }
                      $i++;


                      unset($_SESSION['number']);
                      unset($_SESSION['generated']);
                    }

                    /*echo "<pre>";
                    var_dump($seq);
                    echo "</pre>";
                    die();*/
                ?>