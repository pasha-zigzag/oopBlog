<?php

namespace Services;

use Exceptions\DbException;

class Db {

    private static $instance;
    private $pdo;

    private function __construct() {
        $db = require __DIR__ . '/../../config/config_db.php';

        try {
            $this->pdo = new \PDO(
                $db['dns'],
                $db['user'],
                $db['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        } catch (\PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
        
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public static function getInstance(): self {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastInsertId(): int {
        return (int) $this->pdo->lastInsertId();
    }
}