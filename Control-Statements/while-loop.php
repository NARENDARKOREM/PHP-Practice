<?php

echo "While Loop";
echo "<br>";
echo "<br>";

$count = 1;

while($count <= 5){
    echo "The Count is $count <br>";
    $count++;
}

echo "<br>";
echo "<br>";

echo "Do-While Loop";
echo "<br>";
echo "<br>";

$n=9; // do-while print statement atleast once if it is not satisfied
do{
    echo "The number is $n <br>";
    $n++;
}while($n<=4);

echo "<br>";
echo "<br>";

echo "For Loop";
echo "<br>";
echo "<br>";

for($num=1;$num<=10;$num++){
    echo "$num <br>";
}

echo "<br>";
echo "<br>";

echo "Foreach Loop";
echo "<br>";
echo "<br>";

$cities = array("Hyderabad","Bombay","Delhi","Chennai","Bengalore");

foreach($cities as $city){
    echo "$city <br>";
}

echo "<br>";
echo "<br>";

echo "Foreach Loop";
echo "<br>";
echo "<br>";

for($i=1;$i<=15;$i++){
    if($i==7){
        // break;
        continue;
    }
echo "$i <br>";
}