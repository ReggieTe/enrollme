<?php
$action = filter_var(strtolower(trim($_GET['method'], FILTER_SANITIZE_STRING)));

$path = "views/authorise/" . $action . "/engine.php";

if (is_file($path)) {
    include $path;
} else {
    include 'views/home/index.php';
}
