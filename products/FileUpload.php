<?php

function uploadFile($file,$uid){

    $fileName = $file["name"];

    $fileTmpLoc = $file["tmp_name"];
//    $fileType = $file["type"];
//    $fileSize = $file["size"];
//    $fileErrorMsg = $file["error"];
//    $kaboom = explode(".", $fileName);
//    $fileExt = end($kaboom);
    $db_file_name = date("DMjGisY")."".rand(1000,9999).".".$fileName;
//    return ['jj',$db_file_name];

    list($width, $height) = getimagesize($fileTmpLoc);
    if($width < 10 || $height < 10){
        return ["failed","That image has no dimensions"];
        exit();
    }

//    if($fileSize > 1048576) {
//        return ["failed","Your image file was larger than 1mb"];
//        exit();
//    }
//    else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName) ) {
//        return ["failed","Your image file was not jpg, gif or png type"];
//        exit();
//    }
//    else if ($fileErrorMsg == 1) {
//        return ["failed","An unknown error occurred"];
//        exit();
//    }

//    if(isset($_SESSION['userid'])) {
//        $uid = $_SESSION['userid'];
//    }
//    else{
//        return ["failed","session failed"];
//    }
    $url = "users/$uid/$db_file_name";
//    return ["failed",$url];
    $moveResult = move_uploaded_file($fileTmpLoc, "../$url");

    if ($moveResult != true) {
        return ['failed',"not moved"];
        exit();
    }

    return ['success',$url];
}

function uploadPhoto($file,$uid){
//    echo $file;
    $imageData = base64_decode($file); // <-- **Change is here for variable name only**
    echo $imageData;
    $photo = imagecreatefromstring($imageData);

    $fileName = date("DMjGisY")."".rand(1000,9999);
//    $uid = $_SESSION['userid'];
//    $uid = 7;

    imagejpeg($photo,'../users/'.$uid.'/'.$fileName.'.jpg',100);

    return 'users/'.$uid.'/'.$fileName.'.jpg';
}