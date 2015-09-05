<?php

include_once('../connection.php');
include_once('FileUpload.php');

if(isset($_REQUEST['title']) && isset($_REQUEST['price']) && isset($_REQUEST['location']))
{
    $title = preg_replace('#[^a-z0-9]#i', '', $_REQUEST['title']);
    $price = preg_replace('#[^0-9]#i', '',$_REQUEST['price']);
    $location = $_REQUEST['location'];
    $description = $_REQUEST['description'];
    $currentBid = preg_replace('#[^0-9]#i','',$_REQUEST['price']);
    $file = $_FILES["photo"];

    $result = uploadFile($file);
    if($result[0] == "failed"){
        echo $result[1];
        exit();
    }
    $image_url = $result[1];

    $userId = $_SESSION['userid'];

    $sql = "INSERT INTO products(user_id,title,descriptions,base_price,current_bid,location,image_url)
            VALUES('$userId','$title','$description','$price','$currentBid','$location','$image_url') ";
//    $query = mysqli_query($db_conx, $sql);
    if(mysqli_query($db_conx, $sql)){
        echo "success";
    }
    else{
        echo "failed";
    }

    exit();
}
