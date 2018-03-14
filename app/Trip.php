<?php

namespace App;

class Trip
{
    public $locations = array(); //Array of location objects

    public function __construct()
    {
    
    }

    /**
     * Add location from object 
     */
    public function addLocationFromObject($location)
    {
        //Add new location to end of $locations
        array_push($this->locations,$location);
    }
    /**
     * Add location from object 
     */
    public function addLocationFromArray($location)
    {
        $locationObject = new Location($location['name'], $location['packageWeight']);
        //Add new location to end of $locations
        array_push($this->locations,$locationObject);
    }
}
