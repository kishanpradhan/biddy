<?php

include_once('../connection.php');

if(isset($_REQUEST['userId']) && isset($_REQUEST['productId']))
{
    $userId = $_REQUEST['userId'];
    $productId = $_REQUEST['productId'];

    if($userId != $_SESSION['userid']){
        echo 'failed';
        exit();
    }

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

if(isset($_REQUEST['userId']))
{

    $userId = $_REQUEST['userId'];

    $sql = "SELECT * FROM products WHERE user_id='$userId' ";
    $query = mysqli_query($db_conx,$sql);
    $check = mysqli_num_rows($query);

    if($check < 1){
        echo "No products found";
        exit();
    }

    $result = [];

    while($row = mysqli_fetch_assoc($query)) {
//        foreach ($row as $key => $value) {
//            echo $key . ' ' . $value;
//        }
        array_push($result,$row);
    }

    print_r($result);
}