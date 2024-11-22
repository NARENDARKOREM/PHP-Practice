<?php
    class Fruit{

        public $name;
        public $color;
        public $weight;


        function set_name($name){
            $this->name = $name;
        }

        protected function set_color($color){
            $this->color = $color;
        }

        private function set_weight($weight){
            $this->weight = $weight;
        }

        function get_name(){
            return $this->name;
        }

        function get_color(){
            return $this->color;
        }

        function get_weight(){
            return $this->weight;
        }

        
    }

    $mango = new Fruit();
    $mango->set_name("Mongo"); // 
    // $mango->set_color("Yellow");
    // $mango->set_weight("200");

    echo $mango->get_name();
    echo "<br>";
    echo $mango->get_color();
    echo "<br>";
    echo $mango->get_weight();
    


?>