<?php

class Session {

    public static function init() {
        @session_start();
    }
/**
 * 
 * @param string $key
 * @param string $value
 */
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
/**
 * 
 * @param string $key
 * @return string
 */
    public static function get($key) {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }
/**
 * 
 */
    public static function destroy() {
        //unset($_SESSION);
        session_destroy();
    }

}
