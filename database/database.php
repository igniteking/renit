<?php
include("../connections/connection.php");

$create_user_table = "CREATE TABLE IF NOT EXISTS user_data (
  created_at TEXT(255),
  id INT PRIMARY KEY AUTO_INCREMENT,
  profile_picture TEXT(255),
  user_email TEXT(255),
  user_location TEXT(255) NOT NULL,
  user_name TEXT(255) NOT NULL,
  user_password TEXT(255) NOT NULL,
  user_type TEXT(255) NOT NULL
);
";

$create_category_table = "CREATE TABLE IF NOT EXISTS sub_categories (
  category_description TEXT(255) NOT NULL,
  category_image TEXT(255) NOT NULL,
  category_name TEXT(255),
  created_at TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT
);
";

$create_subcategory_table = "CREATE TABLE IF NOT EXISTS categories (
  category_description TEXT(255) NOT NULL,
  category_image TEXT(255) NOT NULL,
  category_name TEXT(255),
  created_at TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT
);
";


$create_assets_table = "CREATE TABLE IF NOT EXISTS assets (
  asset_brand TEXT(255) NOT NULL,
  asset_by_address TEXT(255) NOT NULL,
  asset_by_area TEXT(255) NOT NULL,
  asset_by_name TEXT(255) NOT NULL,
  asset_by_number TEXT(255) NOT NULL,
  asset_category INT NOT NULL,
  asset_description TEXT(255) NOT NULL,
  asset_images TEXT(255) NOT NULL,
  asset_location TEXT(255) NOT NULL,
  asset_model TEXT(255) NOT NULL,
  asset_name TEXT(255) NOT NULL,
  asset_price DOUBLE NOT NULL,
  asset_sub_category INT NOT NULL,
  asset_thumbnail TEXT(255) NOT NULL,
  asset_useage_description TEXT(255) NOT NULL,
  asset_user INT NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT
);
";

$create_message_table = "CREATE TABLE IF NOT EXISTS message (
  asset_id INT NOT NULL,
  date TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT,
  message TEXT(255) NOT NULL,
  message_type TEXT(255) NOT NULL,
  receiver_id INT NOT NULL,
  sender_id INT NOT NULL,
  status BOOLEAN NOT NULL
);
";

$create_chat_table = "CREATE TABLE IF NOT EXISTS Chat_link (
  chat_asset_id INT NOT NULL,
  chat_owner_id INT NOT NULL,
  chat_reciever_id INT NOT NULL,
  date TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT
);
";

$create_review_table = "CREATE TABLE IF NOT EXISTS review (
  asset_id INT NOT NULL,
  content TEXT(255) NOT NULL,
  created_at TEXT(255) NOT NULL,
  id INT PRIMARY KEY AUTO_INCREMENT,
  stars INT NOT NULL,
  user_id INT NOT NULL
);";





$conn->query($create_user_table);
$conn->query($create_category_table);
$conn->query($create_subcategory_table);
$conn->query($create_assets_table);
$conn->query($create_message_table);
$conn->query($create_chat_table);
$conn->query($create_review_table);

if (mysqli_query($conn, $create_user_table) and mysqli_query($conn, $create_category_table) and mysqli_query($conn, $create_subcategory_table) and mysqli_query($conn, $create_assets_table) and mysqli_query($conn, $create_chat_table) and mysqli_query($conn, $create_message_table)  and mysqli_query($conn, $create_review_table)) {
  echo "TABLE CREATED SUCCESSFULLY";
} else {
  echo "TABLE CREATED UNSUCCESSFULLY";
}
