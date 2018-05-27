<?php

namespace App\Calendar;

use App\Core\App;
use Carbon\Carbon;
use App\Calendar\Calendar;

class View
{
    public static function render($calendarSlug)
    {
        $filePath = App::get('views-path') . 'calendar.php';
        
        if(file_exists($filePath)){
            $calendar = Calendar::select($calendarSlug);

            $currentDate = Carbon::now();

            $carbon = new Carbon;

            require($filePath);
        }
        else {
            echo 'There is no view "calendar".';
        }
    }
}