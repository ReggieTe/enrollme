<?php

 $page = 'views/enroller/index.php';
        $success_page = $page;

        /*         * ****image details********* */
        $file = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];
        $type = $_FILES['img']['type'];
        $MAX_SIZE = 9000;

        $require_image_type = array("image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp", "jimage/peg", "image/JPG", "image/PNG");
        $image_values = array($file, $size, $type);

        /*         * ********image validation**************** */

        if ($image_values[1] <= 0) {
            $show = "Invalid image.Please try again";
            require $page;
            include 'views/footer.php';
            exit();
        }
        if (isset($image_values[0])) {

            if (!in_array($image_values[2], $require_image_type)) {

                $show = "invalid image format.Please try again";
                require $page;
            include 'views/footer.php';
                exit();
            }
            if ($image_values[2] > ($MAX_SIZE * 1024)) {
                $show = "File image too larger.Please use a smaller version";
                require $page;
            include 'views/footer.php';
                exit();
            }
        }
        /*         * ***********end image validation*********** */



        if ($image_values[2] >= 0 && in_array($image_values[2], $require_image_type) && $image_values[2] < ($MAX_SIZE * 1024)) {

            $id = $_SESSION['usercodeid'];
            $key = $_SESSION['currentStudentId'];
                        //
            if(Upload::File($image_values[0], $key,"images", "child", "png"))
            {
            $show = "Image changed successful";
            include_once $success_page;
            include 'views/footer.php';
            exit(); 
            }
 else {
       $show = "Error changing image.Please try again";
            include_once $success_page;
            include 'views/footer.php';
            exit();
 }

            //
          
        } else {
            $show = "Error changing image.Please try again";
            require $page;
            include 'views/footer.php';
            exit();
        }




