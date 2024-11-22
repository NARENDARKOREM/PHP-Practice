<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->beginTransaction();

        $conn->exec("INSERT INTO students (name, email, password, phone, location) VALUES 
        ('James', 'james@example.com', '123456', 6708904321, 'Bombay')");

        $conn->exec("INSERT INTO students (name, email, password, phone, location) VALUES
        ('Paul', 'paul@example.com', '123456', 8906754231, 'Bengalore')");

        $conn->exec("INSERT INTO students (name, email, password, phone, location) VALUES
        ('Selena', 'selena@example', '123456', 6758904321, 'Delhi')");

        $conn->commit();

        echo "Multiple Records Inserted Successfully";
    } catch(PDOException $e){
        $conn->rollBack();
        echo "ERROR" . "<br>" . $e->getMessage();
    }

    $conn = null;
?>