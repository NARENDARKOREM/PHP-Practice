<?php
    abstract class Car{
        public $name;
        public function __construct($name)
        {
            $this->name = $name;
        }
        abstract public function intro():string;
    }

    class Audi extends Car{
        public function intro() : string{
            return "Choose the German Quality! I'm a {$this->name}";
        }
    }

    class Volvo extends Car{
        public function intro(): string
        {
            return "Proud to be Swidish! I'm a {$this->name}";
        }
    }

    class Citroen extends Car{
        public function intro(): string
        {
            return "French extravagance! I'm a {$this->name}";
        }
    }

    $audi = new Audi("Audi");
    echo $audi->intro();
    echo "<br>";
    $volvo = new Volvo("Volvo");
    echo $volvo->intro();
    echo "<br>";
    $citroen = new Citroen("Citroen");
    echo $citroen->intro()


?>