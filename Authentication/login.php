<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 1:53 PM
 */
include_once('../connection.php');
if(isset($_REQUEST['email']) && isset($_REQUEST['pass'])){                    #submit change
    $email  = @$_REQUEST["email"];  #name change
    $passwd = @$_REQUEST["pass"];
       $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd'";               #name change
    $query = mysqli_query($db_conx,$sql) or die(mysqli_error($db_conx));  #table change
    $rs = mysqli_num_rows($query) or die(mysqli_error($db_conx));
    if($rs==1){  #name change
     $_SESSION["email"] = $email;
     echo "success";
    }
    else {
        echo "failure";
    }
}
