<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\App;
use Carbon\Carbon;
use App\Calendar\View;
use App\Calendar\Calendar;
use App\Database\Connection;
use App\Database\QueryBuilder;

App::bind('database', new QueryBuilder(Connection::make()));
App::bind('views-path', __DIR__ . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

// App::get('database')->dropTable('calendars');
// App::get('database')->dropTable('events');

App::get('database')->createCalendarTable();
App::get('database')->createEventsTable();

// $calendar = new Calendar('calendar-1');
$calendar = Calendar::select('calendar-1');

$calendar->addEvent('Event 1', 'Description 1');
$calendar->addEvent('Event 2', 'Description 2', '1992-03-05');
$calendar->addEvent('Event 3', 'Description 3', Carbon::now()->addDay(2));
$calendar->addEvent('Event 4', 'Description 4', '1992-03-05');
$calendar->addEvent('Event 5', 'Description 5', '1992-03-06');
$calendar->addEvent('Event 6', 'Description 6', '1992-03-08');

// echo 'DB Requests Count: '. App::get('database')->selectRequestsCount();

View::render('calendar-1');


// $calendar->events();