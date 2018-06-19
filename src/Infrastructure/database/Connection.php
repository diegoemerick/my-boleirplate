<?php

namespace Gcpf\Infrastructure\Database;

class Connection
{
    public $db;

    public function __construct()
    {
        $path = 'sqlite:/Core/database/cpfdatabase.sqlite';
        $this->db = new \PDO($path) or die("cannot connect in database");
    }


}