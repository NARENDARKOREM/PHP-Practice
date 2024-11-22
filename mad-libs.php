<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Enter your name:- <input type="text" name="name"><br>
        Enter your age:- <input type="text" name="age"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        $name = $_POST['name'];
        $age = $_POST['age'];

        echo "<h3>Your Details:</h3>";
        echo "Name:- $name <br>";
        echo "Age:- $age";
    ?>
</body>
</html>