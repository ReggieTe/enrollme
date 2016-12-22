<?php
class dashboard {

    //private $_userId;= Session::get('usercodeid');
    
            function __construct() {
        
    }
    public static function appStatistics()
    {
        return "0%";
    }
    public static function jobStatistics()
    {
        return "0%";
    }
    public static function revenue()
    {
        return'0%';
    }

    public static function getUserImage($id=null) {
    $defaultimage = "public/images/user.jpg";
    
    $id==null?$id=$_SESSION['usercodeid']:$id='1230';
    
    $userimage = RELATIVEFILEPATH."/" . $id . "/images/profilepic" . $id . ".jpg";
  
    if (is_file($userimage)) {
        return URL . "" . str_replace("../../", "", $userimage);
    } else {
        return URL . "" . $defaultimage;
    }
}

}



