<?php
include('../connections/connection.php');
include('../connections/functions.php');
$asset_id = $_GET['asset_id'];

if (mysqli_query($conn, "DELETE FROM assets WHERE id = '$asset_id'")) {
    Toast('black', 'Delteted Successfully ... ');
    echo "<meta http-equiv=\"refresh\" content=\"2; url=#\">";
} else {
    Toast('danger', 'Error Deleting ... ');
}
