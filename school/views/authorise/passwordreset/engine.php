<?php

/* pages */

define("RESET_PAGE", "views/reset/index.php");

$page = RESET_PAGE;
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


$invalid = "Invalid email.Please try again";
$failed = "Failed to send reset link.Please try again";
$successs = "Password reset successful check your email";
$verify = "Verify Account.Check email";

$user->setEmail($email);
$link = null;
if (isset($email) && !empty($email)) {
    if (textFormatter::checkStatus($user->getState())) {
        $resetlink = URL . USERTYPE . "resetpassword/" . Hash::create('sha256', $user->getEmail(), $user->getSalt()) . "/0";

        if (Email::sendMail("Password Reset", Email::resetPassword($resetlink), $user->getEmail())) {
            SITE_MODE == 'debug' ? $link = $resetlink : '';

            $show = $successs . "<br>" . $link;
            include $page;
            include 'views/footer.php';
            exit();
        } else {
            $show = $failed;
            include $page;
            include 'views/footer.php';
            exit();
        }
    } else {
        $show = $verify;
        include $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $invalid;
    include $page;
    include 'views/footer.php';
    exit();
}

     
