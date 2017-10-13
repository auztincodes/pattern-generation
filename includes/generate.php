
   <!--  <script src="../js/jquery.js"></script>
    <script type="text/javascript" >
    $(window).load(function(){
        alert('working');
    });
        
    </script>
    <script type="text/javascript" src="../js/patternTwo.js"></script> -->
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
        <div class="wrapper">
            <?php if (!isset($_POST['getImages'])) {
            echo '<div class="request">
                <h4>How many motifs do you want to upload?</h4>
                <form action="generate.php" method="get">
                    <input class="input form-control" type="number" name="number" max="5" min="3" placeholder="choose from 3-5"><br><br>
                    <button type="submit" class="btn btn-3d btn-lg  btn-warning">upload motifs</button>
                </form>
            </div>';
            } ?>
            <?php
                if (isset($_GET['number'])) {
                    echo '<form action="generate.php" method="post" enctype="multipart/form-data">
                        <div class="files">';
                        for ($i = 0; $i < $_GET['number']; $i++) {
                            echo "<input type='file' name='input{$i}' style='margin-left:45% '><br>";
                        }
                        echo "<input  type='hidden' name='number' value='" . $_GET['number'] . "'></br>
                        <input type='submit' name='getImages' class='btn btn-3d btn-lg  btn-warning' value='Generate Pattern'>
                        </div>
                    </form>";
                }

            


                if (isset($_POST['getImages'])) {
                    include 'test.php';
                    //checks for incomplete form
                    $arr = [];
                    foreach ($_FILES as $image){
                       $filename = basename($image['name']);
                       move_uploaded_file($image['tmp_name'], '../img/'.basename($image['name']));
                       array_push($arr, $filename);
                    }
                    $generated = generator($arr, 2); //function call
                    require_once("test.php");
                    //$what = $_POST['Name'];
                   /* $newPattern = nonReduced($arr,1);

                    foreach ($newPattern as $value) {
                        echo $result = $value;*/
                    //}
                    // if ($newPattern) {
                    //     echo "<pre>";
                    //     print_r($newPattern);
                    //     echo "</pre>";
                                     
                    //     # code...
                    // }


                    // //$GeneratedTwo = generator($arr,1);
                    //  $newPattern = nonReduced($arr,1);
                    //  echo "<pre>";
                    //  print_r($generated);
                    //  echo "</pre>";

                     

                    


                    echo '<h4 class="dsc5">Generated Pattern</h4>
                    <div class="image">';
                        ?><div class= 'row' id='response'><?php
                        ?><div class= 'col-md-6 ' style=" margin-right:-50px"><?php


                        $i = 1; //flag to know when full iteration of array has been made
                        //$myArr = sqrt(count($generated));
                        foreach ($generated as $pattern){
                            echo "<img src='../img/{$pattern}' style='width: 160px; height: 100px'>";
                            if ($i % $_POST['number'] == 0) {
                                echo '<br>';
                            }
                            $i++;
                        }
                        ?></div><?php
                        ?><div class= 'col-md-6' ><?php


                        $i = 1; //flag to know when full iteration of array has been made
                        //$myArr = sqrt(count($generated));
                        foreach ($generated as $pattern){
                            echo "<img src='../img/{$pattern}' style='width: 160px; height: 100px '>";
                            if ($i % $_POST['number'] == 0) {
                                echo '<br>';
                            }
                            $i++;
                        }
                        ?></div><?php
                        ?></div><?php
                    echo '</div>';

                    $pattern_num = $_POST['number'];
                    $pattern_img_paths = implode(", ", $generated);

                    echo "<form action='save_pattern.php' method='post'>
                        <input type='hidden' name='pattern_num' value='$pattern_num'>
                        <input type='hidden' name='pattern_img_paths' value='$pattern_img_paths'>
                        <div class=' dsc4 '>

                        <button class=' btn btn-3d btn-lg  btn-warning' type='submit'>Save Pattern</button>
                        <a href='generate.php' class=' btn btn-3d btn-lg  btn-warning'>Create New Pattern</a>
                        </div>
                    </form>";

                  /*  echo"<form id='patternForm'>
                        <input type='hidden' value='".$result."' id='name'>
                       <button class=' btn btn-3d btn-lg btn-danger' id='newpat'>Change Pattern</button>
                       <form>";*/

                    /*echo "<pre>";
                    var_dump($generated);
                    echo "</pre>";
                    die();*/
                }
            ?>
        </div>
    <?php include "footer.php" ?>