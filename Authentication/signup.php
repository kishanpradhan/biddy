<?php
include_once('../connection.php');

if(isset($_REQUEST['email']) && isset($_REQUEST['pass']))
{
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];

    //$pass = md5($pass); will do later

    //validate inputs here

    $sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $userCheck = mysqli_num_rows($query);

    if($userCheck > 0){
        return "Email already exits";
        exit();
    }

    $sql = "INSERT INTO users (email, password) VALUES('$email','$pass') ";
    $query = mysqli_query($db_conx, $sql);
    $uid = mysqli_insert_id($db_conx);

    if (!file_exists("../users/$uid")) {
        mkdir("../users/$uid", 0755);
    }

    session_start();
    $_SESSION['userid'] = $uid;
//    $result = "{'uid':".$uid."}";
//    return json_decode($result);
    echo $uid;

}