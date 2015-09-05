<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 1:53 PM
 */
include_once('../connection.php');
if(isset($_REQUEST['email']) && isset($_REQUEST['pass'])){                    #submit change
    $email  = @$_REQUEST["email"];                  #name change
    $passwd = @$_REQUEST["pass"];                        #name change
    $query = mysqli_query($db_conx,"SELECT * FROM users where email = $email AND password = $passwd") or die(mysqli_error()); #table change
    $rs = mysqli_fetch_array($query) or die(mysqli_error());
    if(!empty($rs["user"])  && !empty($rs["passwd"])){  #name change
     $_SESSION["user"] = $email;
     echo "success";
    }
    else
        echo "failure";

}