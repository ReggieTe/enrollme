<?php
/**
 * Description of textFormatter
 *
 * @author Reggie Te
 */
class textFormatter {
    //put your code here
    
    public static function notification($message=null,$type='alert-danger') {
    if (isset($message)) {
        print('<div class="col-md-12"> <div class="alert '.$type.' col-md-12"> 
               <a href="#" class="close" data-dismiss="alert"> &times; </a>
                 ' . $message . ' </div></div>');
    }
    }
    public static function notificationMessage($message='',$domainpath='', $type='alert-danger') {
    if (isset($message)) {
        print(' <div class="alert alert-' . $type . ' alert-dismissable ">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <a href="'. $domainpath .'developers/dashboard/profileedit" class="btn btn-xs btn-primary">Add ' . $message . '  <span class="fa fa-plus"></span></a>  
                                           <br><small>Complete your profile !!</small>
                                    </div>');
    }
}
    public static function sortHelpStatus($status)
    {
     
        return $status==1?'Closed':'Open';
     
    }
    public static function membersJoined($number,$link=null) {
if (isset($number)) {
print'  <li>
    <a href="'.$link.'">
    <i class="ion ion-ios7-people info"></i>'.$number.' new members joined today
      </a></li>';
}
}

public static function walletBalance($balance,$link=null)
{
    if (isset($balance)) {
        print' <li><a href="'.$link.'">
              <i class="fa fa-money danger"></i> Wallet Balance Now $'.$balance.'</a>
           </li>';
    }
}
public static function Help($text,$link=null)
{
    if (isset($text)) {
        print' <li>
          <a href="'.$link.'">
        <i class="fa fa-users warning"></i> '.$text.' Help
          </a></li>';
    }
}

public static function simpleText($display='',$text='',$link=null)
{
    if (empty($display)) {
        return'
          <a href="'.$link.'"> '.$text.' </a>';
    }
    else
    {
        return $display;
    }
}
public static function convertToArray($string=array()) {
    $skillPlate = array();
    $skillPlate = explode(",", $string);
    return $skillPlate;
}
public static function convertArrayToString($array = array()) {
    return !empty($array) ? implode(",", $array) : '';
}

public static function convertStringToArray($string, $delimiter = ",") {
    return !empty($string) ? explode($delimiter, $string) : array('0', '1');
}

public static function status($status=0) {
    return $status == 0 ? "Open" : "Closed";
}
public static function description($word=null,$maxWords=25) {
    return empty($word) ? "No description Available" : substr($word, 0, $maxWords);
}
public static function keyGen() {  //Random code generator
    $letters = array("a", "b", "c", "d", "e", "f", "g", "h", "j", "k", "l", "n", "m", "i", "o", "p", "q", "w", "r", "t", "y", "u", "s", "z", "x");
    $numbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $letter = rand(0, 24);
    $letter1 = rand(0, 24);
    $letter2 = rand(0, 24);
    $letter3 = rand(0, 24);
    $num2 = rand(0, 9);
    $num3 = rand(0, 9);
    $num4 = rand(0, 9);
    $num5 = rand(0, 9);
    $num6 = rand(0, 9);
    $num7 = rand(0, 9);
    $num8 = rand(0, 9);
    $num9 = rand(0, 9);
    $code = "$letters[$letter]$letters[$letter1]$numbers[$num2]$numbers[$num3]$numbers[$num4]$numbers[$num5]$numbers[$num6]$numbers[$num7]$numbers[$num8]$numbers[$num9]$letters[$letter2]$letters[$letter3]";
$code= substr(md5($code), 0, 20); 

    return $code;
}

public static function sortDate($date, $sign="/") {
    $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "Septmber", "October", "November", "December");
    $dateFragements = array();
    $dateFragements = explode($sign, $date);
    return $sign == "-" ? "$dateFragements[0]" . " " . $months[(int) $dateFragements[1]] . " 20" . $dateFragements[2] : "$dateFragements[2]" . " " . $months[(int) $dateFragements[1]] . " " . $dateFragements[0];
}

// Will return the number of days between the two dates passed in
public static function countDays($b) {
    // First we need to break these dates into their constituent parts:
    $a = getdate(strtotime(date('m/d/y h:m:s')));
    $b = getdate(strtotime($b));

    // Now recreate these timestamps, based upon noon on each day
    // The specific time doesn't matter but it must be the same each day
    $a_new = mktime(12, 0, 0, $a['mon'], $a['mday'], $a['year']);
    $b_new = mktime(12, 0, 0, $b['mon'], $b['mday'], $b['year']);

    // Subtract these two numbers and divide by the number of seconds in a
    //  day.  Round the result since crossing over a daylight savings time
    //  barrier will cause this time to be off by an hour or two.
    return round(abs($a_new - $b_new) / 86400);
}



}
