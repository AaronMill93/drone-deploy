<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $drone; //drone object
    private $locations = array(); //array of location objects
    private $trips = array(); //array of trip objects

    public function __construct($drone)
    {
        $this->drone = $drone;
    }

    public function addLocation($location)
    {
        //Add new location to end of $locations
        array_push($this->locations,$location);
    }

    public function addTrip($trip)
    {
        //Add new trip to end of $trips
        array_push($this->trips, $trip);
    }

    public function compareLocationsByPackageWeight($first, $second)
    {
        return $first->packageWeight < $second->packageWeight;
    }

    /**
     * Segments locations by package weight and creates trips recursively 
     */
    public function createTrips($locations, $weightLimit)
    {
        $locations = $this->locations;
        $drone = $this->drone;
        $weightLimit = $drone->maxWeight;
        $i = 0;
        $trip = new Trip();
        usort($this->locations, array($this,"compareLocationsByPackageWeight"));
        if (empty($locations)) {
            return 1;
        }
    
        elseif (count($locations) == 1) {
            if(end($locations)->packageWeight <= $weightLimit) {
                $trip->addLocation(array_pop($locations));
            }
            else{
                return 1;
            }
        }
        else {
    
            do {
    
                $arrayValue = array_pop($locations);
                $arrayValueWeight = $arrayValue->packageWeight;
                $trip->addLocation($arrayValue);
                $i += $arrayValueWeight;
    
            } while (($i + end($locations)->packageWeight) <= $weightLimit);
        }
    
        echo "POINTER: ". $i." LIST: ";
        print_r($trip);
        addTrip($trip);
        createTrips($locations, $weightLimit);
    }
}


