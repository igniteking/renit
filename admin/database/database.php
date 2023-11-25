<?php
include("../connections/connection.php");

$create_user_table = "CREATE TABLE IF NOT EXISTS user_data (
  created_at TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT,
  profile_picture TEXT(255) NOT NULL,
  user_code INT UNIQUE NOT NULL,
  user_email TEXT(255),
  user_name TEXT(255) NOT NULL,
  user_password TEXT(255) NOT NULL,
  user_type TEXT(255) NOT NULL
);
";

$create_wallet_table = "CREATE TABLE IF NOT EXISTS wallet (
  compound_wallet FLOAT NOT NULL,
  created_at TEXT(255) NOT NULL,
  extra_wallet FLOAT NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  widthrawl_wallet FLOAT NOT NULL
);

";
  

$create_rechare_request_table = "CREATE TABLE IF NOT EXISTS request_recharge (
  amount INT NOT NULL,
  created_at TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT,
  reverence_ss TEXT(255) NOT NULL,
  status TEXT(255) NOT NULL,
  user_id INT NOT NULL
);
";

$conn->query($create_user_table);
$conn->query($create_wallet_table);
$conn->query($create_rechare_request_table);

if (mysqli_query($conn, $create_user_table) and mysqli_query($conn, $create_wallet_table) and mysqli_query($conn, $create_rechare_request_table)) {
  echo "TABLE CREATED SUCCESSFULLY";
} else {
  echo "TABLE CREATED UNSUCCESSFULLY";
}
