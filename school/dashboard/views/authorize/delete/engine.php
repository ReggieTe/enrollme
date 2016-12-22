<?php

define("RESET_PAGE", "views/setting/index.php");


$page = RESET_PAGE;

$type = filter_var($_POST['type'], FILTER_SANITIZE_EMAIL);



$invalid = "Invalid email.Please try again";
$failed = "Failed to send delete  link.Please try again";
$successs = "Delete link sent .Check your email";

//testFiles($client);
$link=null;
if (strcasecmp($type, "account") == 0) {
    $email = getUserDetails($client)[0]['email'];
    $userid = getUserDetails($client)[0]['id'];

    $resetlink = URL . USERTYPE . "delete/" . Hash::create('sha256', $email, $userid) . "/0";

    if (sendMail("Delete Account", deleteAccount($resetlink), $email)) {
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
    $show = $invalid;
    include $page;
    include 'views/footer.php';
    exit();
}
     
