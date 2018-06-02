<?php

namespace App\Database;

use App\Calendar\Calendar;
use App\Calendar\Event;

class QueryBuilder
{
    protected $pdo;
    protected $selectRequestsCount;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->selectRequestsCount = 0;
    }

    public function select($table, $columns = '*')
    {
        $columns = is_array($columns) ? implode(',', $columns) : $columns;

        $sql = sprintf('SELECT %s FROM %s', $columns, $table);

        $statement = $this->prepareAndExecuteSql($sql);

        $this->selectRequestsCount++;

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectCalendar($slug)
    {
        $sql = sprintf('SELECT * FROM calendars WHERE slug = "%s"', $slug);

        $statement = $this->prepareAndExecuteSql($sql);

        $this->selectRequestsCount++;

        return $statement->fetchObject(Calendar::class, array($slug, false));
    }

    public function selectCalendarEvents($calendarId)
    {
        $sql = sprintf('SELECT * FROM events WHERE calendar_id = "%s"', $calendarId);

        $statement = $this->prepareAndExecuteSql($sql);

        $this->selectRequestsCount++;

        return $statement->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Event::class, array(null, null, null, null));
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $this->prepareAndExecuteSql($sql, $parameters);

        return $this->pdo->lastInsertId();
    }

    public function createCalendarsTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS calendars (
            id INT NOT NULL auto_increment,
            title VARCHAR(255),
            slug VARCHAR(255),
            PRIMARY KEY (id)
        );';

        $this->prepareAndExecuteSql($sql);
    }

    public function createEventsTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS events (
            id INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            date DATE NOT NULL,
            calendar_id INT(10) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (calendar_id) REFERENCES calendars(id)
        );';

        $this->prepareAndExecuteSql($sql);
    }

    public function dropTable($table)
    {
        $sql = "DROP TABLE {$table};";

        $this->prepareAndExecuteSql($sql);
    }

    public function selectRequestsCount()
    {
        return $this->selectRequestsCount;
    }

    protected function prepareAndExecuteSql($sql, $parameters = array())
    {
        try {
            $statement = $this->pdo->prepare($sql);
            
            $statement->execute($parameters);

            return $statement;
        }
        catch (Exception $e)
        {
            die('Error! ' . $e->getMessage());
        }
    }
}