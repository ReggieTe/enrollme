<?php
/**
 * Description of AccountType
 *
 * @author Reggie Te
 */
class AccountType {
    //put your code here
    private $_client;
    private $_typeid;
    
    public function __construct($client=null,$typeid=null) {
        $this->_client=$client;
        $this->_typeid=$typeid;
    }
    public function setId($typeid)
    {
        $this->_typeid=$typeid; 
    }
    public function getName() {

        return $this->getDetails()[0]['name'];

}
    
    public function saveChange($data=array()) {
   
        //$this->_client->update('userdeveloper_skill_set', $data, "developer_id='$this->_userid'");
}
    
   
    private function getDetails() {
     
         $result=$this->_client->select("SELECT * FROM userdeveloper_types WHERE id=:id  LIMIT 1", array(":id" =>  $this->_typeid));
          $count=0;
         foreach ($result as $value) {
           $count++;  
         }
         
         return $count>0?$result:null;
         
    }
}
    

