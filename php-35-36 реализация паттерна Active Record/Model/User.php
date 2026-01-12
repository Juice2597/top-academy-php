<?php

namespace App\Model;


class User extends Model
{
    public int $id;
    public string $name;

    public static function getTableName(): string
    {
        return 'users';
    }

}