<?php

namespace App\Model;

class Category extends Model
{
    public int $id;
    public string $name;


    public static function getTableName(): string
    {
        return 'categories';
    }
}