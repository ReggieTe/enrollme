<?php

define("REGISTRATION_PAGE", "views/enrollment/index.php");
//setting the environment 

$table = "students";
$page = REGISTRATION_PAGE;

//*********************************end*****************************
//Cleaning user input
@$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
@$lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
@$dob = trim(filter_var($_POST['dob'], FILTER_SANITIZE_STRING));
@$age = trim(filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT));
@$gender = trim(filter_var($_POST['gender'], FILTER_SANITIZE_STRING));
@$points = filter_var($_POST['points'], FILTER_SANITIZE_NUMBER_INT);
//@$schools = textFormatter::convertArrayToString($_POST['schools']); //convert the array into a string to store in db
@$schools = trim(filter_var($_POST['schools'], FILTER_SANITIZE_STRING));
// $condition=  CleanInput($_POST['condition']);


$user_variables = array($firstname, $lastname, $dob, $age, $gender, $points, $schools);


$err_response = array(
    "firstname required.Please try again"
    , "Lastname required.Please try again"
    , "Date of Birth required.Please try again"
    , "Age required.Please try again"
    , "Gender required.Please try again"
    , "Points required.Please try again."
    , "Schools required.Please try again."
    , "Child Image required.Please try again."
);
$invalid_response = array(
    "Invalid firstname.Please try again"
    , "Invalid lastname.Please try again"
    , "Invalid Date of Birth .Please try again"
    , "Invalid Age.Please try again"
    , "Invalid Gender.Please try again"
    , "Invalid Points.Please try again"
    , "Invalid Schools.Please try again"
    , "Error:Creating account cancelled.Please try again"
);

$exist_response = array(
    $user_variables[0]." ".$user_variables[1]." already Registered for enrollment.Thank you"
);

$child_img_file = $_FILES['child_img']['tmp_name'];
$child_img_size = $_FILES['child_img']['size'];
$child_img_type = $_FILES['child_img']['type'];

$slip_img_file = $_FILES['slip_img']['tmp_name'];
$slip_img_size = $_FILES['slip_img']['size'];
$slip_img_type = $_FILES['slip_img']['type'];
$MAX_SIZE = 9000;


$require_child_type = array("image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp", "jimage/peg", "image/JPG", "image/PNG");

$require_slip_type = array("image/jpg", "image/jpeg", "image/png","jimage/peg", "image/JPG", "image/PNG","application/pdf");

$child_image_values = array($child_img_file, $child_img_size, $child_img_type);

$slip_image_values = array($slip_img_file, $slip_img_size, $slip_img_type);

/* firstName Validation */

if (empty($user_variables[0])) {
    $show = $err_response[0];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[0])) {
    if (!Validation::name($user_variables[0])) {
        $show = $invalid_response[0];
        include $page;
        include 'views/footer.php';
        exit();
    }
   }
/* Last Name Validation */

if (empty($user_variables[1])) {
    $show = $err_response[1];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[1])) {
    if (!Validation::name($user_variables[1])) {
        $show = $invalid_response[1];
        include $page;
        include 'views/footer.php';
        exit();
    }
   }

/* date of birth Validation */

if (empty($user_variables[2])) {
    $show = $err_response[2];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[2])) {
    if (!Validation::date($user_variables[2])) {
        $show = $invalid_response[2];
        include $page;
        include 'views/footer.php';
        exit();
    }
}

/*age validation*/

if (empty($user_variables[3])) {
    $show = $err_response[3];
    include $page;
    include 'views/footer.php';
    exit();
}


/*gender validation*/

if (empty($user_variables[4])) {
    $show = $err_response[4];
    include $page;
    include 'views/footer.php';
    exit();
}
if (isset($user_variables[4])) {
    if (!in_array($user_variables[4],array('male','female'))) {
        $show = $invalid_response[4];
        include $page;
        include 'views/footer.php';
        exit();
    }
}

/*points validation*/

if (empty($user_variables[5])) {
    $show = $err_response[5];
    include $page;
    include 'views/footer.php';
    exit();
}


/*schools validations */

if (empty($user_variables[6])) {
    $show = 'Select atleast one school.Please try again';
    require $page;
    include 'views/footer.php';
    exit();
}

/*child image validation*/

if ($child_image_values[2] < 0) {
    $show = $err_response[7];
    require $page;
    include 'views/footer.php';
    exit();
}
if (isset($child_image_values[0])) {
    //echo"Pass :image";
    if (!in_array($child_image_values[2], $require_child_type)) {

        $show = "Invalid Picture format.Please try again";
        require $page;
        include 'views/footer.php';
        exit();
    }
    if ($child_image_values[2] > ($MAX_SIZE * 1024)) {
        $show = "Image too big.Please select an image less than".($MAX_SIZE * 1024);
        require $page;
        include 'views/footer.php';
        exit();
    }
}

/*slip image validation*/

if ($slip_image_values[2] < 0) {
    $show = $err_response[7];
    require $page;
    include 'views/footer.php';
    exit();
}
if (isset($slip_image_values[0])) {
    //echo"Pass :image";
    if (!in_array($slip_image_values[2], $require_slip_type)) {

        $show = "Invalid Slip format.Please try again";
        require $page;
        include 'views/footer.php';
        exit();
    }
    if ($slip_image_values[2] > ($MAX_SIZE * 1024)) {
        $show = "Image too big.Please select an image less than".($MAX_SIZE * 1024);
        require $page;
        include 'views/footer.php';
        exit();
    }
}


//Register User

        if (!$check->DoubleDataQuery($user_variables[0], $user_variables[1])) {
            //Create user account
            //$user_variables = array($firstname, $lastname, $dob, $age, $gender, $points, $schools);
            $key=textFormatter::keyGen();
            $dataUser = array(
                "id" => $key,
                "parent_id" => Session::get('usercodeid'),
                "firstname" => $user_variables[0],
                "lastname" => $user_variables[1],
                "dob" => $user_variables[2],
                "age" => $user_variables[3],
                "gender" => $user_variables[4],
                "points" =>$user_variables[5],
                "special_needs" => "",
                "schools" => $user_variables[6],
                "accepted" => "",
                "state" => "0",
                "date" => date("d/m/y")
            );

            if ($client->insert('students', $dataUser)) {
                //Upload the child image
                Upload::File($child_image_values[0], $key, "images", "child", "png");
                
                //Uploading the results slip
                Upload::File($slip_image_values[0], $key, "images", "slip", "pdf");
                
                Upload::Copyright($key);
                
                  $show = "Student add successfully";
                include $page;
                include 'views/footer.php';
              
            } else {


                $show = "Error 1 creating account.Please try again";
                include $page;
                include 'views/footer.php';
            }
        } else {


            $show = "Error  2 creating account(Already added).Please try again";
            include $page;
            include 'views/footer.php';
        }
    
 
