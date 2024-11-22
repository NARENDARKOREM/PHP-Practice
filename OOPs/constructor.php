<?php

    class Students{
        public $name;
        public $age;

        function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        function get_student_name() {
            return $this->name;
        }
        function  get_student_age() {
            return $this->age;
        }
    }

    $student1 = new Students("Jai", 23);
    $student2 = new Students("Prashik", 22);

    echo $student1->get_student_name() . " " . $student1->get_student_age() . "<br>";
    echo $student2->get_student_name() . " " . $student2->get_student_age() . "<br>";