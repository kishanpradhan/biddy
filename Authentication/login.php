<?php
/**
 * Created by PhpStorm.
 * User: kishan
 * Date: 5/9/15
 * Time: 1:53 PM
 */
include_once('../connection.php');
if(isset($_POST["submit"])){ #submit change
    $email   = @$_POST["email"]; #name change
    $passwd = @$_POST["pwd"];#name change
    $sql = mysqli_query($db_conx,"SELECT * FROM users"); #table change
    while($rs = mysqli_fetch_array($sql)){
    if($rs["user"] == $email && $rs["passwd"] == $passwd ){  #name change
     $_SESSION["user"] = $email;
     header('location:');   #inser redirect page
    }
    else
        echo "failure";
}
}