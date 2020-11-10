<?php

namespace App\Database;

class TaskDAO extends DAO
{
    public function listAll(): array
    {
        $query = $this->pdo->query('SELECT * FROM task');
        return $query->fetchAll();
    }
}
