<?php

include_once('../connection.php');

if(isset($_REQUEST['product_id']) && isset($_REQUEST['user_id']) && isset($_REQUEST['bid_price'])) {

    $product_id = @$_REQUEST["product_id"];
    $user_id = @$_REQUEST["user_id"];
    $bid_price = @$_REQUEST["bid_price"];

    $query = mysqli_query($db_conx,"SELECT base_price,current_bid FROM products WHERE id ='$product_id' LIMIT 1");
    $rs = mysqli_fetch_array($query) or die(mysqli_error($db_conx));

    if($bid_price > $rs['base_price']  ){
        $query1 = mysqli_query($db_conx, "INSERT INTO bids(product_id,user_id,bid_price) VALUES($product_id,$user_id,$bid_price)") or die(mysqli_error($db_conx));

        if($bid_price > $rs['current_bid']) {
            $query2 = mysqli_query($db_conx, "UPDATE products SET current_bid='$bid_price' WHERE id='$product_id'");

        }

        echo "success";
    }
    else{
        echo "bid price should be higher than base price";
    }



}