<?php

define("REGISTRATION_SUCCESS_PAGE", "views/success/index.php");
define("REGISTRATION_PAGE", "views/register/index.php");
//setting the environment 

$table = TABLE;
$page = REGISTRATION_PAGE;

//*********************************end*****************************
//Cleaning user input
@$username = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
@$userphone = null; //filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
@$useremail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
@$userpasword = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
@$userpasword1 = trim(filter_var($_POST['password2'], FILTER_SANITIZE_STRING));
@$captcha = filter_var($_POST['captcha'], FILTER_SANITIZE_STRING);
@$captcha1 = $_SESSION['cap_code'];
// $condition=  CleanInput($_POST['condition']);


$user_variables = array($username, $userphone, $useremail, $userpasword, $userpasword1, $captcha, $captcha1);
$err_response = array(
    "Name required.Please try again"
    , "Phone number required.Please try again"
    , "Email required.Please try again"
    , "Pasword required.Please try again"
    , "Confirm your Pasword.Please try again"
    , "Prove that you're human.Please try again."
);
$invalid_response = array(
    "Invalid Name.Please try again"
    , "Invalid Phone number.Please try again"
    , "Invalid Email .Please try again"
    , "Paswords too short.Please try again"
    , "Paswords mismatch.Please try again"
    , "Error:Creating account cancelled.Please try again"
);

$exist_response = array(
    "Name already taken.Please try again"
    , "Phone number  already taken.Please try again"
    , "Email  already taken.Please try again"
);


/* Name Validation */

if (empty($user_variables[0])) {
    $show = $err_response[0];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[0])) {
    if (!Validation::name($user_variables[0])) {
        $show = $invalid_response[0];
        include $page;
        include 'views/footer.php';
        exit();
    }
    if (Validation::name($user_variables[0])) {
        if ($check->name($table, $user_variables[0], $client)) {
            $show = $exist_response[0];
            include $page;
            include 'views/footer.php';
            exit();
        }
    }
}

/* Email Validation */

if (empty($user_variables[2])) {
    $show = $err_response[2];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[2])) {
    if (!Validation::email($user_variables[2])) {
        $show = $invalid_response[2];
        include $page;
        include 'views/footer.php';
        exit();
    }
    if (Validation::email($user_variables[2])) {
        if ($check->email($table, $user_variables[2], $client)) {
            $show = $exist_response[2];
            include $page;
            include 'views/footer.php';
            exit();
        }
    }
}
/* ----Email Validation end---- */



/* * Password Validation*** */

if (!Validation::length($user_variables[3])) {
    $show = $invalid_response[3];
    include $page;
    include 'views/footer.php';
    exit();
}

if (!Validation::match($user_variables[4], $user_variables[3])) {
    $show = $invalid_response[4];
    include $page;
    include 'views/footer.php';
    exit();
}
/* * *password Validaton*** */

/* Captcha validation Checking bot */

/* * Captcha*** */

if (isset($user_variables[0]) && isset($user_variables[2])) {
    if (Validation::name($user_variables[0]) && Validation::email($user_variables[2])) {
        if (!$check->name($table, $user_variables[0], $client) && !$check->email($table, $user_variables[2], $client)) {
            //Create user account
            //$user_variables=array($username,$userphone,$useremail,$userpasword,$userpasword1,$captcha,$captcha1);
            $salt = uniqid();
            $password = Hash::create('sha256', $user_variables[3], $salt);
            $dataUser = array(
                "id" => textFormatter::keyGen(),
                "name" => $user_variables[0],
                "firstname" => "",
                "lastname" => "",
                "nationalid" => "",
                "province" => "",
                "phone" => "",
                "email" => $user_variables[2],
                "password" => $password,
                "salt" => $salt,
                "type" => "user",
                "state" => "0",
                "date" => date("d-m-y"),
                "lastlogin" => date("d-m-y"),
                "lastlogout" => date("d-m-y")
            );

            if ($client->insert(TABLE, $dataUser)) {
                $registration_link = URL . USERTYPE . "complete/" . Hash::create('sha256', $user_variables[2], $salt);

                echo SITE_MODE == 'debug' ? $registration_link : '';

                if (Email::sendMail("Account Activation", Email::verifyAccount($registration_link), $user_variables[2])) {
                    Session::set("accountCreated", true);
                    include REGISTRATION_SUCCESS_PAGE;
                    include 'views/footer.php';
                    exit();
                }
            } else {


                $show = "Error creating account.Please try again";
                include $page;
                include 'views/footer.php';
            }
        } else {


            $show = "Error creating account.Please try again";
            include $page;
            include 'views/footer.php';
        }
    } else {
        $show = $invalid_response[5]; //." >>>300";
        include $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $invalid_response[5]; //." >>>50";
    include $page;
    include 'views/footer.php';
    exit();
}
 
