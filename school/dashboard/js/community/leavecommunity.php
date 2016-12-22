<?php

include '../config.php';

$response = array('result' => 'error', 'message' => 'eRRor');


/*if($_POST)
{*/
$communityid=filter_var($_POST['communityid'],FILTER_SANITIZE_STRING);    
$memberid=filter_var($_POST['memberid'],FILTER_SANITIZE_STRING);
    
 
if (!empty($communityid)&& !empty($memberid)) {
     
    $userCommunity->setId($memberid);
    
    if ($userCommunity->checkUser()) {  
        //Compiling Skill Set
        $communitycodes = $userCommunity->communityRemove($communityid);
        
    $result = $client->update('userdeveloper_community', array("community" => $communitycodes, "lastupdate" => $date), "userid='$memberid'");
       
    if ($result) {
            
            $response = array('result' => 'success', 'message' =>'Community Removed');
            
        } else {
            $response = array('result' => 'error', 'message' => 'Failed to update.Please try again');
        }
        
    }
} else
{
    
    $response = array('result' => 'error', 'message' => "Failed to remove.Please try again");
}
//}
echo json_encode($response);
exit();

