<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "ALTER TABLE students MODIFY COLUMN phone BIGINT";
        $conn->exec($sql);
        echo "students column updated successfully";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>