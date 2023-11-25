<?php
include("../connections/connection.php");
include("../connections/global.php");
include("../connections/functions.php");

$user_id = $_GET['product_id'];
$delete = mysqli_query($conn, "DELETE FROM `assets` WHERE id = '$user_id'");

if ($delete) {
    echo "success";
} else {
    echo "error";
}
