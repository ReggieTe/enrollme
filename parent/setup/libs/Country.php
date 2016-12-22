<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Country
 *
 * @author Reggie Te
 */
class Country {
    //put your code here
    private $_client;
    private $_countryid;
    
    public function __construct($client=null,$countryid=null) {
        $this->_client=$client;
        $this->_countryid=$countryid;
    }
    public function setId($countryid) {
        $this->_countryid=$countryid;
    }
    public function getName() {
       
        return $this->getDetails()[0]['name'];
    }
    private function getDetails() {
     
        $result=$this->_client->select("SELECT * FROM country WHERE id=:id  LIMIT 1", array(":id" =>  $this->_countryid));
    
         $count=0;
         foreach ($result as $value) {
           $count++;  
         }
         
         return $count>0?$result:null;
    }
}
