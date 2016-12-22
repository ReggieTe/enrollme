<?php

/**
 * Description of Bootstrap
 *
 * @author Reggie Te
 */
class Bootstrap {

    public function createFolder() {
        if (!is_dir(MAINFOLDER)) {
            FileHandler::createDir(MAINFOLDER);
        }
        if (is_dir(MAINFOLDER)) {
            FileHandler::createDir(SUBFOLDER);
        }
    }

    /**
     * 
     * @param string $homePage
     * @param string $defaultPage
     */
    public function init($homePage = "home", $defaultPage = "home") {
        $this->createFolder();
        Session::init();
        $client = new Database();
        $check = new Check($client);
        $user = new User($client);
        $setup = new SetUp($client);
        $content = new ContentManager();

        @$page = strtolower(filter_var($_GET['page'], FILTER_SANITIZE_URL));
        ;
        $pagename = $content->getPageName($page);
        $pagedescription = $content->getPageDescription($page);
        $pagekeywords = $content->getPageKeyWords($page);

        include 'views/header.php';
        //--------Preparing page content-------

        if (!empty($page)) {

            $path = "views/$page/index.php";
            file_exists($path) ? include "views/$page/index.php" : include "views/$homePage/index.php";
        } else {
            include "views/$defaultPage/index.php";
        }
//-------end-------------------
        include 'views/footer.php';
    }

}
