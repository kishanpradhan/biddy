<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 1:53 PM
 */
include_once('../connection.php');
if(isset($_REQUEST['email']) && isset($_REQUEST['pass'])){                    #submit change
    $email   = @$_REQUEST["email"];                  #name change
    $passwd = @$_REQUEST["pass"];                        #name change
    $sql = mysqli_query($db_conx,"SELECT * FROM users where email = $email AND password = $passwd"); #table change
    while($rs = mysqli_fetch_array($sql)){
    if($rs["user"] == $email && $rs["passwd"] == $passwd ){  #name change
     $_SESSION["user"] = $email;
     echo "success";
    }
    else
        echo "failure";
}
}