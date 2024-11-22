<?php

class Car{
    public $make;
    public $model;

    public function setMakeAndModel($make,$model){
        $this->make=$make;
        $this->model=$model;
    }

    public function getMakeAndModel(){
        return "Make: " . $this->make . ", Model: " . $this->model . "<br>";
    }

    // public function setModel($model){
    //     $this->model=$model;
    // }

    // public function getModel(){
    //     return $this->model;
    // }
}

$myCar = new Car();
$myCar->setMakeAndModel("Toyota","Innova");
echo $myCar->getMakeAndModel()."<br>";

// $myModel = new Car();
// $myModel->setModel("Innova");
// echo $myModel->getModel();