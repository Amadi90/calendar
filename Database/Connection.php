<?php

namespace App\Database;

class Connection
{

    public static function make()
    {
        try {
            return new \PDO('mysql:host=localhost;dbname=calendar', 'root', '');
        } catch (\PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
