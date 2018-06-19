<?php

namespace Gcpf\Infrastructure\Database;

use PDO;
use PDOException;

class Connection
{
    public $db;

    private $servername = "localhost";
    private $username = "root";
    private $password = "root";

    public function __construct()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->servername;dbname=gcpf",
                $this->username,
                $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}