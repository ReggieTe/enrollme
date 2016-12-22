<?php

class Upload {

    public static function RotateStudentImage($key = null, $degrees = 0) {
        if ($key != null) {
            $imageLocation = RELATIVEFILEPATH . Session::get('usercodeid') . "/images/child$key.png";
            if (is_file($imageLocation)) {

                return Image::rotate($imageLocation, $degrees);
            } else {
                ;
                return false;
            }
        } else {
            return false;
        }
    }

    public static function Copyright($key = null) {
        if ($key != null) {
            $watermakLocation = RELATIVEFILEPATH . Session::get('usercodeid') . "/images/watermark" . Session::get('usercodeid') . ".png";
            if (is_file($watermakLocation)) {
                $watermakLocation = RELATIVEFILEPATH . Session::get('usercodeid') . "/images/watermark" . Session::get('usercodeid') . ".png";
            } else {

                $watermakLocation = "../../public/img/watermark.png";
            }
            $imageLocation = RELATIVEFILEPATH . Session::get('usercodeid') . "/images/child$key.png";

            return Image::watermark($imageLocation, $watermakLocation, $imageLocation);
        } else {
            return false;
        }
    }

    public static function studentImage() {
        return "<img src='" . URL . Upload::trimSlashes(RELATIVEFILEPATH) . Session::get('usercodeid') . "/images/child" . Session::get('currentStudentId') . ".png' class='img-responsive' alt='Student Image' />";
    }

    public static function getStudentFile($dealid, $clientid) {
        $path = null;
        $clientdocumentpath = "../../childlication/clients/" . $clientid . "/document/$dealid/document$dealid.pdf";
        echo is_file($clientdocumentpath) ? "<a href='" . URL . str_replace("../../", "", $clientdocumentpath) . "'><i class='fa fa-file'></i> Student Requirements.pdf</a>" : '';
        ;
    }

    public static function File($file, $key, $folder, $filetype, $ext) {
        $id=  Session::get('usercodeid');
        $filename = RELATIVEFILEPATH . "$id/$folder/$filetype$key.$ext";
        FileHandler::createFolders($id);
        return FileHandler::uploadContent($file, $filename);
    }

    
    public static function createFolder($id = null, $childid = null) {
        if ($id != null && $childid != null) {
            $path = RELATIVEFILEPATH . "$id/content/$childid";

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

    public static function deleteFiles($id = null, $key = null, $type = 'child') {
        if ($id != null && $key != null) {
            if ($type == 'child') {//delete file in main images folder
                $path = RELATIVEFILEPATH . "$id/images/child$key.png";
                FileHandler::deleteSingleFiles($path);
                //child type:android
                $path = RELATIVEFILEPATH . "$id/content/$key";
                FileHandler::iterateDir($path);
                //Run thru files and deleting contents
                $pathToClean = RELATIVEFILEPATH . "$id/content/";
                //FileHandler::cleanDir($pathToClean, getAllUserStudentCodes($client));
                //FileHandler::cleanDir($path);
            } else {
//child type:others
                $path = RELATIVEFILEPATH . "$id/images/child$key.png";
                FileHandler::deleteSingleFiles($path);
            }


            return true;
        } else {
            return false;
        }
    }

    public static function trimSlashes($path, $slashes = "../../") {
        return str_replace($slashes, "", $path);
    }

}
