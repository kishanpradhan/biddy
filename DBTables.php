<?php

include_once('connection.php');

$sqluser = "CREATE TABLE IF NOT EXISTS users (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50),
        password VARCHAR(50)
        )";

if (mysqli_query($db_conx, $sqluser)) {
    echo "Table users was created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($db_conx);
}

$sqlproduct = "CREATE TABLE IF NOT EXISTS products (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(10) UNSIGNED NOT NULL,
        title VARCHAR(50),
        descriptions text,
        status VARCHAR(50) DEFAULT 'stock',
        base_price INT(10),
        current_bid INT(10),
        location VARCHAR(50),
        FOREIGN KEY(user_id) REFERENCES users(id)
        )";

if (mysqli_query($db_conx, $sqlproduct)) {
    echo "Table products was created successfully</br>";
} else {
    echo "Error creating table: " . mysqli_error($db_conx);
}

$sqlbid = "CREATE TABLE IF NOT EXISTS bids (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_id INT(10) UNSIGNED NOT NULL,
        user_id INT(10) UNSIGNED NOT NULL,
        bid_price INT(10) NOT NULL,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (user_id) REFERENCES users(id)
        )";

if (mysqli_query($db_conx, $sqlbid)) {
    echo "Table bids was created successfully</br>";
} else {
    echo "Error creating table: " . mysqli_error($db_conx);
}