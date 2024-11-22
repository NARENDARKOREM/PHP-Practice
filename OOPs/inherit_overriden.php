<?php
class Demo
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

   final function get_fruits(){
        echo "The fruit name is {$this->name} and the color is {$this->color} ";
    }

}

class Berry extends Demo{
    public $weight;
    function __construct($name, $color, $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }
    function message()
    {
        echo "The fruit name is {$this->name}, color is {$this->color} and the weight is {$this->weight} ";
    }
}

$strawberry = new Berry("Strawberry", "red", "300");
echo $strawberry->get_fruits();
echo "<br>";
// echo $strawberry->message();
