<?php

namespace App\Model;

class Post extends Model
{
    public int $id;
    public string $title;
    public string $content;

    public int $comment_id;


    public function getTableName(): string
    {
        return 'posts';
    }
}
