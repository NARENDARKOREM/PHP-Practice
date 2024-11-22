<?php

    echo "<table style='border:1px solid black'>";
    echo "<tr><th>Name</th><th>Email</th><th>Mobile</th></tr>";

    class TableRows extends RecursiveIteratorIterator{

        function __construct($it)
        {
            parent:: __construct($it, self::LEAVES_ONLY);
        }

        function current(): mixed
        {
            return "<td style='border:1px solid black;width:200px'>" . parent::current() . "<br>";
        }

        function beginChildren(): void
        {
            echo "<tr>";
        }

        function endChildren(): void
        {
            echo "<tr>" . "\n";
        }

    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name, email, phone FROM students");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v){
            echo $v;
        }
    } catch(PDOException $e){
        echo "ERROR" . "<br>" . $e->getMessage();
    }

    $conn = null;
    echo "</table>";
?>