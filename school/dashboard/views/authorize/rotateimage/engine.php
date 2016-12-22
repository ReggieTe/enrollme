<?php

$page = 'views/viewapplication/index.php';

$key = $_SESSION['currentAppId'];
$degrees=  filter_var($_POST['degrees'],FILTER_SANITIZE_NUMBER_INT);

$app->setProjectIdFromSession();
$app->saveChange(array('lastupdate'=>date("d-m-y")));
Upload::RotateProjectImage($key, $degrees);
$show = "Image rotated by $degrees successful.Refresh Page";
include_once $page;
include 'views/footer.php';
exit();


