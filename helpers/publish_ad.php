<?php
include('../connections/connection.php');
include('../connections/functions.php');

$asset_id = $_GET['asset_id'];

if (mysqli_query($conn, "UPDATE `assets` SET `asset_condition`='active' WHERE id = '$asset_id'")) {
    Toast('black', 'Published Successfully ... ');
    refresh('./my_ad', 2);
} else {
    Toast('danger', 'Error Publishing ... ');
    refresh('./preview_page?asset_id=' . $asset_id . '', 2);
}
