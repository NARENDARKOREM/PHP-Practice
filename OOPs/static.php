<?php

class greeting{
    public static function welcome(){
        echo "hello";
    }
}

echo greeting::welcome();

echo "<br>";

class greet{
    public static function hello(){
        echo "hai";
    }

    public function __construct()
    {
         self::hello();
    }
}

new greet();

echo "<br>";

class A{
    public static function welcome(){
        echo "Hello";
    }
}

class B{
    public function message(){
        A::welcome();
    }
}

$message = new B();
echo $message->message();

echo "<br>";

// static properties
class Pi{
    public static $pi = 3.14;
}

echo Pi::$pi;

echo "<br>";

class Math{
    public static $value = 3.14159;
    function test(){
        return self::$value;
    }

}

$result = new Math();
echo $result->test();
