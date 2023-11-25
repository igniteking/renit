<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
// Set the URL of the API you want to access
if (!empty($_GET['asset'])) {
    $asset_key = $_GET['asset'];
    $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_name LIKE '%$asset_key%'");
    while ($rows = mysqli_fetch_array($get_asset)) {
        $asset_name = $rows['asset_name'];
        echo '<p onclick="insert_value_asset(' . "'$asset_name'" . ' )">' . $asset_name . '</p>';
    }
}
