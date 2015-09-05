<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 2:03 PM
 */
include_once('../connection.php');
if(isset($_REQUEST['product_id']) && isset($_REQUEST['user_id']) && isset($_REQUEST['bid_price'])) {
    $id= $_SESSION['id'];      #submit change
    $product_id = @$_REQUEST["product_id"];                  #name change
    $user_id = @$_REQUEST["user_id"];
    $bid_price = @$_REQUEST["bid_price"];                        #name change
    $query = mysqli_query($db_conx, "INSERT INTO bids VALUES($id,$product_id,$user_id,$bid_price) ") or die(mysqli_error()); #table change

}