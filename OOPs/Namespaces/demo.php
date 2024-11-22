<?php

   include "Html.php";

   $table = new Html\Table();
   $table->title = "Students";
   $table->numRows = 5;

   $row = new Html\Rows();
   $row->numOfCells = 3;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $table->message();
        echo "<br>";
        echo $row->message();
    ?>
</body>
</html>