<?php

session_start();

include_once('../connection.php');

if(isset($_REQUEST['userId']) && isset($_REQUEST['productId']))
{
    $userId = $_REQUEST['userId'];
    $productId = $_REQUEST['productId'];

//    if($userId != $_SESSION['userid']){
//        echo 'failed';
//        exit();
//    }

    $sql = "SELECT * FROM products WHERE id='$productId' ";
    $query = mysqli_query($db_conx, $sql);
    $p_check = mysqli_num_rows($query);

    if($p_check < 1){
        echo "product not exist";
        exit();
    }

    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

    print_r($row);
//    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
//
//    }

    exit();
}
else{
    echo "Input thik se de";
}