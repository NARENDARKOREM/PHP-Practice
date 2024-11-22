<?php

    abstract class ParentClass{
        abstract protected function prefixName($name);
    }

    class ChildClass extends ParentClass{
        public function prefixName($name, $seperator = ".", $greet = "Dear"){
            if($name == "Jai"){
                $prefix = "Mr";
            }elseif($name == "Vidya"){
                $prefix = "Mrs";
            }else{
                $prefix = "";
            }
            return "{$greet}, {$prefix}{$seperator} {$name}";
        }
    }

    $child = new ChildClass;
    echo $child->prefixName("Jai");
    echo "<br>";
    echo $child->prefixName("Vidya");
    