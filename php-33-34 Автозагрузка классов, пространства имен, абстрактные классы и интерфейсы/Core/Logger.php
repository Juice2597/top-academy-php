<?php

namespace App\Core;

use App\Interfaces\ILogger;

class Logger implements ILogger
{
    public static function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}

