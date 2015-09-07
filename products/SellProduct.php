<?php

include_once('../connection.php');

if(isset($_REQUEST['userId']) && isset($_REQUEST['productId']))
{
    $userId = $_REQUEST['userId'];
    $productId = $_REQUEST['productId'];

    $sql = "UPDATE products SET status='sold' WHERE id='$productId' AND user_id='$userId' ";
    if(mysqli_query($db_conx, $sql)){

        echo "success";
    }
    else {
        echo "failed";
    }
    exit();
}