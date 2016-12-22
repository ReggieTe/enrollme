<?php
$action = filter_var(strtolower(trim($_POST['ref'], FILTER_SANITIZE_STRING)));

$path = "views/authorize/" . $action . "/engine.php";

if (is_file($path)) {
    include $path;
} else {
    include 'views/step-1/index.php';
}
