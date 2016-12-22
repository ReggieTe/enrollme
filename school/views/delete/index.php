<?php
Session::destroy();
$deleted = false;
if ($user->deleteAccount(filter_var(@$_GET['method'], FILTER_SANITIZE_URL))) {
    $deleted = true;
} else {
    $deleted = false;
}
?>
<
<?php
if ($deleted) {
    $show="<span class='fa fa-smile-o fa-5x'></span><h2>Failed to delete account,Please try again!!</h2>";
} else {
    $show="<span class='fa fa-frown-o fa-5x'></span> <h2>We are hurt ,to see you leave!!</h2>";
}
include 'views/home/index.php';
include 'views/footer.php';
exit();
?>

