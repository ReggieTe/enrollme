<?php

$page = 'views/enroller/index.php';

$key = $_SESSION['currentStudentId'];
$degrees=  filter_var($_POST['degrees'],FILTER_SANITIZE_NUMBER_INT);

$student->setStudentIdFromSession();
$student->saveChange(array('lastupdate'=>date("d-m-y")));
Upload::RotateStudentImage($key, $degrees);
$show = "Image rotated by $degrees successful.Refresh Page";
include_once $page;
include 'views/footer.php';
exit();


