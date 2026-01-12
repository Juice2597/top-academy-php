<?php

namespace App\Core;

use App\Traits\TSingletone;

class Db
{
    private ?array $config = [
        'driver' => 'sqlite',
        'database' => 'database.sqlite'
    ];

    private ?\PDO $pdo = null;

    use TSingletone;

    private function getConnection(): \PDO
    {
        if (is_null($this->pdo)) {
            $this->pdo = new \PDO($this->prepareDsnString());
        }
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $this->pdo;
    }

    public function lastInsertId(): bool|string
    {
        return $this->getConnection()->lastInsertId();
    }

    private function prepareDsnString(): string
    {
        return sprintf("%s:../%s",
            $this->config['driver'],
            $this->config['database']
        );
    }

    //Выполнение запросов через PDO

    private function query($sql, $params): bool|\PDOStatement
    {
        $stmt = $this->getConnection()->prepare($sql); //
        $stmt->execute($params);
        return $stmt;
    }

    public function queryLimitAll($sql, $limt1, $limit2)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(1, $limt1, \PDO::PARAM_INT);
        $stmt->bindValue(2, $limit2, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = []): bool|array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params = []): int
    {
        return $this->query($sql, $params)->rowCount();
    }

}