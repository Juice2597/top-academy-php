<?php

namespace App\Core;

class Logger
{
    public static function write(string $message): void
    {
        echo $message;
    }
}