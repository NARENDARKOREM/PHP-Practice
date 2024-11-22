<?php

class Goodbye{
    const LEAVING_MESSAGE = "Thanks for visiting our website!";
}

echo Goodbye::LEAVING_MESSAGE;

class Goodbye2{
    const LEAVING_MESSAGE = "THANKS FOR VISITING OUR WEBSITE!";
    function byebye(){
        echo self::LEAVING_MESSAGE;
    }
}

$message = new Goodbye2;
echo $message->byebye();