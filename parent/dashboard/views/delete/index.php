<?php

define("DELETEAPPLICATIONPAGE","views/enrollment/index.php");
$page=DELETEAPPLICATIONPAGE;
        
        $id=trim(filter_var($_GET['id'],FILTER_SANITIZE_STRING));
        //preparing the file type
       
        $user_variables=array($id);
        //deleting the file
        $student->setStudentId($user_variables[0]);
        if($student->delete())
        {
          $show="Student deleted successfully";
         include $page;
         include 'views/footer.php';
         exit();  
        }
        else
        {
         $show="Fail to delete student.Please try again";
         include $page;
         include 'views/footer.php';
         exit();   
        }
          
       