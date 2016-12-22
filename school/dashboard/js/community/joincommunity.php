<?php

include '../config.php';


$response = array('result' => 'error', 'message' => 'eRRor');


/* if($_POST)
  { */
$communityid = filter_var($_POST['communityid'], FILTER_SANITIZE_STRING);
$memberid = filter_var($_POST['memberid'], FILTER_SANITIZE_STRING);


if (!empty($communityid) && !empty($memberid)) {
   
    
    $userCommunity->setId($memberid);
    
    if ($userCommunity->checkUser()) {     //Compiling Skill Set
        $communitycodes = $userCommunity->communitySet($communityid);

        $result = $client->update('userdeveloper_community', array("community" => $communitycodes, "lastupdate" => $date), "userid='$memberid'");
        if ($result) {
            $response = array('result' => 'success', 'message' => 'Updated Successfully');
        } else {
            $response = array('result' => 'error', 'message' => 'Failed to update.Please try again');
        }
    } else {

        $result = $client->insert("userdeveloper_community", array("userid" => $memberid, "community" => $communityid, "lastupdate" => $date, "date" => $date));

        if ($result) {
            $response = array('result' => 'success', 'message' => 'Updated Successfully');
        } else {
            $response = array('result' => 'error', 'message' => 'Failed to update.Please try again');
        }
    }
} else {
    // $rsponse['message']="$response_message[3]";
    $response = array('result' => 'error', 'message' => "Invalid details.Please try again");
}
//}
echo json_encode($response);
exit();

