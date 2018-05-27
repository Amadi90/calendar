<?php

namespace App\Calendar;

interface CalendarInterface {

    public function addEvent($name, $description, $date = false);
    public function removeEvent($id);
    public function render();

}