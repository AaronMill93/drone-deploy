<?php

namespace App;

class Location
{
    public $name;
    public $packageWeight;

    public function __construct($name, $packageWeight)
    {
        $this->name = $name;
        $this->packageWeight = $packageWeight;
    }
}
