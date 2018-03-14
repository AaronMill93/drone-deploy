<?php

namespace App;

class Schedule
{
    public $drone; //drone object
    public $locations = array(); //array of location arrays
    public $trips = array(); //array of trip objects

    public function __construct($drone)
    {
        $this->drone = $drone;
    }

    public function addTrip($trip)
    {
        //Add new trip to end of $trips
        array_push($this->trips, $trip);
    }

    public function compareLocationsByPackageWeight($first, $second)
    {
        return $first["packageWeight"] < $second["packageWeight"];
    }

    /**
     * Segments locations by package weight and creates trips recursively 
     */
    public function createTrips($locations, $weightLimit)
    {
        $i = 0;
        $trip = new Trip();
        usort($locations, array($this,"compareLocationsByPackageWeight"));

        if (empty($locations)) {
            return 1;
        }
    
        elseif (count($locations) == 1) {
            if(end($locations)["packageWeight"] <= $weightLimit) {
                $trip->addLocationFromArray(array_pop($locations));
            }
            else{
                return 1;
            }
        }
        else {
            do {
        
                $arrayValue = array_pop($locations);
                $arrayValueWeight = $arrayValue["packageWeight"];
                $trip->addLocationFromArray($arrayValue);
        
                $i += $arrayValueWeight;
        
            } while ((($i + end($locations)["packageWeight"]) <= $weightLimit) && !empty($locations));
        }
        $this->addTrip($trip);
        $this->createTrips($locations, $weightLimit);
    }
}


