<?php

/**
 * Description of Bootstrap
 *
 * @author Reggie Te
 */
class Bootstrap {

    
    /**
     * 
     * @param string $homePage
     * @param string $defaultPage
     */
    public function init($homePage = "home", $defaultPage = "home") {
       
    Session::init();
    $content = new ContentManager();
    

    @$page = strtolower(filter_var($_GET['page'], FILTER_SANITIZE_URL));
           ;
    $pagename = $content->getPageName($page);
    $pagedescription = $content->getPageDescription($page);
    $pagekeywords = $content->getPageKeyWords($page);

    include 'views/header.php';
    //--------Preparing page content-------
    
    if (!empty($page)&&$page!='home') {
        
        $path = "views/$page/index.php";
        file_exists($path) ? include "views/$page/index.php" : include "views/$homePage/index.php";
       
        
    } 
    else 
    {
        include "views/home/index.php";
    }
//-------end-------------------
     include 'views/footer.php';
    }

}
