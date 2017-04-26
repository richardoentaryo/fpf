<?php

/**
 *
 */
class Environment
{
    private function __construct(){}

    public static function get($key)
    {

        $val = null;

        if (isset($_SERVER[$key])) { $val = $_SERVER[$key]; }
        elseif (isset($_ENV[$key])) { $val = $_ENV[$key]; }
        elseif (getenv($key) !== false) { $val = getenv($key); }

        return $val;
    }

}
