<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventHandlerController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

    }

    public function view($view,$params = array()){
        $events = [];
        $blue = "#00F";
        $red = "#F00";
        $activities = Activity::where('is_accept', 1)->get();
        foreach ($activities as $activity) {
            $eventDate = new \DateTime($activity->date);
            $midnight = $eventDate;
            $midnight->setTime(23,59,59);
            $event = Calendar::event(
                $activity->name, //event title
                false, //full day event
                $eventDate, //start time (you can also use Carbon instead of DateTime)
                $midnight //end time (you can also use Carbon instead of DateTime)
            );
            if(Auth::user()->with('subscribes')->first()->subscribes->where('activity_id',$activity->id)->first() == null){
                $color = $blue;
            }
            else{
                $color = $red;
            }

            $calendar = Calendar::addEvent($event, ['color' => $color]); //add an array with addEvents
        }


        //$calendar = Calendar::addEvents($events) //add an array with addEvents
        $calendar->setOptions([ //set fullcalendar options
            'firstDay' => 1
        ]);
        $params += compact('calendar');
        return view($view,$params);
    }
}
