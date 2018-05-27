<?php

namespace App\Calendar;

use Carbon\Carbon;
use App\Core\App;

class Event {

    protected $id;
    protected $title;
    protected $slug;
    protected $description;
    protected $date;
    protected $calendar_id;

    public function __construct($calendarId, $title, $description, $date)
    {
        $this->title = $title;
        $this->slug = $title;
        $this->description = $description;
        $this->date = (!$date) ? Carbon::now() : Carbon::parse($date);
        $this->calendar_id = $calendarId;

        $this->saveToDatabase($this->calendar_id, $this->title, $this->description, $this->date);

        return $this;
    }

    public function toCarbonDate()
    {
        return $this->date = Carbon::parse($this->date);
    }

    protected function saveToDatabase($calendarId, $title, $description, $date)
    {
        $this->id = App::get('database')->insert('events', array(
            'title' => $this->title,
            'slug' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'calendar_id' => $this->calendar_id
        ));

        return $this->id;
    }

    public function id()
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function date()
    {
        return $this->date;
    }


}

