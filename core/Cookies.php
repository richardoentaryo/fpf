<?php
/**
 *
 */
class Cookies
{
    public function __construct() {}

    public static function set($cookieName, $cookieValue, $cookieTime = 0)
    {
        if($cookieTime == 0)
        {
            // by default the cookie will be set for 1 day expiration time
            setcookie($cookieName, $cookieValue, time() + Config::get("EXPIRY_1DAY"), Config::get("COOKIE_PATH"));
        }
        else
        {
            // if the time param exist then set the desired cookie expiration time
            setcookie($cookieName, $cookieValue, time() + $cookieTime, Config::get("COOKIE_PATH"));
        }

    }

    public static function get($cookieName)
    {
        if(isset($_COOKIE[$cookieName]))
        {
            return $_COOKIE[$cookieName];
        }
        else
        {
            return null;
        }
    }

    public static function update($cookieName, $cookieValue)
    {
        if(isset($_COOKIE[$cookieName]))
        {
            // if the cookie exists, do update
            setcookie($cookieName, $cookieValue);
        }
        else
        {
            // if the cookie can't be found, create new cookie
            setcookie($cookieName, $cookieValue, time() + Config::get("EXPIRY_1DAY"), Config::get("COOKIE_PATH"));
        }
    }

    public static function destroy($cookieName)
    {
        if(isset($_COOKIE[$cookieName]))
        {
            // if the cookie exists, delete the cookie
            unset($_COOKIE[$cookieName]);
        }
    }
}

?>
