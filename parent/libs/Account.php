<?php

class Account {

/**
 * 
 * @param string $link  link to decrypt
 * @param string $table  database table to effect change
 * @param object $client  database instance
 * @return boolean
 */
public static function decryptLink($link,$client=null){
$count=0;
    $result = $client->select("select * from userparent");
    foreach ($result as $key => $value) {
        if(!empty($value['email'])&&!empty($value['salt']))
        {
           if ($link == Hash::create('sha256', $value['email'],$value['salt'])) {
            Session::set("id", $value['id']);
            Session::set("email", $value['email']);
            Session::set("createNewPassword", true);
            $count++;
        
        }
        }
         }
    return $count>0?true:false;
}
/**
 * 
 * @param string $email  user email to retrieve from database
  * @param string $table  database table to effect change
 * @param object $client  database instance
 * @return string
 */
}