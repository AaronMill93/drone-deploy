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
        //Handle drone detail user input
        $droneDetails = Input::only('drone-name', 'drone-capacity');

        //Initialize schedule
        $drone = new Drone($droneDetails['drone-name'], $droneDetails['drone-capacity']);
        $schedule = new Schedule($drone);

        //Handle trip detail user input
        $tripDetails = Input::except('drone-name', 'drone-capacity');
        
        //sort trip details
        $sortedTD = array();
        $simpleTD = array_values($tripDetails);
        for ($i = 1; $i < (count($simpleTD) - 1); $i += 2) {
            array_push($sortedTD, array('name' => $simpleTD[$i], 'packageWeight' => $simpleTD[$i+1]));
        }

        //Add locations to schedule
        $schedule->locations = $sortedTD;

        //Create optimal trips
        $locations = $schedule->locations;
        $weightLimit = $drone->maxWeight;
        $schedule->createTrips($locations, $weightLimit);
        
        //Output to template
        return view('schedule', ['drone' => $drone, 'trips' => $schedule->trips]);
    }
}
