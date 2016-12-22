<?php


class ContentManager {
    
private $pageContent=array(
      array(
          "key"=>"addclient",
          "name"=>"Add Client ",
          "description"=>" ",
          "keywords"=>" "),
    
     array(
         "key"=>"home",
         "name"=>"Home",
         "description"=>"",
         "keywords"=>" "),
    
     array(
         "key"=>"help",
         "name"=>"Help",
         "description"=>" ",
         "keywords"=>""),
    
    array(
        "key"=>"profile",
        "name"=>"Profile ",
        "description"=>" ",
        "keywords"=>" "),
    
    array(
        "key"=>"authorize",
        "name"=>"Authorize",
        "description"=>"",
        "keywords"=>" "),
    
    array(
        "key"=>"setting",
        "name"=>"Settings",
        "description"=>" ",
        "keywords"=>" "),
    
    array(
        "key"=>"viewclients",
        "name"=>"View Clients",
        "description"=>" ",
        "keywords"=>" "),
    
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