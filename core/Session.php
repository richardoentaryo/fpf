<?php

class Session{

    private function __construct() {}

    public static function init(){

        // make new instance of session
        $session_id = session_id();
        // if the session is not yet set then start the session
        if (empty($session_id)) {
            session_start();
        }
    }

    public static function getCsrfToken(){
        return empty($_SESSION["csrf_token"]) ? null : $_SESSION["csrf_token"];
    }

    public static function getCsrfTokenTime(){
        return empty($_SESSION["csrf_token_time"]) ? null : $_SESSION["csrf_token_time"];
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return array_key_exists($key, $_SESSION)? $_SESSION[$key]: null;
    }

    public static function getAndDestroy($key){

        if(array_key_exists($key, $_SESSION)){

            $value = $_SESSION[$key];
            $_SESSION[$key] = null;
            unset($_SESSION[$key]);

            return $value;
        }

        return null;
    }

    public static function generateCsrfToken(){

        $max_time = 60 * 60 * 24; // 1 day
        $stored_time = self::getCsrfTokenTime();
        $csrf_token  = self::getCsrfToken();

        if($max_time + $stored_time <= time() || empty($csrf_token)){
            $token = md5(uniqid(rand(), true));
            $_SESSION["csrf_token"] = $token;
            $_SESSION["csrf_token_time"] = time();
        }

        return self::getCsrfToken();
    }

    public static function remove($keep = false){

        // update session in database
        $userId = self::getUserId();
        if(!empty($userId)){
            self::updateSessionId(self::getUserId());
        }

        if($keep){

            // regenerate it's id in browser, and file
            // also clear any data stored in session
            session_regenerate_id(true);
            $_SESSION = array();

        } else {

            // clear session data
            $_SESSION = array();

            // remove session cookie
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // destroy session file on server
            session_destroy();
        }
    }

}
