<?php

class Validation {

    function __construct() {
        
    }

    /**
     * 
     * @param string $name
     * @return boolean
     */
    public static function name($name) {
        return ereg("^[A-Za-z0-9._]{3,50}$", $name) ? true : false;
    }

    /**
     * 
     * @param string $phone
     * @return boolean
     */
    public static function phone($phone) {
        return ereg("^[0-9+]{10,14}$", $phone) ? true : false;
    }

    /**
     * 
     * @param string $email
     * @return boolean
     */
    public static function email($email) {
        return ereg("^[A-Za-z0-9.@_-]{5,50}$", $email) ? true : false;
    }

    /**
     * 
     * @param string $password
     * @return boolean
     */
    public static function password($password) {
        return ereg("^[A-Za-z0-9!@#$%^&*()_]{8,20}$", $password) ? true : false;
    }

    /**
     * 
     * @param string $word
     * @return boolean
     */
    public static function captcha($word) {
        return ereg("^[A-Za-z0-9]{6,7}$", $word) ? true : false;
    }
    public static function length($word,$min=8)
    {
        return $word>$min?TRUE:FALSE;
    }
   public static function match($word,$word1)
   {
       return strcasecmp($word, $word1)==0?TRUE:FALSE;
   }

    public static function url($url) {
        return ereg("^[A-Za-z0-9.//:=&?]{6,100}$", $url) ? true : false;
    }
    public static function date($date) {
        return ereg("^[0-9.//]{4,100}$", $date) ? true : false;
    }

    public static function category($word) {
        return ereg("^[A-Za-z0-9]{3,20}$", $word) ? true : false;
    }

    public static function price($word) {
        return ereg("^[0-9.]{1,6}$", $word) ? true : false;
    }
    public static function Id($id) {
    return ereg("^[A-Za-z0-9-]{5,15}$", $id) ? TRUE : FALSE;
}
    public static function int($id) {
    return ereg("^[0-9]{1,2}$", $id) ? TRUE : FALSE;
}
public function description($description) {
    return true;
    
}
}
