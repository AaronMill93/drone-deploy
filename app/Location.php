<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $name;
    public $packageWeight;

    public function __construct($name, $packageWeight)
    {
        $this->name = $name;
        $this->packageWeight = $packageWeight;
    }
}
