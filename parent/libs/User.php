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
    private $_email;
    private $_password;


    public function __construct($client) {
        $this->client=$client;   
     
    }
    
public function setUserid($userid)
{
        $this->_userid=$userid;
}
public function setEmail($email=null) {
    $this->_email=$email;
}
public function setPassword($password=null) {
    $this->_password=$password;
}


 //username
public function getId()
{
return $this->getDetails()[0]['id'];   
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
public function getCountryCode()
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
 return @$this->getDetails()[0]['salt'];   
}
//type
public function getType()
{
 return $this->getDetails()[0]['type'];   
}
//state
public function getState()
{
 return @$this->getDetails()[0]['state'];   
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

/**
 * 
 * @param string $email   user email
 * @param string $password  user password
 * @param string $table  database table to effect change
 * @param object $client  database instance
 * @return boolean
 */
public function login() {
    $count = 0;
    $result = $this->client->select("select * from userparent WHERE email=:email AND password=:password AND state=1 LIMIT 1", array(":email" => $this->_email, ":password" => $this->_password));
    foreach ($result as $key => $value) {
        $count++;
        if ($count == 1) {
            Session::set('usercodeid', $value['id']);
            Session::set('loggedIn', true);
            $this->recordLoginTime($value['id']);
            return true;
        } else {
            return false;
        }
    }
}
/**
 * 
 * @param string $table
 * @param string $id
 * @param object $client database instance
 * @return string
 */
public function recordLoginTime($id) {
    
    return $this->client->update('userparent', array("lastlogin" => date("d-m-y h:m:s")), "id='$id'");
    
}
public function recordLogOutTime($userid) {
    return $this->client->update('userparent', array("lastlogout" => date("d-m-y h:m:s")), "userid='$userid'");
}

/**
 * 
 * @param string $id  userid
 * @param string $table   user datatable
 * @param string $psswrd  use password
 * @param object $client  database instance
 * @return boolean
 */
public function updatePassword($id,$psswrd) {
    $salt = uniqid(mt_rand());
    $password =Hash::create('sha256', $psswrd, $salt);
    $data = array("password" =>$password, "salt" => $salt);
    return $this->client->update('userparent', $data, "id='$id' ");
     
}

public  function deleteAccount($link=null)
{
    $count=0;
     $result = $this->client->select("select * from userparent");
    foreach ($result as $key => $value) {
           if ($link == Hash::create('sha256', $value['email'],$value['id'])) {
         
               $this->client->delete("userparent","id='".$value['id']." ' AND email ='".$value['email']."'");
             $count++;
           }
        
        }
        return $count>0?true:false;
}

public  function getAllUser()
{
    $count=0;
     $result = $this->client->select("select * from userparent WHERE state=1");
    foreach ($result as $key => $value) {
          $count++;        
        }
        return $count;
}
/**
 * 
 * @param string $table
 * @param string $email
 * @param object $client  database instance
 * @return boolean
 */
public function activateAccount() {

    return $this->client->update('userparent', array("state" => "1"), "email='$this->_email'");
}

private function getDetails() {
    
    return $this->client->select("SELECT * FROM userparent WHERE email=:email LIMIT 1", array(":email" =>  $this->_email));
}

}
