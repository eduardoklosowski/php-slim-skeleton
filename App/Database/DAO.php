<?php

namespace App\Database;

abstract class DAO
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connection::connect();
    }
}
