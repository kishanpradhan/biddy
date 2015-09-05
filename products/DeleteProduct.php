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

    $sqlbid = "DELETE FROM bids WHERE product_id='$productId' ";

    if(mysqli_query($db_conx, $sqlbid)){
//        echo "success";
    }
    else{
        echo "failedd";
        exit();
    }

    $sqlproduct = "DELETE FROM products WHERE id='$productId' AND user_id='$userId' ";

    if(mysqli_query($db_conx, $sqlproduct)){
        echo "success";
    }
    else{
        echo "failed";
        exit();
    }

}