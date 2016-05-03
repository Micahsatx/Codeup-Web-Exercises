<?php

class Input
{
    // function returns true or false if the value exists in $_POST or $_GET
    // function checks if the key is set
    public static function has($key)
    {
        // isset always returns true or false
        return isset($_REQUEST[$key]);
    }

    // function gets the $key and returns the mixed value
    // if function has returns false then it assigns the value to null
    public static function get($key, $default = null)
    {
        // it cant me input::has(key) because it is calling a function inside
        // of the class it is also within.  must use self::has(key) because
        // it is calling a function within its own class.  within itSELF
        return self::has($key) ? $_REQUEST[$key] : $default;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
