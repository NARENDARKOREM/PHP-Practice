<?php

echo "Question 6: Temperature Conversion";
echo "<br>";

function isEven($number){
    return $number % 2 == 0;
}

echo isEven(2) ? "True <br>" : "False <br>";
echo isEven(5) ? "True <br>" : "False <br>";
echo isEven(8) ? "True <br>" : "False <br>";
echo isEven(11) ? "True <br>" : "False <br>";
echo isEven(15) ? "True <br>" : "False <br>";

echo "<br>";
echo "<br>";

echo "Question 7: Greatest of Three Numbers";
echo "<br>";

function findGreatest($a, $b, $c){
    return max($a, $b, $c);
}

echo findGreatest(4,6,7);

echo "<br>";
echo "<br>";
echo "Question 8: Basic Calculator";
echo "<br>";

function calculator($num1, $num2, $operation){
    switch($operation){
        case '+':
            return $num1 + $num2;
            break;

        case '-':
            return $num1 - $num2;
            break;
        
        case '*':
            return $num1 * $num2;
            break;

        case '/':
            return $num1 / $num2;
            break;

        default:
            return "Invalid Operation";
            break;

    }
}

echo "Add: " . calculator(10, 5, '+') . "<br>";
echo "Subtract: " . calculator(10, 5, '-') . "<br>";
echo "Multiply: " . calculator(10, 5, '*') . "<br>";
echo "DIvision: " . calculator(10, 5, '/') . "<br>";

echo "<br>";
echo "<br>";
echo "Question 9: FizzBuzz";
echo "<br>";

for($i = 1; $i <= 30; $i++){    
    if($i % 3 == 0 && $i % 5 == 0){
        echo "FizzBuzz"."<br>";
    } elseif($i % 3 == 0){
        echo "Fizz"."<br>";
    }elseif($i % 5 == 0){
        echo "Buzz"."<br>";
    }else{
        echo $i . "<br>";
    }
}

echo "<br>";
echo "<br>";
echo "Question 10: Check Palindrome";
echo "<br>";

function isPalindrome($string){
    $cleanedString = strtolower(str_replace(' ', '',$string));
    $reversedString = strrev($cleanedString);
    return $cleanedString === $reversedString;
}

echo isPalindrome("LEVEL") ? "True <br>" : "False <br>";
echo isPalindrome("Hello") ? "True <br>" : "False <br>";
echo isPalindrome("Racecar") ? "True <br>" : "False <br>";
echo isPalindrome("malayalam") ? "True <br>" : "False <br>";

echo "<br>";
echo "<br>";
echo "Question 13: Simple Interest Calculator";
echo "<br>";

function calculateSimpleInterest($pricipal, $state, $time){
    return $pricipal * $state * $time;
}

echo calculateSimpleInterest(10000, 0.05, 6);
