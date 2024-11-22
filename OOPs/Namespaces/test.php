<?php
    namespace Html;
    class Table{
        public $title = "";
        public $numRows = 0;
        public function message(){
            return "The table name {$this->title}, number of rows {$this->numRows}";
        }
    }

    $r1 = new Table();
    $r1->title = "Students";
    $r1->numRows = 5;
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
        $r1->message();
    ?>
</body>
</html>