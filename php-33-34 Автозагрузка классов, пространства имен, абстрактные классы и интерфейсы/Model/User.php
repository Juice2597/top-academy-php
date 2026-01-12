<?php

namespace App\Model;


class User extends Post
{
    public int $id;
    public string $name;

    public function getTableName(): string
    {
        return 'users';
    }

}