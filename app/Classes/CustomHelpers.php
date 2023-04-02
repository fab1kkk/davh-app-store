<?php

namespace App\Classes;

class CustomHelpers
{
    private static $appName = 'Shoppy';

    public static function getAppName()
    {
        return self::$appName;
    }
}
