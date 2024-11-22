<?php
    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "spaces";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM students");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "ERROR" . "<br>" . $e->getMessage();
    }

    $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 100%;
            border-collapse: collase;
        }

        table, td, th{
            border: 1px solid black;
        }

        th,td{
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>

      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Location</th>
        <th>Created_At</th>
      </tr>

        <?php if(!empty($result) ): ?>
            <?php foreach($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id'])?></td>
                    <td><?php echo htmlspecialchars($row['name'])?></td>
                    <td><?php echo htmlspecialchars($row['email'])?></td>
                    <td><?php echo htmlspecialchars($row['password'])?></td>
                    <td><?php echo htmlspecialchars($row['phone'])?></td>
                    <td><?php echo htmlspecialchars($row['location'])?></td>
                    <td><?php echo htmlspecialchars($row['created_at'])?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="7">No Records Found.</td>
                </tr>
        <?php endif; ?>

    </table>
</body>
</html>