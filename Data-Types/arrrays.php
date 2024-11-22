<?php

//Indexed array
echo "Indexed array <br>";
echo "<br>";

$fruits = array("Apple","Banana","Cherry");

echo $fruits[0] . "<br>";

foreach($fruits as $fruit){
    echo $fruit . "<br>";
}

for($i=0;$i<count($fruits);$i++){
    echo $fruits[$i] . "<br>";
}

print_r($fruits);

echo "<br>";

echo implode(", ", $fruits);
echo "<br>";
echo "<br>";


//Associative array
echo "Associtative array <br>";

$person = array("name"=> "Alice", "age"=>30);
echo $person["name"] . "<br>";

foreach($person as $key=>$value){
    echo $key .' ' . $value . "<br>";
}
echo "<br>";
echo "<br>";

// Multidimensional array
echo "Multidimensional array";
echo "<br>";

$products = array(
    array("Laptop", 1000),
    array("Tablet", 500)
);

echo $products[0][0];
echo "<br>";
echo $products[1][1];
echo "<br>";

foreach($products as $product){
    echo "Product: " . $product[0]. " | ". "Price: " . $product[1] . "<br>";
}