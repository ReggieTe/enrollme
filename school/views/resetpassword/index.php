<?php

define("HOMEPAGE", "views/home/index.php");
define("DEFAULTPAGE", "views/reset/index.php");
define("SETTINGNEWPASSWORD", "views/setpassword/index.php");
define("CHAIN1", "0");
define("CHAIN2", "1");

$response_message = array(
    "Enter your new password below"
    , "Invalid link.Please contact us");

@$chain = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);

switch ($chain) {
    case CHAIN1:

        $link = filter_var($_GET['method'], FILTER_SANITIZE_STRING);

        if (Account::decryptLink($link, $client)) {
            $show = $response_message[0];
            require_once SETTINGNEWPASSWORD;
        } else {
            $show = $response_message[1];
            require DEFAULTPAGE;
            exit();
        }

        break;
    case CHAIN2:

        @$psswrd = (filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING));
        @$psswrd1 = (filter_var($_POST['newpassword1'], FILTER_SANITIZE_STRING));

        $page = SETTINGNEWPASSWORD;
        $success_page = HOMEPAGE;
        $passwords = array($psswrd, $psswrd1);
        $err_response = array(
            "Password fields canno't be empty",
            "Password do not match.Please try again",
            "Password is too short must be at least 8 characters.Please try again",
            "Password not updated .Please try again",
            "Password Updated.Login now"
        );

        if (empty($passwords[1]) || empty($passwords[0])) {
            $show = $err_response[0];
            include $page;
            include 'views/footer.php';
            exit();
        }
        if (isset($passwords[1]) && isset($passwords[0])) {
            if (!Validation::length($passwords[0])) {

                $show = $err_response[2];
                include $page;
                include 'views/footer.php';
                exit();
            }
            if (!Validation::match($passwords[1], $passwords[0]) != 0) {

                $show = $err_response[1];

                include $page;
                include 'views/footer.php';
                exit();
            }


            if ($user->updatePassword(Session::get('id'),$passwords[0])) {
                               
                Email::sendMail("Password Changed", Email::passwordChange(), Session::get('email'));
                
                Session::destroy();
                $show = $err_response[4];
                include $success_page;
                include 'views/footer.php';
                exit();
            } else {

                $show = $err_response[3];
                include $page;
                include 'views/footer.php';
                exit();
            }
        }



        break;
    default:
        $show = "Invalid link.Please try again---";
        require HOMEPAGE;
        include 'views/footer.php';
        break;
}

  







                            