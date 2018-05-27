<?php

namespace App\Calendar;

use Carbon\Carbon;
use App\Core\App;

class Calendar {

    protected $id;
    protected $title;
    protected $slug;
    protected $events;

    public function __construct($title, $save = true)
    {
        $this->title = $title;
        $this->slug = $title;

        /*
         *  save is true while creating new instance of calendar
         *  false is while fetching calendar from database
         */

        if($save)
        {
            $this->id = App::get('database')->insert('calendars', array(
                'title' => $this->title,
                'slug' => $this->title
            ));

            $this->events = array();
        }
        else
        {
            $this->events = App::get('database')->selectCalendarEvents($this->id);

            // convert string date from db to Carbon object
            array_map(function($event){ $event->toCarbonDate(); }, $this->events);
        }

        return $this;
    }

    public function id()
    {
        return $this->id;
    }

    public function addEvent($title, $description, $date = false)
    {
        $event = new Event($this->id, $title, $description, $date);
        $this->events[] = $event;

        return $event;
    }


    public function renderEvents($date = false)
    {
        $events = $this->events($date);

        foreach($events as $event)
        {
            echo '<pre>';
            var_dump($event);
            echo '</pre>';
        }
    }
    
    
    public function events($date = false)
    {
        if($date)
        {
            return array_filter($this->events, function($event) use ($date)  {
                return $event->date() == Carbon::parse($date);
            });
        }

        return $this->events;
    }

    public static function all()
    {
        return App::get('database')->select('calendars');
    }

    public static function select($slug)
    {
        return App::get('database')->selectCalendar($slug);
    }

}