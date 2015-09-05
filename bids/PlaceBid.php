<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 2:03 PM
 */
include_once('../connection.php');
if(isset($_REQUEST['product_id']) && isset($_REQUEST['user_id']) && isset($_REQUEST['bid_price'])) {
    $product_id = @$_REQUEST["product_id"];
    $user_id = @$_REQUEST["user_id"];
    $bid_price = @$_REQUEST["bid_price"];

    $query = mysqli_query($db_conx,"SELECT base_price FROM products WHERE user_id =$user_id");
    $rs = mysqli_fetch_array($query) or die(mysqli_error($db_conx));
    if($bid_price > $rs['base_price']  ){
        $query1 = mysqli_query($db_conx, "INSERT INTO bids(product_id,user_id,bid_price) VALUES($product_id,$user_id,$bid_price)") or die(mysqli_error($db_conx));
    }
    else{
        echo "bid price should be higher than base price";
    }



}