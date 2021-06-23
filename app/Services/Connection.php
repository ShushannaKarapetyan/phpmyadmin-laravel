<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

class Connection
{
    /**
     * @param $connection
     * @param $host
     * @param $username
     * @param $password
     * @param $database
     */
    public static function connect($connection, $host, $username, $password, $database)
    {
        Config::set("database.connections.$connection", [
            "driver" => 'mysql',
            "host" => $host,
            "database" => $database,
            "username" => $username,
            "password" => $password,
        ]);
    }
}

