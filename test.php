<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
// include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
if (@$_SESSION['user_email']) {
    // include('./components/sidebar.php');
}
?>
<link rel="stylesheet" href="./assets/css/custom/index.css">
<?php
$cont = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'"));

include('./components/footer.php'); ?>