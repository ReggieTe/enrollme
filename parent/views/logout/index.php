<?php
$user->recordLogOutTime(Session::get('usercodeid'));
Session::destroy();
$show="Logged out successfully";
include 'views/home/index.php';
include 'views/footer.php';
exit();
?>
