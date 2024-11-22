<?php
    class Student{
        public $student;
    }
    $student_name = new Student;
    $student_name->student = "Jai";
    echo $student_name->student . "<br>";


    class Fruit{
        public $name;
        function set_name($name){
            $this->name = $name;
        }
    }
    $apple = new Fruit();
    echo var_dump($apple instanceof Fruit);
?>