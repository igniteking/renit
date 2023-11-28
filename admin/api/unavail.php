<?php
include("../connections/connection.php");
include("../connections/global.php");
include("../connections/functions.php");

// Include your database connection code here

// Query to select all users from the 'users' table
$query = "SELECT * FROM unavailability";

// Execute the query
$result = mysqli_query($conn, $query);

// Initialize an array to store user data
$users = array();

// Fetch data from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = array(
        $row['id'],
        $row['product_name'],
        $row['email'],
        $row['mobile'],
        array_values(mysqli_fetch_array(mysqli_query($conn, "SELECT category_name from `categories` WHERE `id` = '" . $row['categories'] . "'")))[0],
        array_values(mysqli_fetch_array(mysqli_query($conn, "SELECT category_name from `categories` WHERE `id` = '" . $row['sub_categories'] . "'")))[0],
        $row['location'],
        $row['details'],
        $row['created_at'],
        '<button onclick="delete_user(' . "'" . $row['id'] . "'" . ')" class="btn btn-danger">Delete</button>',
    );
}

// Create an array with a "data" key
$response = array("data" => $users);

// Set appropriate headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Return JSON response
echo json_encode($response);
