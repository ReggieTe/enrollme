<?php
/**
 * config site
 */
include '../settings.php';
 define("LIBS", "libs/");
 define("RELATIVEFILEPATH", "../".MAINFOLDER."/".USERTYPE);
 
/**
 * load libraries
 */
//include 'support/function/engine.php';

function __autoload($class) {
	require LIBS . $class .".php";
}
