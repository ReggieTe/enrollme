<?php


class ContentManager {
    
private $pageContent=array(
      array(
          "key"=>"complete",
          "name"=>"Verify Account ",
          "description"=>" ",
          "keywords"=>" "),
    
     array(
         "key"=>"home",
         "name"=>"Home",
         "description"=>"",
         "keywords"=>" "),
    
     array(
         "key"=>"logout",
         "name"=>"Log Out",
         "description"=>" ",
         "keywords"=>""),
    
    array(
        "key"=>"register",
        "name"=>"Registration ",
        "description"=>" ",
        "keywords"=>" "),
    
    array(
        "key"=>"reset",
        "name"=>"Reset Account Password",
        "description"=>"",
        "keywords"=>" "),
    
    array(
        "key"=>"resetpassword",
        "name"=>"Reset Account Password",
        "description"=>" ",
        "keywords"=>" "),
    
    array(
        "key"=>"setpassword",
        "name"=>"Set Account Password ",
        "description"=>" ",
        "keywords"=>" "),
    
    array(
        "key"=>"success",
        "name"=>"Account Created ",
        "description"=>" ",
        "keywords"=>""),
    
    array(
        "key"=>"authorise",
        "name"=>"Authorize",
        "description"=>" ",
        "keywords"=>" ")
    );

    function __construct() {
        
    }
    /**
     * 
     * @param string $page
     * @return string
     */
    public  function getPageName($page) {
        
        return $this->setPageContent($page, "name");
    }
    /**
     * 
     * @param string $page
     * @return string
     */
    public  function getPageDescription($page) {
        
        return $this->setPageContent($page, "description");
    }
    /**
     * 
     * @param string $page
     * @return string
     */
    public  function getPageKeyWords($page) {
        
        return $this->setPageContent($page, "keywords");
    }
    /**
     * 
     * @param string $searchKey
     * @param string $type
     * @return string
     */
    private function setPageContent($searchKey,$type) {
      
        foreach ($this->pageContent as $key => $value) {
        if(strcasecmp($searchKey, $value['key'])==0)
                {
            return $value[$type];
        }  
    }

}
}