<?php

function assignFirstNameToDifferentUsers($lastname, ...$firstname){
    $txt = "";
    $len = count($firstname);

    for($i = 0; $i < $len; $i++){
        $txt = $txt . "Hi, $firstname[$i] $lastname. <br>";
    }
    return $txt;
}

echo assignFirstNameToDifferentUsers("Doe","John","Johny","Jai");