<?php

/*
 * To change this license header, choose License Headers in Project Properties.
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
        ;
    }
    /**
 * 
 * @param string $homePage
 * @param string $defaultPage
 */
public function init($homePage = "step-1", $defaultPage = "step-1") {
    
    Session::init();
    $client = new Database();
    $check=new Check($client);
    $checkapp=new CheckApp();
    $bid = new Bids($client);
    $deal=new Deal($client);
    $user=new User($client);
    $setup=new SetUp($client);
    $skill=new Skill($client);
    $accountType= new AccountType($client);
    $countryInfo=new Country($client);

    @$page = strtolower(filter_var($_GET['page'], FILTER_SANITIZE_STRING));
    
    

    if(Session::get("loggedIn"))
    {
    include 'views/header.php';
    //--------Preparing page content-------
    
    if (!empty($page)) {
        
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
