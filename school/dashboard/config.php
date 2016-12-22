<?php
/**
 * config site
 */
include '../settings.php';
 define("LIBS", "libs/");
 define("RELATIVEFILEPATH", "../".MAINFOLDER."/".USERTYPE);
 // define("MAINFOLDER","../application");
/**
 * load libraries
 */
function __autoload($class) {
	require LIBS . $class .".php";
}

