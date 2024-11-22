<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spaces";

    try{

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO students (name, email, password, phone, location) VALUES
            ('Narendar', 'narendar@example.com', '123456', 8907654321, 'Hyderabad'),
            ('Jai', 'jai@example.com', '123456', 9087564321, 'Hyderabad'),
            ('Raj', 'raj@example.com', '123456', 7890654321, 'Hyderabad')";

        $conn->exec($sql);

        echo "New Records Inserted Successfully";

    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
?>