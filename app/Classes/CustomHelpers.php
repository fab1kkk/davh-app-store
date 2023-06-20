<?php

namespace App\Classes;

class CustomHelpers
{
    /**
     * The application name.
     * 
     *  @var string
     */
    public static $appName = 'DAVHON Meble - sklep meblowy - davhon.pl';

    /**
     * Set the page title.
     *
     * If no page title is provided, the title will default to the application name.
     * @param string|null $pageTitle The page title.
     * @param string $sep The separator to use between the page title and the application name.
     * @return string The formatted page title. If $pageTitle is set to null, title is set to $appName.
     */
    static function setPageTitle($pageTitle = null, $sep = ' - ')
    {
        if ($pageTitle)
            return $pageTitle . $sep . self::$appName;

        return self::$appName;
    }
}
