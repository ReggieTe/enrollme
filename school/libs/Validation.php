<?php

class Validation {

    function __construct() {
        
    }
/**
 * 
 * @param string $name
 * @return boolean
 */
    public static function name($name=null) {
        return ereg("^[A-Za-z0-9]{3,50}$", $name) ? true : false;
    }
/**
 * 
 * @param string $phone
 * @return boolean
 */
    public static function phone($phone=null) {
        return ereg("^[0-9]{10,14}$", $phone) ? true : false;
    }
/**
 * 
 * @param string $email
 * @return boolean
 */
    public static function email($email=null) {
        return ereg("^[A-Za-z0-9.@_-]{5,50}$", $email) ? true : false;
    }
/**
 * 
 * @param string $password
 * @return boolean
 */
    public static function password($password=null) {
        return ereg("^[A-Za-z0-9!@#$%^&*()_]{8,20}$", $password) ? true : false;
    }
/**
 * 
 * @param string $word
 * @return boolean
 */
    public static function captcha($word=null) {
        return ereg("^[A-Za-z0-9]{6,7}$", $word) ? true : false;
    }
    public static function length($word=null,$max=8) {
       
        return strlen($word)>$max ? true : false;
    }
    public static function match($word=null,$word1=null,$length=8)
    { 
        return strncasecmp($word, $word1, $length)==0?true:false;
        
    }

}
