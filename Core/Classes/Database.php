<?php

declare(strict_types=1);

use PDO;
use PDOException;

class Database
{
    const DB_HOST = '127.0.0.1'; // localhost
    const DB_NAME = 'db_movie';
    const DB_USER = 'root';
    const DB_PASS = '';

    public function getConn()
    {
        $dsn = "mysql:host=" . self::DB_HOST . "; dbname=" . self::DB_NAME . "; charset=utf8";
        try {
            $conn = new PDO($dsn, self::DB_USER, self::DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            logger('Connection failed: ' . $e->getMessage());
            exit;
        }

        return null;
    }
}
