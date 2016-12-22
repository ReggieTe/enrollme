<?php

/**
 * config site
 */
include '../../../settings.php';
 define("LIBS", "../../libs/");
 define("RELATIVEFILEPATH", "../..".MAINFOLDER."/".USERTYPE);
 
 /**
 * load libraries
 */
function __autoload($class) {
	require LIBS . $class .".php";
}
Session::init();
$client = new Database();
$userCommunity = new UserCommunity($client);
$user=  new User($client);

$date = date('d-m-y');