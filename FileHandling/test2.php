<?php
    $myFile = fopen("webDictionary.txt","w") or die("Unable to Open File!");

    echo fread($myFile, filesize("webDictionary.txt"));
    fclose($myFile);
?>