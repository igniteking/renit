<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');

$get_username = $_GET['chat_name_search'];
if (mysqli_num_rows(mysqli_query($conn, "SELECT id FROM user_data WHERE user_name LIKE '%$get_username%'")) > 0) {
    $new_user_id_check = fetch_single_row($conn, "SELECT id FROM user_data WHERE user_name LIKE '%$get_username%'");
    $get_chat_link_list = mysqli_query($conn, "SELECT * FROM chat_link WHERE chat_owner_id = '$user_id' AND chat_reciever_id LIKE '%$new_user_id_check%' OR chat_owner_id LIKE '%$new_user_id_check%' AND chat_reciever_id = '$user_id'");
    if (mysqli_num_rows($get_chat_link_list) > 0) {
        while ($rows = mysqli_fetch_assoc($get_chat_link_list)) {
            $chat_link_id = $rows['id'];
            $chat_asset_id = $rows['chat_asset_id'];
            $chat_owner_id = $rows['chat_owner_id'];
            $chat_reciever_id = $rows['chat_reciever_id'];
            $date = $rows['date'];
            if ($chat_owner_id == $user_id) {
                $get_chat_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$chat_reciever_id'");
            } else if ($chat_reciever_id == $user_id) {
                $get_chat_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$chat_owner_id'");
            }
            while ($rows = mysqli_fetch_assoc($get_chat_user)) {
                $get_user_name = $rows['user_name'];
                $get_user_picture = $rows['profile_picture'];
            }
            $get_chat_messages = mysqli_query($conn, "SELECT * FROM message WHERE chat_link_id = '$chat_link_id'");
            while ($rows = mysqli_fetch_assoc($get_chat_messages)) {
                $message = $rows['message'];
                $message_type = $rows['message_type'];
                $message_sender_id = $rows['sender_id'];
                $message_status = $rows['status'];
                $message_asset_id = $rows['asset_id'];
                $message_date = $rows['date'];
            }
            if ($get_user_picture == '') {
                $new_user_picture = '
                            <img src="./assets/images/user.png" alt="" class="img-avatar rounded-circle avatar">
                            ';
            } else {
                $new_user_picture = '
                            <img src="' . $get_user_picture . '" alt="" class="img-avatar rounded-circle avatar">
                            ';
            }
            $unread_messages = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM message WHERE chat_link_id = '$chat_link_id' AND status = 0"));
            if ($chat_owner_id == $new_user_id_check or $chat_reciever_id == $new_user_id_check) {
                echo '
                <a style="background-color: #e5e5e5; color: black;" class="list-group-item media" href="?chat_id=' . $chat_link_id . '">
                <div class="row">
                    <div class="col-md-2">
                        <div class="pull-left">
                            ' . $new_user_picture . '
                        </div>
                    </div>
                    <div class="col-md-9 ml-2">
                        <div class="" style="margin-top: 6px; font-size: 15px;">
                            <p class="list-group-item-heading" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 95%">' . $get_user_name . '</p>
                        </div>
                    </div>
                </div>
            </a>
                    ';
            }
        }
    } else {
        echo "<button class='form-control'>No Chats Available ..</button>";
    }
} else {
    echo "<button class='form-control'>No User Found ..</button>";
}
