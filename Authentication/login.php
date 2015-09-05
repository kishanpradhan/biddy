<?php

include_once('../connection.php');

if(isset($_REQUEST['email']) && isset($_REQUEST['pass'])){                    #submit change

    $email  = @$_REQUEST["email"];  #name change
    $passwd = @$_REQUEST["pass"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd'";               #name change
    $query = mysqli_query($db_conx,$sql) or die(mysqli_error($db_conx));  #table change
    $rs = mysqli_num_rows($query) or die(mysqli_error($db_conx));

    $result = mysqli_fetch_assoc($query);
    $uid = $result['id'];

    if($rs==1){  #name change
        $_SESSION["email"] = $email;
        $_SESSION['userid'] = $uid;
         echo $uid;
    }
    else {
        echo "failure";
    }
}
