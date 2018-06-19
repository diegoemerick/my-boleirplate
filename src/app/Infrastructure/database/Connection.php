<?php

namespace App\Infrastructure\Database;

class Connection
{
    public $db;

    public function __construct()
    {
        $path = 'sqlite:/core/database/cpfdatabase.sqlite';
        $this->db = new \PDO($path) or die("cannot connect in database");
    }


}