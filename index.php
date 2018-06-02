<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Helpers/helpers.php';

use App\Core\App;
use App\Core\Config;
use Carbon\Carbon;
use App\Calendar\View;
use App\Controllers\Ajax;
use App\Calendar\Calendar;
use App\Database\Connection;
use App\Database\QueryBuilder;

Config::bind('DB_HOST', 'localhost');
Config::bind('DB_NAME', 'calendar');
Config::bind('DB_USER', 'root');
Config::bind('DB_PASSWORD', '');

App::bind('database', new QueryBuilder(Connection::make()));
App::bind('views-path', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

// App::get('database')->dropTable('calendars');
// App::get('database')->dropTable('events');

App::get('database')->createCalendarsTable();
App::get('database')->createEventsTable();

if(isAjaxRequest()){
    new Ajax($_REQUEST);
    die();
}

// $calendar = new Calendar('calendar-1');
// $calendar = Calendar::select('calendar-1');

// $calendar->addEvent('Event 1', 'Description 1');
// $calendar->addEvent('Event 2', 'Description 2', '1992-03-05');
// $calendar->addEvent('Event 3', 'Description 3', Carbon::now()->addDay(2));
// $calendar->addEvent('Event 4', 'Description 4', '1992-03-05');
// $calendar->addEvent('Event 5', 'Description 5', '1992-03-06');
// $calendar->addEvent('Event 6', 'Description 6', '1992-03-08');

// echo 'DB Requests Count: '. App::get('database')->selectRequestsCount();
if(isset($_REQUEST['show_calendar'])){
    View::calendar($_REQUEST['show_calendar']);
}
else {
    View::render();
}

// $calendar->events();