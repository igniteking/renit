<?php
include('../connections/connection.php');
include('../connections/functions.php');
$asset_id = $_GET['asset_id'];
$status = $_GET['status'];
if ($status == 'active') {
    $status = 'inactive';
    if (mysqli_query($conn, "UPDATE assets SET asset_condition='$status' WHERE id = '$asset_id'")) {
        echo '<input type="checkbox" class="custom-control-input" id="customSwitches' . $asset_id . '" hx-get="./helpers/asset_status?asset_id=' . $asset_id . '&&status=inactive"  hx-trigger="click" hx-target="#rand' . $asset_id . '">
        <label class="custom-control-label" for="customSwitches' . $asset_id . '"></label>';
        Toast('black', 'Inactivated Successfully ... ');
    } else {
        Toast('danger', 'Error Deleting ... ');
    }
} else {
    $status = 'active';
    if (mysqli_query($conn, "UPDATE assets SET asset_condition='$status' WHERE id = '$asset_id'")) {
        echo '<input type="checkbox" checked class="custom-control-input" id="customSwitches' . $asset_id . '" hx-get="./helpers/asset_status?asset_id=' . $asset_id . '&&status=active"  hx-trigger="click" hx-target="#rand' . $asset_id . '">
        <label class="custom-control-label" for="customSwitches' . $asset_id . '"></label>';
        Toast('black', 'Activated Successfully ... ');
    } else {
        Toast('danger', 'Error Deleting ... ');
    }
}
