<?php

define("RESPONSEAPPLICATIONPAGE", "views/addapplication/index.php");

$page = RESPONSEAPPLICATIONPAGE;
$success_page = $page;

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING);
@$skills = textFormatter::convertArrayToString($_POST['skills']); //convert the array into a string to store in db
$budget = filter_var($_POST['budget'], FILTER_SANITIZE_STRING);
$duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
$url = filter_var($_POST['link'], FILTER_SANITIZE_URL);
$description = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
/* * ****image details********* */

$file = $_FILES['img']['tmp_name'];
$size = $_FILES['img']['size'];
$type = $_FILES['img']['type'];
$MAX_SIZE = 9000;

$require_image_type = array("image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp", "jimage/peg", "image/JPG", "image/PNG");
$image_values = array($file, $size, $type);

$app_values = array($name, $url, $cat, $skills, $budget, $description, $duration, $role);
$require_type = array("a1234", "i1234", "w1234"); //category types
$err_response = array(
    "Project name Invalid.Please try again"
    , "Invalid name.Please try again"
    , "Project with the name  $name exist "
    , "Project link required.Please try again"
    , "Invalid link required.Please try again"
    , "Category required.Please try again"
    , "Invalid Category .Please try again"
    , "Invalid Subcategory .Please try again"
    , "Invalid price .Please try again"
    , 'Project image Required.Please try again'
    , 'Not a Valid Image.Please try again'
    , 'File too big.Please try again'
    , "Description required.Please try again"
    , "Invalid description.Please try again"
    , "You have 0 credits to upload.Consider paying you yearly subscriptions"
    , "Project uploaded successfully"
    , "Error recording app.Please try again"
);

//****validating app name
if (!empty($app_values[0])) {
    if (!Validation::name($app_values[0])) {
        $show = $err_response[1];
        require $page;
        include 'views/footer.php';
        exit();
    }

    if ($checkapp->name('app', $app_values[0], $client)) {
        $show = $err_response[2];
        require $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $err_response[0];
    require $page;
    include 'views/footer.php';
    exit();
}
/* * **end name validation********** */
/* * ***validating link********** */
if (!empty($app_values[1])) {//echo"Pass ;link";
    if (!Validation::url($app_values[1])) {
        $show = $err_response[4];
        require $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $err_response[3];
    require $page;
    include 'views/footer.php';
    exit();
}
/* * **end validating url********** */
if (empty($app_values[3])) {
    $show = 'Select atleast one skill.Please try again';
    require $page;
    include 'views/footer.php';
    exit();
}
/* * ****validating subcategory************ 

  if(!ValidateCategory($app_values[3]))
  {
  $show=$err_response[7];
  require $page;
  exit();
  }

  /**********end subcategory validation*********** */

/* * ********image validation**************** */

if ($image_values[2] < 0) {
    $show = $err_response[9];
    require $page;
    include 'views/footer.php';
    exit();
}
if (isset($image_values[0])) {
    //echo"Pass :image";
    if (!in_array($image_values[2], $require_image_type)) {

        $show = $err_response[10];
        require $page;
        include 'views/footer.php';
        exit();
    }
    if ($image_values[2] > ($MAX_SIZE * 1024)) {
        $show = $err_response[11];
        require $page;
        include 'views/footer.php';
        exit();
    }
}
/* * ***********end image validation*********** */

/* * *******description validation******* */


if (isset($app_values[5])) {//echo"Pass :descriptio";
    if (!Validation::description($app_values[4])) {
        $show = $err_response[13];
        require $page;
        include 'views/footer.php';
        exit();
    }
}



/* * ******end description validation********* */


if (Validation::name($app_values[0]) && Validation::url($app_values[1])) {



    //Create new app
    $key = textFormatter::keyGen();
    $image = "app$key.png";
    $appData = array(
        "id" => Session::get('usercodeid'),
        "app_code" => $key,
        "app_name" => $app_values[0],
        "category_id" => $app_values[2],
        "subcategory" => '',
        "app_price" => '0',
        "app_budget" => $app_values[4],
        "app_skills" => $app_values[3],
        "app_duration" => $app_values[6],
        "app_role" => $app_values[7],
        "app_description" => $app_values[5],
        "app_link" => $app_values[1],
        "app_image" => $image,
        "date" => date("d-m-y"),
        "lastupdate" => date("d-m-y")
    );

    $result = $client->insert('app', $appData);
    if ($result) {
        Upload::File(Session::get('usercodeid'), $key, "images", "app", "png");
        $show = $err_response[15];
        include_once $success_page;
        include 'views/footer.php';
        exit();
    } else {
        $show = $err_response[16];
        require $page;
        include 'views/footer.php';
        exit();
    }
} else {
    $show = $err_response[16] . ">>Debugging";
    require $page;
    include 'views/footer.php';
    exit();
}

/*function convertArrayToString($array=array())
{
return !empty($array)?implode(",", $array):'';
       
}
function convertStringToArray($string,$delimiter=",")
{
return !empty($string)?  explode($delimiter, $string):'';
       
}*/