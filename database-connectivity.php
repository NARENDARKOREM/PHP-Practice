<?php
    // $servername="localhost";
    // $username="root";
    // $password="";
    // $database="lattitude";
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "lattitude");

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);
    }else{
        echo "Database Connected Successfully";
    }

    $conn->close();
?>