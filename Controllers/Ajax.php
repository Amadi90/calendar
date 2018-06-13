<?php

namespace App\Controllers;

use App\Calendar\View;
use App\Core\App;
use App\Calendar\Calendar;

class Ajax {

    protected $request;

    public function __construct($request){

        switch ($request['action']) {
            case 'add_calendar':
                $calendar = new Calendar($request['calendar_name']);
                echo json_encode($calendar);
                break;

            case 'get_calendars':
                $calendars = Calendar::all();
                echo json_encode($calendars);
                break;

            case 'remove_calendar':
                echo 'remove calendar';
                break;

            case 'add_event':
                echo 'add event';
                break;

            case 'remove_event':
                echo 'remove calendar';
                break;

            default:
                echo 'default action';
                break;
        }
    }

}