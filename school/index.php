<?php
include 'config.php';
/**
 * Intialize website ,check auth to debug
 */
$app=new Bootstrap();
$app->init();//production mode
//
//$app->init("maintenence", "maintenence");//maintenence mode



