<?php
/**
 * Description of User
 *
 * @author Reggie Te
 */
class User {
    //put your code here
    private $client;
    private $_userid;
    
public function __construct($client) {
        $this->client=$client;   
      
        $this->_userid=Session::get('usercodeid');  
     
    }
    
    public function setUserid($userid)
    {
        $this->_userid=$userid;
    }




 //username
public function getName()
{
return $this->getDetails()[0]['name'];   
}
//firstname
public function getFirstName()
{
 return $this->getDetails()[0]['firstname'];   
}
//lastname
public function getLastName()
{
 return $this->getDetails()[0]['lastname'];   
}
//nationalid
public function getNationalId()
{
 return $this->getDetails()[0]['nationalid'];   
}
//countryCode
public function getProvince()
{
 return $this->getDetails()[0]['province'];   
}
//phone
public function getPhone()
{
 return $this->getDetails()[0]['phone'];   
}
//email
public function getEmail()
{
 return $this->getDetails()[0]['email'];   
}

//password
public function getPassword()
{
 return $this->getDetails()[0]['password'];   
}
//salt
public function getSalt()
{
 return $this->getDetails()[0]['salt'];   
}
//type
public function getType()
{
 return $this->getDetails()[0]['type'];   
}
//state
public function getState()
{
 return $this->getDetails()[0]['state'];   
}
//date
public function getDate()
{
 return $this->getDetails()[0]['date'];   
}
//lastlogin
public function getLastLogin()
{
 return $this->getDetails()[0]['lastlogin'];   
}
//lastlogout
public function getLastLogOut()
{
 return $this->getDetails()[0]['lastlogout'];   
}

 public function saveChange($data=  array())
{
     $this->client->update('userparent', $data, "id='$this->_userid' ");
}

private function getDetails() {
    
    $result=$this->client->select("SELECT * FROM userparent WHERE id=:id LIMIT 1", array(":id" =>  $this->_userid));
    $count=0;
         foreach ($result as $value) {
           $count++;  
         }
         
         return $count>0?$result:null;
}

public function recordLogOutTime() {
$userid=  Session::get('usercodeid');
    return $this->client->update('userparent', array("lastlogout" => date("d-m-y h:m:s")), "userid='$this->_userid'");
}

}
