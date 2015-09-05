<?php

session_start();

$_SESSION = array();

session_destroy();

if(isset($_SESSION['userid'])){
    echo "logout failed";
}
else {
    echo "success";
    exit();
}
?>