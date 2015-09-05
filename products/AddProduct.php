<?php
session_start();

include_once('../connection.php');

if(isset($_REQUEST['title']) && isset($_REQUEST['price']) && isset($_REQUEST['location']))
{
    $title = $_REQUEST['title'];
    $price = $_REQUEST['price'];
    $location = $_REQUEST['location'];
    $description = $_REQUEST['description'];
    $currentBid = $_REQUEST['price'];

    $userId = $_SESSION['userid'];

    $sql = "INSERT INTO products(user_id,title,descriptions,base_price,current_bid,location)
            VALUES('$userId','$title','$description','$price','$currentBid','$location') ";
//    $query = mysqli_query($db_conx, $sql);
    if(mysqli_query($db_conx, $sql)){
        echo "success";
    }
    else{
        echo "failed";
    }

    exit();
}
