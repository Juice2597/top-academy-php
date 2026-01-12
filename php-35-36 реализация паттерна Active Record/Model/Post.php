<?php

namespace App\Model;

class Post extends Model
{
    public int $id;
    public string $title;
    public string $content;
    public int $category_id;
    public int $user_id;

    public function __construct(int $id = null, string $title = null, string $content = null, int $category_id = null, int $user_id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->category_id = $category_id;
        $this->user_id = $user_id;
    }


    public static function getTableName(): string
    {
        return 'posts';
    }


}
