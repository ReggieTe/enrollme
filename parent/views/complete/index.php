<?php

define("HOME_PAGE", "views/home/index.php");

$response_message = array(
    "Account verified.Sign In now",
    "Error:Setting up account.Please contact us .",
    "Invalid link.Please contact us");

$client_value = @filter_var($_GET['method'], FILTER_SANITIZE_STRING);
//echo $client_value;

if (Account::decryptLink($client_value,$client)) {
    $user->setEmail(Session::get('email'));
    if ($user->activateAccount()) {
        
        
        
        $show = $response_message[0];
        Session::destroy();
        require_once HOME_PAGE;
        include 'views/footer.php';
        exit();
    } else {
        $show = $response_message[1];
        require_once HOME_PAGE;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $response_message[2];
    require HOME_PAGE;
    include 'views/footer.php';
    exit();
}
  





                            