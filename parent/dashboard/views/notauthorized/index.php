
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Not Authorized </title>
        <link rel="shortcut icon" href="<?php echo URL; ?>public/images/icon.ico">
        <link href="<?php echo URL; ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>public/bootstrap/css/custom_1.css" rel="stylesheet">
        <script src="<?php echo URL; ?>public/bootstrap/js/jquery.min.js"></script>


    </head>


    <body class="nav-md">

        <div class="container body">

            <div class="main_container">

                <!-- page content -->
                <div class="col-md-12">
                    <div class="col-middle">
                        <div class="text-center">
                            <h1 class="error-number">Not Authorized</h1>
                            <h2>Login to view the requested page</h2>
                            <p>We track these errors automatically, but if the problem persists feel free to contact us. <br>In the meantime, try refreshing. <a href="#">Report this?</a>
                            </p>
                            <p><a href="<?php echo URL; ?>">Back To Home</a>
                            </p>
                            <div class="mid_center">
                                <h3>Search</h3>
                                <form>
                                    <div class="col-xs-12 form-group pull-right top_search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search for...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">Go!</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

            </div>
            <!-- footer content -->
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="<?php echo URL; ?>bootstrap/js/bootstrap.min.js"></script>

        <!-- /footer content -->
    </body>

</html>