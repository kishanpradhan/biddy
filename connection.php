<?php

$db_conx = mysqli_connect("localhost", "root", "kishan", "biddy");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}