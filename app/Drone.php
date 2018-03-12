<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    public $name;
    public $maxWeight;

    public function __construct($name, $maxWeight)
    {
        $this->name = $name;
        $this->maxWeight = $maxWeight;
    }
}
