<?php

function uploadFile($file){

    $fileName = $file["name"];
    $fileTmpLoc = $file["tmp_name"];
    $fileType = $file["type"];
    $fileSize = $file["size"];
    $fileErrorMsg = $file["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);
    $db_file_name = date("DMjGisY")."".rand(1000,9999).".".$fileExt; // WedFeb272120452013RAND.jpg

    list($width, $height) = getimagesize($fileTmpLoc);
    if($width < 10 || $height < 10){
        return ["failed","That image has no dimensions"];
        exit();
    }

    if($fileSize > 1048576) {
        return ["failed","Your image file was larger than 1mb"];
        exit();
    }
    else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName) ) {
        return ["failed","Your image file was not jpg, gif or png type"];
        exit();
    }
    else if ($fileErrorMsg == 1) {
        return ["failed","An unknown error occurred"];
        exit();
    }

    if(isset($_SESSION['userid'])) {
        $uid = $_SESSION['userid'];
    }
    else{
        return ["failed","session failed"];
    }
    $url = "users/$uid/$db_file_name";
//    return ["failed",$url];
    $moveResult = move_uploaded_file($fileTmpLoc, "../$url");

    if ($moveResult != true) {
        return ['failed',"not moved"];
        exit();
    }

    return ['success',$url];
}