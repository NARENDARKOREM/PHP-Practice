<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="checkbox" name="fruits[]" value="Apple" id="">Apple<br>
        <input type="checkbox" name="fruits[]" value="Banana" id="">Banana<br>
        <input type="checkbox" name="fruits[]" value="Grapes" id="">Grapes<br>
        <input type="checkbox" name="fruits[]" value="Cherry" id="">Cherry<br>
        <input type="submit" value="Submit"><br>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["fruits"])){
                $selectedFruits = $_POST["fruits"];

                echo "You have selected: ";

                echo "<ul>";

                foreach($selectedFruits as $fruit){
                    echo "<li>".htmlspecialchars($fruit)."</li>";
                }
                echo "</ul>";
            }else{
                echo "No fruit is selected";
            }
        }
    ?>
</body>
</html>