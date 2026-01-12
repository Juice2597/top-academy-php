<?php

namespace App\Model;

use App\Core\Db;

class Comment extends Model
{
    private int $id;
    private string $text;

    private string $user_id;

    public function __construct(Db $db,  int $id, string $text, string $user_id)
    {
        parent::__construct($db);
        $this->id = $id;
        $this->text = $text;
        $this->user_id = $user_id;
    }

    public function getTableName(): string
    {
        return 'comments';
    }
}