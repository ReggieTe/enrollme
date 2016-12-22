<?php

define("UPDATE_APP_PAGE", "views/enroller/index.php");
$page = UPDATE_APP_PAGE;
$student->setStudentIdFromSession();
$success_page = $page;

//*********************************end*****************************
//Cleaning user input
@$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
@$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
@$dob = trim(filter_var($_POST['dob'], FILTER_SANITIZE_STRING));
@$age = trim(filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT));
@$gender = trim(filter_var($_POST['gender'], FILTER_SANITIZE_STRING));
$points = filter_var($_POST['points'], FILTER_SANITIZE_NUMBER_INT);

$user_variables = array($firstname, $lastname, $dob, $age, $gender, $points);


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
    $user_variables[0] . " " . $user_variables[1] . " already Registered for enrollment.Thank you"
);

/* firstName Validation */
$error = array();

if (isset($user_variables[0])) {
    if (Validation::name($user_variables[0])) {
        if (!$student->saveChange(array('firstname' => $user_variables[0]))) {
            array_push($error, "Failed to updated <em>Firstname</em>.Please try again");
        }
    } else {
        array_push($error, $err_response[0]);
    }
} else {
    array_push($error, $err_response[0]);
}
/* Last Name Validation */

if (isset($user_variables[1])) {
    if (Validation::name($user_variables[1])) {
        if (!$student->saveChange(array('lastname' => $user_variables[1]))) {
            array_push($error, "Failed to updated <em>Lastname</em>.Please try again");
        }
    } else {
        array_push($error, $invalid_response[1]);
    }
} 
else
    {
    array_push($error, $err_response[0]);
}

/* date of birth Validation */
if (isset($user_variables[2])) {
    if (Validation::date($user_variables[2])) {
        if (!$student->saveChange(array('dob' => $user_variables[2]))) {
            array_push($error, "Failed to updated <em>Date of Birth</em>.Please try again");
        }
    } else {
        array_push($error, $invalid_response[2]);
    }
} else {
    array_push($error, $err_response[2]);
}
/* age validation */
if (isset($user_variables[3])) {
    if (Validation::int($user_variables[3])) {
        if (!$student->saveChange(array('age' => $user_variables[3]))) {
            array_push($error, "Failed to updated <em>Age</em>.Please try again");
        }
    } else {
        array_push($error, $invalid_response[3]);
    }
} else {
    array_push($error, $err_response[3]);
}


/* gender validation */

if (isset($user_variables[4])) {
    if (in_array($user_variables[4], array('male', 'female'))) {
        if (!$student->saveChange(array('gender' => $user_variables[4]))) {
            array_push($error, "Failed to updated <em>Gender</em>.Please try again");
        }
    } else {
        array_push($error, $invalid_response[4]);
    }
} else {
    array_push($error, $err_response[4]);
}

/* points validation */
echo 'Qwesrty :'.$user_variables[5];

if (isset($user_variables[5])) {
    if (Validation::int($user_variables[5])) {
        
      if (!$student->saveChange(array('points' => $user_variables[5]))) {
            array_push($error, "Failed to updated <em>Points</em>.Please try again");
        }
    } else {
        array_push($error, $invalid_response[5].$user_variables[5]);
    }
} else {
    array_push($error, $err_response[5]);
}

$show = "Successfuly updated";
foreach ($error as $value) {
    $show = $value;
}

//$student->saveChange(array('lastupdate' => date("d-m-y")));
include $page;
