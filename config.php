<?php


//website url 
 /**
 * Include the trailing slash on thr doamin  /
 */
 define('URL', "http://localhost/enrollment/");
 
 define('SITE_NAME', 'UltraDesigns');
 
 define('SITE_NUMBER', '+27 061 54 9027');
 
 define('SITE_EMAIL', 'hello@ultradesigns.co.za');
 
 define('SITE_EMAIL_BUG_REPORT', 'bugs@ultradesigns.co.za');
 
 define('SITE_LOCATION', 'Cape Town ,South Africa');
 
 define('SITE_COUNTRY', 'South Africa');
 //mode
 define('SITE_MODE', 'debug',true);
 //array(debug,production);
 
 define('RESOURCE_PATH', 'application/');
 
 define('USER_PATH_FREELANCER', 'developers');
//Database Host
define('DB_HOST','localhost');
//Database Name
define('DB_NAME','myapps_myapps');
//Database User
define('DB_USER','root');
//Database Password
define('DB_PASS', '');

//social Site

define('SITE_FACEBOOK','');

define('SITE_TWITTER', '');

define('SITE_GOOGLE_PLUS', '');

define('SITE_LINKEDIN', '');
 
/**
 * load libraries
 */
/**
 * include the libraries
 */
 define("LIBS", "libs/");
 
function __autoload($class) {
	require LIBS . $class .".php";
}

