<?php

declare(strict_types=1);
class User extends BaseModel
{
    const TABLE_NAME = 'users';

    public function __construct()
    {
    }

    public function getAll(string $table, array $select, array $orderBy, int $limit = null)
    {
        return $this->all(self::TABLE_NAME, $select, $orderBy, $limit);
    }

    public function get(array $fields){
        return $this->select(self::TABLE_NAME, $fields);
    }
    public function getById(int $id)
    {
        return $this->find(self::TABLE_NAME, $id);
    }
}
