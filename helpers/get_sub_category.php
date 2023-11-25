<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
echo '<option value="">Please Select</option>';
$asset_category = $_GET['asset_category'];
$get_categories = mysqli_query($conn, "SELECT * FROM `sub_categories` WHERE `category_id` = '$asset_category'");
while ($rows = mysqli_fetch_array($get_categories)) {
    $sub_category_id = $rows["id"];
    $sub_category_name = $rows["sub_category_name"];
    echo '<option value="' . $sub_category_id  . '">' . $sub_category_name . '</option>';
}
