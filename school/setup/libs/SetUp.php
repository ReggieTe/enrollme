<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SetUp
 *
 * @author Reggie Te
 */
class SetUp {
    //put your code here
   private $_client;
   
public function __construct($client) {
       $this->_client=$client;
   }

public static function setUpUser($totalCount=0,$completed=0,$stage=  array())
{
foreach ($stage as $value) {
    $totalCount++;
    if(!empty($value))
    {
        $completed++;
    }
}
return (($completed/$totalCount)*100);
}

public function getUserApps()
{
    $counter=0;
$result = $this->_client->select("Select * FROM app WHERE id=:id ",array(':id'=>  Session::get('usercodeid')));
foreach ($result as $key => $value) {
   $counter++;
}
return $counter;  
}

public function userAllSkills($skill)
{
    $counter=0;
$result = $this->_client->select("Select * FROM skills_parent ");
foreach ($result as $key => $value) {
    if (in_array($value['id'], $skill->setToMixMain($this->_client))) {
        $counter=$counter+  $this->UserSkillsCount($value['id'],$skill);
    }
}
return $counter;
}

public function UserSkillsCount($id=null,$skill=null) {
    $counter=0;
    $result=$this->_client->select("Select * FROM skills where skill_parent=:id",array(":id"=>$id));
    
    foreach ($result as $key => $value) {
//$counter++;
        ///
       if(in_array($value['id'], $skill->setToMix($this->_client)))
       {$counter++;}  
       
        
    }
    return $counter;
}

//echo UserSkillsCount($client);
}
