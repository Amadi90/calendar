<?php

namespace App\Calendar;

use App\Core\App;
use Carbon\Carbon;
use App\Calendar\Calendar;

class View
{
    public static function render($view = 'main', $calendarSlug = false)
    {
        $filePath = App::get('views-path') . $view .'.php';
        
        if(file_exists($filePath)){

            if($calendarSlug){
                $calendar = Calendar::select($calendarSlug);

                if ($calendar) {
                    $currentDate = Carbon::now();

                    $carbon = new Carbon;

                } else {
                    echo 'There is no calendar "' . $calendarSlug . '"';
                    return false;
                }
            }

            require($filePath);
        }
        else {
            echo 'There is no view "'. $view .'".';
        }
    }

    public function calendar($calendarSlug){
        self::render('calendar', $calendarSlug);
    }

    public static function modal($view)
    {
        $filePath = App::get('views-path') . 'modal' . DIRECTORY_SEPARATOR . $view .'.php';

        if (file_exists($filePath)) {

            require($filePath);
        } else {
            echo 'There is no modal "'. $view .'".php.';
        }
    }


}