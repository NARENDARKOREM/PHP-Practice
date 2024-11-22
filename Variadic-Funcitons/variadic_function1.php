<?php

function sumOfAllNumbers(...$x){
    $n = 0;
    $len = count($x);

    for($i = 0; $i < $len; $i++){
        $n += $x[$i];
    }
    return $n;
}

$result = sumOfAllNumbers(4,5,6,7,8,9);
echo $result;