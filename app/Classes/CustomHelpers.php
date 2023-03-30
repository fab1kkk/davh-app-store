<?php

namespace App\Classes;

class CustomHelpers
{
    public static $appName = 'Online Store project';

    public static function getAppName()
    {
        return self::$appName;
    }
}
