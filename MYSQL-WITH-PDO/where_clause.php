<?php 
    echo "<table style='border:1px solid black'>";
    echo "<tr><th>Name</th><th>Email</th></tr>";

    class TableRows extends RecursiveIteratorIterator{
        function __construct($it)
        {
            parent:: __construct($it, self::LEAVES_ONLY);
        }

        function current(): mixed
        {
            return "<td style='border:1px solid black'>" . parent::current() . "</td>";
        }

        function beginChildren(): void
        {
            echo "<tr>";
        }

        function endChildren(): void
        {
            echo "</tr>";
        }
    }

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT name, email FROM students WHERE location = 'Hyderabad'");
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