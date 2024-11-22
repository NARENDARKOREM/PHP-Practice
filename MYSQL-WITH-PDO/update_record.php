<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE students SET name = 'Vidya', email = 'vidya@example.com' WHERE id = 14";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo $stmt->rowCount() . " Record Updated Successfully";
        
    }catch(PDOException $e){
        echo "ERROR" . "<br>" . $e->getMessage();
    }
    $conn = null;
?>