<?php

define("UPDATE_APP_PAGE", "views/viewapplication/index.php");
        $page = UPDATE_APP_PAGE;
        $app->setProjectIdFromSession();
        $success_page = $page;

        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $currentname = filter_var($_POST['currentname'], FILTER_SANITIZE_STRING);
        $cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING);
        $budget =filter_var($_POST['budget'],FILTER_SANITIZE_STRING);
        $duration =filter_var($_POST['duration'],FILTER_SANITIZE_STRING);
        $url = filter_var($_POST['link'], FILTER_SANITIZE_URL);
        $description = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
        $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);


        $app_values = array($name, $url, $cat, $description,$budget,$duration,$role);
        $updateNot="Other update have been made";
        $err_response = array(
            "Invalid name.Please try again <br>".$updateNot
            , "You have an App with the name  $name.<br>".$updateNot
            , "Invalid link required.Please try again<br>".$updateNot
            , "Category required.Please try again.<br>".$updateNot
            , "Invalid Category .Please try again.<br>".$updateNot
            , "Description required.Please try again.<br>".$updateNot
            , "Invalid description.Please try again.<br>".$updateNot
            , "You have 0 credits to upload.Consider paying you yearly subscriptions"
            , "Application updated successfully"
            , "Error updating app.Please try again"
        );

        //****validating app name

        $error = array();
//app name
        if (!empty($app_values[0])) {
            if (Validation::name($app_values[0])) {
                if (!$checkapp->name('app', $app_values[0])) {
                    $app->saveChange(array('app_name'=>$app_values[0]));

                    if (strcasecmp(trim($currentname), trim($app_values[0])) != 0) {//current name is not the same as the new name update application apk
                       
                        Upload::UpdateApp($currentname, $app_values[0]);
                    }
                } else {

                    array_push($error, $err_response[1]);
                }
            } else {
                ;
                array_push($error, $err_response[0]);
            }
        } else {
            array_push($error, $err_response[0]);
        }
//url
        if (!empty($app_values[1])) {
            if (Validation::url($app_values[1])) {

                $app->saveChange(array('app_link'=>$app_values[1]));
            } else {
                ;
                array_push($error, $err_response[2]);
            }
        } else {
            array_push($error, $err_response[2]);
        }
//category     
        if (!empty($app_values[2])) {
            if (Validation::category($app_values[2])) {
                $app->saveChange(array('category_id'=>$app_values[2]));
            } else {
                ;
                array_push($error, $err_response[3]);
            }
        } else {
            array_push($error, $err_response[4]);
        }

        //description
        if (!empty($app_values[3])) {

            $app->saveChange(array('app_description'=>$app_values[3]));
        } else {
            array_push($error, $err_response[5]);
        }

        $app->saveChange(array('app_budget'=>$app_values[4]));
        $app->saveChange(array('app_duration'=>$app_values[5]));
        $app->saveChange(array('app_role'=>$app_values[6]));
        
        $show = "Successfuly updated";
        foreach ($error as $value) {
            $show = $value;
        }

        $app->saveChange(array('lastupdate'=>date("d-m-y")));
        include $page;
           // include 'views/footer.php';


