<?php

namespace App\Classes;

class CustomHelpers
{
    private static $appName = 'DAVHON Meble';

    public static function getAppName()
    {
        return self::$appName;
    }
}
