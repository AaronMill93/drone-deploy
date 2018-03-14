<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Drone;
use App\Location;
use App\Schedule;
use App\Trip;

class ScheduleController extends Controller
{
    public function index() {
        
        return view('schedule');
    }

    public function summary(Request $request) {

        $droneDetails = Input::only('drone-name', 'drone-capacity');

        //Initialize schedule and drone objects
        $drone = new Drone($droneDetails['drone-name'], $droneDetails['drone-capacity']);
        $schedule = new Schedule($drone);

        $tripDetails = Input::except('drone-name', 'drone-capacity');

        //sort trip details
        $sortedTD = array();
        $simpleTD = array_values($tripDetails);
        for ($i = 1; $i < count($simpleTD); $i += 2) {
            array_push($sortedTD, array($simpleTD[$i], $simpleTD[$i+1]));
        }

        //Loop through trip details, create location objects, add locations to schedule
        foreach($sortedTD as $key => $value) {
            $schedule->addLocation(new Location($value[0], $value[1]));
        }

        //Create optimal trips
        $locations = $schedule->locations;
        $weightLimit = $drone->maxWeight;
        $schedule->createTrips($locations, $weightLimit);
        
        //Output to template
        return view('schedule', ['trips' => $schedule->trips]);
    }
}
