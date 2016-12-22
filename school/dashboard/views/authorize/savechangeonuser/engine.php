<?php

define("SAVECHANGESONUSERPAGE", "views/profile/index.php");
$page = SAVECHANGESONUSERPAGE;

        //Cleaning user input
        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));

        //NEW 
        $firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
        $lastname =null;// trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
        $nationalid = null;//trim(filter_var($_POST['nationalid'], FILTER_SANITIZE_STRING));
        $province = trim(filter_var($_POST['province'], FILTER_SANITIZE_STRING));
        $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
        $type =null;// trim(filter_var($_POST['type'], FILTER_SANITIZE_STRING));
        //END
        $useremail = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $userphone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));


        $user_variables = array($username, $useremail, $userphone, $firstname, $lastname, $nationalid, $province,$type,$description);
        $err_response = array(
            "userame required.Please try again"
            , "Email required.Please try again"
            , "Phone number required.Please try again"
            , "Id number required.Please try again"
            , "Id number required.Please try again"
            , "Id number required.Please try again"
             
        );
        $invalid_response = array(
            "Invalid Username.Please try again"
            , "Invalid Email .Please try again"
            , "Invalid Phone number .Please try again"
            , "Error:Creating account cancelled.Please try again"
            , "Invalid First Name.Please try again"
            , "Invalid Last Name.Please try again"
            , "Invalid National ID.Please try again"
            , "Invalid province.Please try again"
        );


        $exist_response = array(
            "Name already taken.Please try again"
            , "Email already taken.Please try again"
            , "Phone number already taken.Please try again"
            , "Email  already taken.Please try again"
        );


        $error = array();
//name
        if (!empty($user_variables[0])) {
            if (Validation::name($user_variables[0])) {
                if (!$check->name($user_variables[0])) {
                    
                    if($user->saveChange(array('name'=>$user_variables[0])))
                 {
                   array_push($error,"Failed to save <em>Username</em> .Please try again");   
                 }
                } else {

                    array_push($error, $exist_response[0]);
                }
            } else {
                ;
                array_push($error, $invalid_response[0]);
            }
        } else {
            array_push($error, $err_response[0]);
        }
//email
        if (!empty($user_variables[1])) {
            if (Validation::email($user_variables[1])) {
                if (!$check->email($user_variables[1])) {
                    
                     if($user->saveChange(array('email'=>$user_variables[1])))
                 {
                   array_push($error,"Failed to save <em>Email</em> .Please try again");   
                 }
                } else {

                    array_push($error, $exist_response[1]);
                }
            } else {
                ;
                array_push($error, $invalid_response[1]);
            }
        } else {
            array_push($error, $err_response[1]);
        }
//phone            
        if (!empty($user_variables[2])) {
            if (Validation::phone($user_variables[2])) {
                if (!$check->phone($user_variables[2])) {
                    
                     if($user->saveChange(array('phone'=>$user_variables[2])))
                 {
                   array_push($error,"Failed to save <em>Phone Number</em> .Please try again");   
                 }
                } else {

                    array_push($error, $exist_response[2]);
                }
            } else {
                ;
                array_push($error, $invalid_response[2]);
            }
        } else {
            array_push($error, $err_response[2]);
        }
        /*         * *********************Don't check content ***************************** */
        //firstname
        if (!empty($user_variables[3])) {
            if (Validation::name($user_variables[3])) {

                 if($user->saveChange(array('firstname'=>$user_variables[3])))
                 {
                   array_push($error,"Failed to save <em>School Name</em> .Please try again");   
                 }
            } else {
                ;
                array_push($error, $invalid_response[3]);
            }
        } else {
            array_push($error, $err_response[3]);
        }
        //Description
        if (!empty($user_variables[8])) {
          

                 if($user->saveChange(array('description'=>$user_variables[8])))
                 {
                   array_push($error,"Failed to save <em>School Address</em> .Please try again");   
                 }
          
        } else {
            array_push($error,"School Address required.Please try again");
        }
      
        //province   
        if (!empty($user_variables[6])) {
            if (Validation::name($user_variables[6])) {

                  if($user->saveChange(array('province'=>$user_variables[6])))
                 {
                   array_push($error,"Failed to save <em>Province</em> .Please try again");   
                 }
            } else {
                ;
                array_push($error, $invalid_response[6]);
            }
        } else {
            array_push($error, $err_response[6]);
        }
         
        
        $show = "Successfuly updated";
        foreach ($error as $value) {
            $show = $value;
        }


        include $page;


