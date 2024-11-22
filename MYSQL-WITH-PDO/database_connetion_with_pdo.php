<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE Spaces";
        $conn->exec($sql);
        echo "Database Created Successfully";
    }catch(Exception $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>