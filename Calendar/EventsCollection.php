<?php

namespace App\Calendar;

class EventsCollection {

    protected $events;

    public function __construct(Calendar $calendar)
    {
        
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function getEvent($id)
    {
        return $this->events[$id];
    }

    public function addEvent(Event $event)
    {
        $this->events[] = $event;
    }

}