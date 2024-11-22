<?php 

    class Fruits{
        public $name;
        public $color;

        function __construct($name, $color)
        {
            $this->name = $name;
            $this->color = $color;
        }

        protected function get_fruit(){
            echo "The fruit name is {$this->name}, and the color is {$this->color}";
        }
    }

    class Strawberry extends Fruits{
        function message() {
            echo "Am I fruit or berry?";
            $this->get_fruit();
        }
    }

    $strawberry = new Strawberry("Strawberry", "red");
    $strawberry->message();
    echo "<br>";
    // $strawberry->get_fruit();
?>