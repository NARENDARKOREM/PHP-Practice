<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
        $sql = "INSERT INTO students (name, email, password, phone, location) VALUES
            ('Safin', 'safin@example.com', '123456', 7896054321, 'Hyderabad')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "New Record Inserted Successfully: " . $last_id;
    } catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>