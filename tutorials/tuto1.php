<?php

class Car
{
    public $brand;
    public $model;
    public $color;

    public function start()
    {
        echo "The car is starting.";
    }
}

$myCar = new Car();
$myCar->brand = "Renault";
$myCar->model = "Clio";
$myCar->color = "Blue";

$myCar->start();
