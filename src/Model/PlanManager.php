<?php

namespace App\Model;

use PDO;

class PlanManager extends AbstractManager
{
    public const TABLE = 'destination_location';

    /**
     * Insert new item in database
     */
    public function insert(array $plan): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $plan['title'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $plan): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $plan['id'], PDO::PARAM_INT);
        $statement->bindValue('title', $plan['title'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
