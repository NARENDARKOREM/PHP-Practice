<?php
    class Customers{
        public $name;
        public $age;

        function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        function __destruct()
        {
            echo "The Customer name is {$this->name}, age {$this->age}";
        }
    }

    $customer1 = new Customers("Jai", 23);
?>