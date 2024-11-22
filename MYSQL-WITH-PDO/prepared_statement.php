<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "spaces";

   try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO students (name, email, password, phone, location) VALUES 
    (:name, :email, :password, :phone, :location)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':location', $location);

    $name = "Angourie";
    $email = "angourie@example.com";
    $password = "123456";
    $phone = 8970653421;
    $location = "Pune";

    $stmt->execute();

    echo "$name, Record Inserted Successfully";

   }catch(PDOException $e){
    echo "ERROR" . "<br>" . $e->getMessage();
   }

   $conn = null;

?>