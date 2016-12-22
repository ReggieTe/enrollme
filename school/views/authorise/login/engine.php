<?php

/* pages */
define("LOGIN_SUCCESS_PAGE", "views/redirect/index.php");
define("LOGIN_PAGE", "views/home/index.php");

$err_response = array(
    "Invalid details. Please try again!",
    "Verify Account.<br><small>Check your email to verify</small>");
//setting the environment 
$table = TABLE;
$page = LOGIN_PAGE;
//Cleaning user input
$user_values = array(trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)), trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING)));



if (empty($user_values[0]) || empty($user_values[1])) {
    $show = $err_response[0];
    include $page;
    include 'views/footer.php';
    exit();
}


if (isset($user_values[0]) && isset($user_values[1])) {

    $user->setEmail($user_values[0]);


    if (textFormatter::checkStatus($user->getState())) 
        {
        $_password = Hash::create('sha256', $user_values[1], $user->getSalt());

        $user->setPassword($_password);

        if ($user->login()) {
            
            FileHandler::createFolders($user->getId());
            //echo $user->getId();
            
            include_once LOGIN_SUCCESS_PAGE;
            include 'views/footer.php';
            exit();
        } else {

            $show = $err_response[0];
            include $page;
            include 'views/footer.php';
            exit();
        }
    } else {

        $verify_link = URL . USERTYPE . "complete/" . Hash::create('sha256', $user_values[0], $user->getSalt());

        Email::sendMail("Account Verification Link", Email::verifyAccount($verify_link), $user_values[0]);

        echo SITE_MODE == 'debug' ? $verify_link : '';

        $show = $err_response[1];
        include $page;
        include 'views/footer.php';
        exit();
    }
} else {

    $show = $err_response[0];
    include $page;
    include 'views/footer.php';
    exit();
}
 
                  