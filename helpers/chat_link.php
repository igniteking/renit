<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
$asset_id = $_GET['asset_id'];
$owner_id = $_GET['owner_id'];
$reciver_id = $_GET['reciver_id'];
$from = @$_GET['from'];
$to = @$_GET['to'];
$price = @$_GET['price'];
if ($from) {
    $link = serialize(array('from' => $from, 'to' => $to, 'price' => $price, 'link' => $asset_id));
    $card_type = "detailed";
} else {
    $link = serialize(array('link' => $asset_id));
    $card_type = "simple";
}
$date = date('Y-m-d H:i:s');


if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM chat_link WHERE chat_reciever_id = '$reciver_id' AND chat_owner_id = '$owner_id' OR chat_reciever_id = '$owner_id' AND chat_owner_id = '$reciver_id'")) == 0) {

    $create_link = mysqli_query($conn, "INSERT INTO `chat_link`(`chat_asset_id`, `chat_owner_id`, `chat_reciever_id`, `date`, `id`)
        VALUES ('$asset_id','$owner_id','$reciver_id','$date',NULL)");

    $new_id = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_reciever_id = '$reciver_id' AND chat_owner_id = '$owner_id' OR chat_reciever_id = '$owner_id' AND chat_owner_id = '$reciver_id'");

    $create_message = mysqli_query($conn, "INSERT INTO `message`(`asset_id`, `date`, `id`, `message`, `message_type`, `sender_id`, `status`, `chat_link_id`) 
         VALUES ('$asset_id','$date',NULL,'$link','$card_type','$reciver_id',0,'$new_id')");
    if ($create_message) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=../chat.php?chat_id=$new_id\">";
    } else {
        "problem";
    }
} else {
    "problem";
    $new_id = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_reciever_id = '$reciver_id' AND chat_owner_id = '$owner_id' OR chat_reciever_id = '$owner_id' AND chat_owner_id = '$reciver_id'");

    $create_message = mysqli_query($conn, "INSERT INTO `message`(`asset_id`, `date`, `id`, `message`, `message_type`, `sender_id`, `status`, `chat_link_id`) 
    VALUES ('$asset_id','$date',NULL,'$link','$card_type','$reciver_id',0,'$new_id')");
    if ($create_message) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=../chat.php?chat_id=$new_id\">";
    } else {
        "problem";
    }
}
