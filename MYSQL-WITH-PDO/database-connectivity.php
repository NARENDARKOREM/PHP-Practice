<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Database Connected Successfully";
    }catch(Exception $e){
        echo "Error" . $e->getMessage();
    }

    $conn = null;
?>