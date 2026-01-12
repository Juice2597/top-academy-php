<?php

namespace App\Model;

class Category extends Model
{
    public int $id;
    public string $title;
    public string $content;

    public function getTableName(): string
    {
        return 'categories';
    }
}