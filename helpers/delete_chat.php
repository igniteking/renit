<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');

$chat_id = $_GET['chat_id'];
$delete = mysqli_query($conn, "DELETE FROM `chat_link` WHERE id = '$chat_id'");
if ($delete) {
    Toast('black', 'Chat link deleted successfully');
    echo "<meta http-equiv=\"refresh\" content=\"2; url=./chat.php\">";
}
