<?php

namespace App;

class Drone
{
    public $name;
    public $maxWeight;

    public function __construct($name, $maxWeight)
    {
        $this->name = $name;
        $this->maxWeight = $maxWeight;
    }
}
