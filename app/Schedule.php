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
     * Finds optimal number of trips, creates trips, adds them to schedule 
     */
    public function createTrips($locations, $weightLimit)
    {
        //find optimal number of trips
        $totalLocationWeights = 0;
        foreach($locations as $location){
            $totalLocationWeights += $location['packageWeight'];
        }
        $optimalTrips = ceil($totalLocationWeights / $weightLimit);

        //sort locations from largest to smallest package weight
        usort($locations, array($this,"compareLocationsByPackageWeight"));
        
        //create trips
        for($i = 0; $i < $optimalTrips; $i++){
            $trip = new Trip();
            $tripWeight = 0;
            foreach($locations as $key => $location){
                $tripWeight += $location['packageWeight'];
                if($tripWeight <= $weightLimit) {
                    $trip->addLocationFromArray($location);
                    unset($locations[$key]);
                }
                else{
                    //subtract from trip weight since it wasn't added
                    $tripWeight -= $location['packageWeight'];
                }
            }
            //add trip to schedule
            $this->addTrip($trip);
        }
    }
}


