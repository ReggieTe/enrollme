<?php

/*
 * To change this license header, choose License Headers in Student Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author Reggie Te
 */
class Bootstrap {
    //put your code here
    function __construct() {
        
    }
    /**
 * 
 * @param string $homePage
 * @param string $defaultPage
 */
public function init($homePage = "home", $defaultPage = "home") {
    
    //error_reporting(0);
    
    Session::init();
    $client = new Database();
    $check=new Check($client,TABLE);
    $student=new Student(null, $client);
    $content = new ContentManager();
    $user=new User($client);
     
    $countryInfo=new Country($client);

    @$page = strtolower(filter_var($_GET['page'], FILTER_SANITIZE_URL));
    
    
    if(Session::get("loggedIn"))
    {
    include 'views/header.php';
    //--------Preparing page content-------
    
    if (!empty($page)) {
    
    $pagename = $content->getPageName($page);
    $pagedescription = $content->getPageDescription($page);
    $pagekeywords = $content->getPageKeyWords($page);

        $path = "views/$page/index.php";
        file_exists($path) ? include "views/$page/index.php" : include "views/$homePage/index.php";
    } 
    else 
    {
        include "views/$defaultPage/index.php";
    }
//-------end-------------------
    include 'views/footer.php';
    
}
 else {
    include 'views/notauthorized/index.php'; 
}
}


}
