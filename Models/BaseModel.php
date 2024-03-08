<?php

declare(strict_types=1);

class BaseModel extends Database
{
    public function all(string $table, $select = ['*'], $orderBy = [], $limit = null)
    {
        try {
            $sql = "select " . implode(',', $select) . " from " . $table;
            if (!empty($orderBy)) {
                $sql .= " order by " . implode(' ', $orderBy);
            }
            if ($limit) {
                $sql .= " limit " . $limit;
            }
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            $stmt->closeCursor();

            return $results;
        } catch (PDOException $e) {
            logger($e->getMessage());
            return [];
        }
    }

    public function select(string $table, array $fields)
    {
        try {
            $sql = "select " . implode(',', $fields) . " from " . $table;
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();
            $stmt->closeCursor();

            return $results;
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function find(string $table, int $id){
        try {
            $sql = "select * from " . $table . " where id = " . $id;
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            $stmt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function insert(string $table, array $fields)
    {
        try {
            $sql = "insert into " . $table . " (" . implode(',', array_keys($fields)) . ") values ('" . implode("', '", $fields) . "')";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function delete(string $table, int $id)
    {
        try {
            $sql = "delete from " . $table . " where id = " . $id;
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function update(string $table, int $id, array $fields)
    {
        try {
            $sql = "update " . $table . " set " . implode(',', $fields) . " where id = " . $id;
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function query(string $sql)
    {
        try {
            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            logger($e->getMessage());
        }
    }

    public function lastInsertId()
    {
        return $this->getConn()->lastInsertId();
    }
}
