<?php

include '../config.php';


$invalid = "Invalid email.Please try again";
$failed = "Failed to send delete  link.Please try again";
$successs = "Delete link sent .Check your email";

$response = array('result' => 'error', 'message' => $invalid);


$link = null;

$resetlink = URL . USERTYPE . "delete/" . Hash::create('sha256', $user->getEmail(), Session::get('usercodeid')) . "/0";

if (Email::sendMail("Delete Account", Email::deleteAccount($resetlink), $user->getEmail())) {

    SITE_MODE == 'debug' ? $link = $resetlink : '';

    $show = $successs . "\n" . $link;

    $response = array('result' => 'success', 'message' => $show);
} else {
    $response = array('result' => 'error', 'message' => $failed);
}

echo json_encode($response);
exit();
