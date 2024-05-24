<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
$user_id = $_GET['user_id'];
$asset_id = $_GET['asset_id'];
$type = $_GET['type'];
$created_at = date("Y-m-d H:i:s");
$state = @$_GET['state'];
if (@$state == 'button') {
    if ($type == 'add') {

        $add_bookmark = mysqli_query($conn, "INSERT INTO `bookmark`(`id`, `user_id`, `asset_id`, `created_at`) VALUES (NULL,'$user_id','$asset_id','$created_at')");

        if ($add_bookmark) {
            Toast('black', 'Bookmark has been created successfully ...');
            echo '<div id="notify">
            <button type="button" title="Wishlist" hx-get="./helpers/bookmark?state=button&&type=remove&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify"><i class="fas fa-check"></i>bookmarked</button>
            </div>';
        } else {
            Toast('danger', 'Error creating bookmark ...');
        }
    } else {
        $remove_bookmark = mysqli_query($conn, "DELETE FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'");

        if ($remove_bookmark) {
            Toast('danger', 'Bookmark has been removed successfully ...');
            echo '<div id="notify">
            <button type="button" title="Wishlist" hx-get="./helpers/bookmark?state=button&&type=add&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify"><i class="fas fa-heart"></i>bookmark</button>
            </div>';
        } else {
            Toast('danger', 'Error removing bookmark ...');
        }
    }
} else {
    if ($type == 'add') {

        $add_bookmark = mysqli_query($conn, "INSERT INTO `bookmark`(`id`, `user_id`, `asset_id`, `created_at`) VALUES (NULL,'$user_id','$asset_id','$created_at')");

        if ($add_bookmark) {
            Toast('black', 'Bookmark has been created successfully ...');
            echo '<button type="button" title="Wishlist" hx-get="./helpers/bookmark?type=remove&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify' . $asset_id . '" class="fas fa-heart"></button>';
        } else {
            Toast('danger', 'Error creating bookmark ...');
        }
    } else {
        $remove_bookmark = mysqli_query($conn, "DELETE FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'");

        if ($remove_bookmark) {
            Toast('danger', 'Bookmark has been removed successfully ...');
            echo '<button type="button" title="Wishlist" hx-get="./helpers/bookmark?type=add&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify' . $asset_id . '" class="far fa-heart"></button>';
        } else {
            Toast('danger', 'Error removing bookmark ...');
        }
    }
}
