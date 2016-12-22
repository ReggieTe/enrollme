<?php

class Upload 
{
    
public static function getProjectFile($dealid, $domainpath, $client) {
    $path = null;
    $clientdocumentpath = "../../application/clients/" . getQuotationDetails($client)[0]['clientid'] . "/document/$dealid/document$dealid.pdf";
    echo is_file($clientdocumentpath) ? "<a href='$domainpath" . str_replace("../../", "", $clientdocumentpath) . "'><i class='fa fa-file'></i> Project Requirements.pdf</a>" : '';
    ;
}

public static function File($id, $key,$folder, $filetype, $ext) {

    $filename = RELATIVEFILEPATH."$id/$folder/$filetype$key.$ext";

    return FileHandler::uploadContent($_FILES['img']['tmp_name'], $filename);
}

public static function UploadAppSlideFile($id, $appid, $filetype, $ext) {
    
    Upload::createFolder($id, $appid);
    $filename = RELATIVEFILEPATH."$id/content/$appid/images/$filetype$appid.$ext";

    return FileHandler::uploadContent($_FILES['img']['tmp_name'], $filename);
}
 

public static function UpdateAppApk($id, $appid, $oldappname, $newappname) {

    $path = RELATIVEFILEPATH."$id/content/$appid/content/";
    $oldname = $path . strtolower($oldappname) . ".apk";
    $newname = $path . strtolower($newappname) . ".apk";


    return is_file($oldname) ? rename($oldname, $newname) : false;
}

public static function projectSetUp($id, $appid,$appname, $filetype, $ext, $client) {
    //location to upload file to
    $path = RELATIVEFILEPATH."$id/content/$appid/content/";
    //location to retrieve file from
    $pathTempFile = "../../000uploads/";
    //retriving file name
    $appname = strtolower($appname).".$ext";
    $localFile = $_FILES['fileapk']['tmp_name'];
    $remotefile = $appname;
    //Check for folder to upload apk
    if (is_dir($path)) {

        if (Upload::uploadApk($localFile, $remotefile)) {

            $relativepath = $pathTempFile . $remotefile;
            $filename = $path . $appname;

            return copy($relativepath, $filename) ? unlink($relativepath) ? true : false : false;
        }
    } else {
        //Create the folder and recall the function to upload apk
        Upload::createFolder($id, $appid);
        
        return Upload::projectSetUp($id, $appid,$appname,$filetype, $ext, $client);
    }
}

public static function uploadApk($file, $remotefile) {
    $relativepath = "../../000uploads/$remotefile";

    copy($file, $relativepath);
    return true;
    /*
      $ftp_server="ftp.myapps.co.zw";
      $ftp_user_pass="gigofifo123!@#";
      $ftp_user_name="000uploads@myapps.co.zw";
      $remote_file=$remotefile;
      $conn_id = ftp_connect($ftp_server);


      $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);// login with username and password


      if (ftp_put($conn_id, $remote_file,$file,  FTP_BINARY))// upload a file
      {
      ftp_close($conn_id);// close the connection
      return true;
      }
      else
      {
      ftp_close($conn_id);// close the connection
      return false;
      } */
}

public static function createFolder($id = null, $appid = null) {
    if ($id != null && $appid != null) {
        $path = RELATIVEFILEPATH."$id/content/$appid";

        $userFilesToCreate = array(
            "main" => $path,
            "images" => $path . "/images",
            "content" => $path . "/content"
        );
        foreach ($userFilesToCreate as $key => $value) {
            FileHandler::createDir($value);
        }
        return true;
    } else {
        return false;
    }
}

public static function deleteFiles($id = null, $key = null,$type='app') 
{
  if ($id != null && $key != null)
  {
      if($type=='app')
      {//delete file in main images folder
          $path = RELATIVEFILEPATH."$id/images/app$key.png";
          FileHandler::deleteSingleFiles($path);
          //app type:android
      $path = RELATIVEFILEPATH."$id/content/$key";
      FileHandler::iterateDir($path);
      //Run thru files and deleting contents
  $pathToClean = RELATIVEFILEPATH."$id/content/";
   //FileHandler::cleanDir($pathToClean, getAllUserAppCodes($client));
  //FileHandler::cleanDir($path);

      }
      else{
//app type:others
  $path = RELATIVEFILEPATH."$id/images/app$key.png";
  FileHandler::deleteSingleFiles($path);
      }
  
 
  return true;
  } else {
  return false;
  }
  } 


}

