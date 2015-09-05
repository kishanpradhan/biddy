<?php
session_start();

include_once('../connection.php');

if(isset($_REQUEST['userId']) && isset($_REQUEST['productId']))
{
    $userId = $_REQUEST['userId'];
    $productId = $_REQUEST['productId'];

    if($userId != $_SESSION['userid']){
        echo 'failed';
        exit();
    }

    $title = $_REQUEST['title'];
    $price = $_REQUEST['price'];
    $location = $_REQUEST['location'];
    $description = $_REQUEST['description'];

    $sql = "UPDATE products SET title='$title',price='$price',location='$location',description='$description' WHERE id='$productId' ";

    if(mysqli_query($db_conx, $sql)){
        echo "success";
    }
    else{
        echo "failed";
    }

    exit();

}