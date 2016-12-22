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

}
