
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME; ?> | <?php
        if (isset($pagename)) {
            echo $pagename;
        } else {
            echo 'Home';
        }
        ?></title>

    <meta name="description" content="<?php
    if (isset($pagedescription)) {
        echo $pagedescription;
    } else {
        echo 'Welcome to '.SITE_NAME.' .One of the leading  Freelancer communities in  southern africa region';
    }
    ?>">

    <meta name="keywords" content="<?php
    if (isset($pagekeywords)) {
        echo $pagekeywords;
    } else {
        echo "freelancers,Hire Android freelancer,iOS freelancer, web freelancers, designers,free android apps,free app downloads";
    }
    ?>">

    <meta name="author" content="<?PHP echo SITE_NAME; ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href="<?php echo URL; ?>public/images/icon.ico">


        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo URL; ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo URL; ?>public/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">
