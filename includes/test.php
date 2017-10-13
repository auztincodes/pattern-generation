<?php

function generator (array $arr, $patt_num)
{
    $imageArray = $arr;
   $arrsize = $count = count($arr); //count the array values
    $newArray = $pattern = array([$count]);

    for($i=0; $i < $arrsize; $i++){
        for($j=0; $j < $arrsize; $j++){
            $hold = $pattern[$i][$j] = ($j + $count) % $arrsize;
      //   echo $pattern[$i][$j]."&nbsp&nbsp&nbsp";
            array_push($newArray, $imageArray[$hold]);
        }
        echo "<br>";
        if ($patt_num == 1) {
            $count--;
        } else if ($patt_num == 2) {
            $count++;
        }
    }
    // unset($newArray);
    //var_dump(array_slice($newArray,1));
   return array_slice($newArray,1);
}

function nonReduced($generate,$patt) {
    $functionOne = generator($generate,$patt);
   echo"<pre>";
   print_r($functionOne);
   echo "</pre>";
}
// function nonName($name){
// }





?>
