<?php

namespace KCS\Service;

use PDO;

class DB
{
    protected $conn;

    public function __construct()
    {
        $username = Configs::DB_USER;
        $password = Configs::DB_PASS;
        $servername = Configs::DB_HOST;
        $database = Configs::DB_NAME;

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->conn = $conn;
    }

    public function getConnection() :PDO {
        return $this->conn;
    }
}
