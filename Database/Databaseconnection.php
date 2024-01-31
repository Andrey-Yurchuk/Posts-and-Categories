<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use Exception;
use PDOException;

/**
 * @todo вынести в констаты подключение к БД
 */
class Databaseconnection implements Database
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize");
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null)
            self::$instance = self::createConnection();

        return self::$instance;
    }

    public static function createConnection(): ?PDO
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=posts_bd',
                'admin', 'StrongPassword123!');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo "Error connect to the DB: " . $e->getMessage();
            return null;
        }
    }
}