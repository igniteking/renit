<?php
include("../connections/connection.php");
include("../connections/global.php");
include("../connections/functions.php");

$user_id = $_GET['user_id'];
$delete = mysqli_query($conn, "DELETE FROM `user_data` WHERE id = '$user_id'");

if ($delete) {
    echo "success";
} else {
    echo "error";
}
