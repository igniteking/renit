<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
$user_id = $_GET['user_id'];

if (mysqli_query($conn, "UPDATE `user_data` SET `active`='active' WHERE user_email = '$user_id'")) {
    echo 'Yuor account is now active! <br>';
    echo 'Please wait while we redirect you...<br>';
    refresh('./logout.php', 2);
}
