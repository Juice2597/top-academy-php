<?php

namespace App\Model;

use App\Core\Db;
use App\Core\Logger;
use App\Interfaces\IModel;

abstract class Model implements IModel
{
    private Db $db;


    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    abstract public function getTableName(): string;


    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = $id";
        Logger::log($sql);
        return $this->db->query($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->query($sql);
    }

}