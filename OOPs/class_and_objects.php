<?php
    class Fruit{
        public $name;
        public $color;

        function set_fruit($color, $name){
            $this->color = $color;
            $this->name = $name;
        }
        
        function get_color(){
            return $this->color;
        }
        
        function get_name(){
            return $this->name;
        }
    }

    $apple = new Fruit();
    $banana = new Fruit();

    $apple->set_fruit("Red","Apple");
    $banana->set_fruit("Yellow", "Banana");

    echo $apple->get_name() . " " .  $apple->get_color() . "<br>"; 
    echo $banana->get_name() . " " . $banana->get_color();

?>