<?php

// Day 1: PHP Basics and Data Types
echo "Question 1: Basic Output";
echo "<br>";

echo "Hello, PHP <br>";
echo "Welcome to Programming";

echo "<br>";
echo "<br>";

echo "Question 2: Variable Assignment and Data Types";
echo "<br>";

$firstname = "John";
$lastname = "Doe";
$age = 21;
$IsStudent = true;

echo "First Name: $firstname <br>";
echo "Last Name: $lastname <br>";
echo "Age: $age <br>";
echo "IsStudnet: $IsStudent <br>";
echo "<br>";

echo "Question 3: Basic Arithmetic";

$num1 = 8;
$num2 = 2;

$sum = $num1 + $num2;
$difference = $num1 - $num2;
$product = $num1 * $num2;
$quotient = $num1 / $num2;

echo "Sum: $sum <br>";
echo "Difference: $difference <br>";
echo "Product: $product <br>";
echo "Quotient: $quotient <br>";
echo "<br>";

echo "Question 4: Data Type Check";

function checkDataType($variable){
    return gettype($variable);
}

$number = 12;
$string = "Hello";
$float = 23.98;
$boolean = true;

echo "<br>";

echo checkDataType($number)."<br>";
echo checkDataType($string)."<br>";
echo checkDataType($float)."<br>";
echo checkDataType($boolean)."<br>";

echo "<br>";
echo "<br>";
echo "Question 5: Temperature Conversion";

function celsiusToFahrenheit($celsius){
    return $celsius * 9 / 5 + 32;
}

function fahrenheitToCelsius($fahrenheit){
    return ($fahrenheit - 32) * 5 / 9;
}
echo "<br>";
echo celsiusToFahrenheit(25);
echo "<br>";
echo fahrenheitToCelsius(77);

