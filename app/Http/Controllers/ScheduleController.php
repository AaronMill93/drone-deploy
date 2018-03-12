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
        $drone = new Drone("Aarons drone", 124);
        $schedule = new Schedule($drone);

        //loop through trip details
        $etd = array();
        $input = Input::all();
        print_r($input);
        //return $request->all();
    }
}
