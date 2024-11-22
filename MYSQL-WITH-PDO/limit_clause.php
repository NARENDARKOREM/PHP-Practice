<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM students LIMIT 1 OFFSET 3";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            echo "Id " . $row['id'] . "<br>";
            echo "Name " . $row['name'] . "<br>";
            echo "Email " . $row['email'] . "<br>";
            echo "Password " . $row['password'] . "<br>";
            echo "Phone " . $row['phone'] . "<br>";
            echo "Location " . $row['location'] . "<br>";
            echo "Created_At " . $row['created_at'] . "<br>";
        }

    } catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>