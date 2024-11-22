<?php

class AdvancedCalculator{

    public function add($a, $b){
        return  $a + $b;
    }

    public function subtract($a, $b){
        return $a - $b;
    }

    public function multiply($a, $b){
        return $a * $b;
    }

    public function divide($a, $b){

        if($b == 0){
            return "Divide by 0 error!";
        }

        return $a / $b;
    }

    public function power($base, $exponent){
        return pow($base, $exponent);
    }

    public function squareRoot($a){
        return sqrt($a);
    }

    public function factorial($n){
        
        if($n < 0){
            return "Factorial with negative numbers doesn't exist!";
        }

        $factorial = 1;

        for($i = 1; $i <= $n; $i++){
            $factorial *= $i;
        }

        return $factorial;

    }
}

$calculator = new AdvancedCalculator();

echo "Add: " . $calculator->add(10, 2) . "<br>";
echo "Subtract: " . $calculator->subtract(10, 5) ."<br>";
echo "Multiplication: " . $calculator->multiply(5, 3) . "<br>";
echo "Division: " . $calculator->divide(5, 2) . "<br>";
echo "Power: " . $calculator->power(3, 2) . "<br>";
echo "Square Root: " . $calculator->squareRoot(16) . "<br>";
echo "Factorial: " . $calculator->factorial(6) . "<br>";