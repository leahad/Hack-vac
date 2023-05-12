<?php

namespace App\Model;

use PDO;

class ChecklistManager extends AbstractManager
{
    public const TABLE = 'checklist';

    public function getChecklistByType(string $type)
    {
        $query = "SELECT * FROM " . self::TABLE . " AS c 
        JOIN destination_type AS dt ON dt.id = c.destination_type_id 
        WHERE dt.value = " . "'" . $type . "'" . ";";

        return $this->pdo->query($query)->fetchAll();
    }
}
