<?php

namespace App\Database;

use App\Core\Config;

class Connection
{

    public static function make()
    {
        try {
            return new \PDO('mysql:host='. Config::get('DB_HOST') .';dbname='. Config::get('DB_NAME'), Config::get('DB_USER'), Config::get('DB_PASSWORD'));
        } catch (\PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
