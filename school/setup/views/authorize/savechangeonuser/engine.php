<?php

define("SAVECHANGESONUSERPAGE", "views/step-1/index.php");
$page = SAVECHANGESONUSERPAGE;

       
        //NEW 
        $firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
        $province = trim(filter_var($_POST['province'], FILTER_SANITIZE_STRING));
        $userphone = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));


        $user_variables = array('', '', $userphone, $firstname,null,null, $province);
        $err_response = array(
            "userame required.Please try again"
            , "Email required.Please try again"
            , "Phone number required.Please try again"
            , "FirstName required.Please try again"
            , "LastName required.Please try again"
            
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

//phone            
        if (!empty($user_variables[2]))
            {
            if (Validation::phone($user_variables[2])) {
                
                if (!$check->phone(TABLE, $user_variables[2], $client)) {
                   
                    $user->saveChange(array('phone'=>$user_variables[2]));
                    
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
        if (!empty($user_variables[3]))
            {
            if (Validation::name($user_variables[3])) {

                $user->saveChange(array('firstname'=>$user_variables[3]));
                
            } else {
                ;
                array_push($error, $invalid_response[3]);
            }
        } else {
            array_push($error, $err_response[3]);
        }
     
        //province   
        if (!empty($user_variables[6]))
            {
            if (Validation::name($user_variables[6])) {

                $user->saveChange(array('province'=>$user_variables[6]));
                
                
            } else {
                ;
                array_push($error, $invalid_response[6]);
            }
        } else {
          
            array_push($error,'Invalid province.Please try again');
        }
     
        
        
        
        $show = "Successfuly updated.refresh to continue";
        foreach ($error as $value) {
            $show = $value;
        }


        include $page;


