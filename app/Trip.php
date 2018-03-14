<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public $locations = array();

    public function __construct()
    {
    
    }

    public function addLocation($location)
    {
        //Add new location to end of $locations
        array_push($this->locations,$location);
    }
}
