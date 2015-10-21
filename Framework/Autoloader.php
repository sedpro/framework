<?php

namespace Framework;

class Autoloader
{
    /**
     * Register PSR-0 autoloader
     */
    public static function register()
    {
        spl_autoload_register(__NAMESPACE__ . "\\Autoloader::autoload");
    }

    /**
     * PSR-0 autoloader
     */
    public static function autoload($className)
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require dirname(__DIR__) . '/' . $fileName;
    }
}