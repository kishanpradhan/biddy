<?php
session_start();

include_once('../connection.php');

if(isset($_REQUEST['userId']) && isset($_REQUEST['productId']))
{
    $userId = $_REQUEST['userId'];
    $productId = $_REQUEST['productId'];

    if($userId != $_SESSION['userid']){
        echo 'faileddd';
        exit();
    }

    $title = $_REQUEST['title'];
    $price = $_REQUEST['price'];
    $location = $_REQUEST['location'];
    $description = $_REQUEST['description'];

    echo $userId.' '.$productId.' '.$title.' '.$price.' '.$description.' '.$location.' ';

    $sql = "UPDATE products SET title='$title',base_price=$price,location='$location',descriptions='$description' WHERE id=$productId ";
    echo $sql;
//    $query = mysqli_query($db_conx, $sql);
    if(mysqli_query($db_conx, $sql)){
        echo "success";
    }
    else{
        echo "failed";
    }

    exit();

}