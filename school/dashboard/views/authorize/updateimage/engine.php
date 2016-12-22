<?php

define("UPDATE_IMAGE_PAGE", "views/profileedit/index.php");
$page = UPDATE_IMAGE_PAGE;

$id = Session::get('usercodeid');
$valid_formats = array("image/jpg", "image/png", "image/gif", "image/bmp", "image/jpeg");
define("MAX_SIZE", "9000");


$image = (filter_var($_FILES['img']['tmp_name']));
$size = (filter_var($_FILES['img']['size']));
$ext = ($_FILES['img']['type']);


$image_values = array($image, $size, $ext);

$err_response = array(
    "Invalid image.Please try again",
    "Invalid format.Please try again",
    "You have exceed the maximum file size",
    "Image uploaded successfully.Refresh page",
    "Error uploading image .Please try again"
);

if (empty($image_values[0])) {
    $imageshow = $err_response[0];
    include $page;
    include 'views/footer.php';
    exit();
}
if (!in_array($image_values[2], $valid_formats)) {
    $imageshow = $err_response[1];
    include $page;
    include 'views/footer.php';
    exit();
}
if ($image_values[1] > (MAX_SIZE * 1024)) {
    $imageshow = $err_response[2];
    include $page;
    include 'views/footer.php';
    exit();
}

if (in_array($image_values[2], $valid_formats)) {

    if (Upload::File($id, $id, "images", "profilepic", "jpg")) {
        
        
        $imageshow = $err_response[3];
        include $page;
        include 'views/footer.php';
        exit();
    } else {
        $imageshow = "Failed to upload image.Please try again";
        include $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $imageshow = $err_response[4];
    include $page;
    include 'views/footer.php';
    exit();
}



