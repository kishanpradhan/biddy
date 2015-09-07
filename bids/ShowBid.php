<?php

include_once('../connection.php');

if(isset($_REQUEST['userId']))
{
    $userId = $_REQUEST['userId'];

//    if($userId != $_SESSION['userid']){
//        echo "not logged in";
//        exit();
//    }

    $sql = "SELECT p.id,p.user_id, p.title, p.descriptions, p.location, p.base_price, p.current_bid, p.image_url FROM bids b, products p WHERE b.product_id = p.id AND b.user_id = '$userId' ";
//    echo $sql;
//    $sql = "SELECT * FROM bids WHERE user_id='$userId' ";
    $query = mysqli_query($db_conx, $sql);
    $check = mysqli_num_rows($query);

    if($check < 1){
        echo "No bids found";
        exit();
    }

    $result = [];

    while($row = mysqli_fetch_assoc($query)) {

        array_push($result,$row);
    }
    $result = json_encode($result);

    header('Content-Type: application/json');
    echo $result;

    exit();

}
