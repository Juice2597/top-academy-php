<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Post
    //extends Model
{
    public static function All(): array
    {
        return [
            '1' => [
                'id' => '1',
                'title' => 'News',
                'content' => 'News',
            ],
            '2' => [
                'id' => '2',
                'title' => 'title News2',
                'content' => 'content News2',
            ],
        ];
    }

    public static function getOne(int $id): array
    {
        $posts = static::all();
        return $posts[$id];
    }
}
