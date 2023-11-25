<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
if (@$_SESSION['user_email']) {
    include('./components/sidebar.php');
}
?>
<link rel="stylesheet" href="./assets/css/custom/message.css">
<link rel="stylesheet" href="./assets/css/vendor/emojionearea.min.css">
<link rel="stylesheet" href="./assets/css/vendor/nice-select.min.css">
<script src="https://unpkg.com/htmx.org@1.9.5" integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous"></script>


<!--=====================================
MESSAGE PART START
=======================================-->
<br><br><br>
<section class="message-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4">
                <div class="message-filter">
                    <form class="message-filter-src">
                        <input type="text" placeholder="Search for Username">
                    </form>
                    <ul class="message-list" id="test" style="overflow-x: hidden;">
                        <?php
                        $get_chat_link_list = mysqli_query($conn, "SELECT * FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
                        while ($rows = mysqli_fetch_assoc($get_chat_link_list)) {
                            $chat_link_id = $rows['id'];
                            $chat_asset_id = $rows['chat_asset_id'];
                            $chat_owner_id = $rows['chat_owner_id'];
                            $chat_reciever_id = $rows['chat_reciever_id'];
                            $date = $rows['date'];
                            $get_chat_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$chat_owner_id'");
                            while ($rows = mysqli_fetch_assoc($get_chat_user)) {
                                $get_user_name = $rows['user_name'];
                                $get_user_picture = $rows['profile_picture'];
                            }
                            $get_chat_messages = mysqli_query($conn, "SELECT * FROM message WHERE chat_link_id = '$chat_link_id'");
                            while ($rows = mysqli_fetch_assoc($get_chat_messages)) {
                                $message = $rows['message'];
                                $message_type = $rows['message_type'];
                                $message_receiver_id = $rows['receiver_id'];
                                $message_sender_id = $rows['sender_id'];
                                $message_status = $rows['status'];
                                $message_asset_id = $rows['asset_id'];
                                $message_date = $rows['date'];
                            }
                            $unread_messages = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM message WHERE chat_link_id = '$chat_link_id' AND status = 0"));
                            echo '
                            <li class="message-item unread">
                            <a href="message.php?chat_id=' . $chat_link_id . '" class="message-link">
                                <div class="message-img">
                                    <img src="' . $get_user_picture . '" alt="avatar">
                                </div>
                                <div class="message-text">
                                    <h6>' . $get_user_name . ' <span>' . $date . '</span></h6>
                                    <p style="overflow: hidden; text-overflow: ellipsis; width: 70%;">' . $message . '</p>
                                </div>
                                <span class="message-count">' . $unread_messages . '</span>
                            </a>
                        </li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8">
                <div class="message-inbox">
                    <div class="inbox-header">
                        <?php if (@$_GET['chat_id']) { ?>
                            <div class="inbox-header-profile">
                                <a class="inbox-header-img" href="#">
                                    <img src="<?= $get_user_picture != '' ? $get_user_picture : './assets/images/avatar/01.jpg'  ?>" alt="avatar">
                                </a>
                                <div class="inbox-header-text">
                                    <h5><a href="#"><?= $get_user_name ?></a></h5>
                                    <!-- <span>active now</span> -->
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <ul class="inbox-header-list">
                            <li><a href="#" title="Delete" class="fas fa-trash-alt"></a></li>
                            <li><a href="#" title="Report" class="fas fa-flag"></a></li>
                            <li><a href="#" title="Block" class="fas fa-shield-alt"></a></li>
                        </ul> -->
                    </div>
                    <ul class="inbox-chat-list" id="test">
                        <?php
                        $chat_id = @$_GET['chat_id'];
                        if ($chat_id) {
                            $get_chat_messages = mysqli_query($conn, "SELECT * FROM message WHERE chat_link_id = '$chat_id' ORDER BY id DESC");
                            while ($rows = mysqli_fetch_assoc($get_chat_messages)) {
                                $message = $rows['message'];
                                $message_type = $rows['message_type'];
                                $message_sender_id = $rows['sender_id'];
                                $message_asset_id = $rows['asset_id'];
                                $message_status = $rows['status'];
                                $message_date = $rows['date'];
                                $message_sender_pic = fetch_single_row($conn, "SELECT profile_picture FROM user_data WHERE id = '$message_sender_id'");
                                if ($message_sender_pic == '') {
                                    $message_sender_pic = './assets/images/user.png';
                                }

                                if ($message_type == 'card') {
                                    $get_card = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$message_asset_id'");
                                    while ($rows = mysqli_fetch_assoc($get_card)) {
                                        $asset__get_id = $rows['id'];
                                        $asset_description = $rows['asset_description'];
                                        $asset_location = $rows['asset_location'];
                                        $asset_name = $rows['asset_name'];
                                        $asset_by_address = $rows['asset_by_address'];
                                        $asset_thumbnail = $rows['asset_thumbnail'];
                                        $new_symbol = $rows['symbol'];
                                        $asset_category = intval($rows["asset_category"]);
                                        $asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                                        $asset_sub_category = intval($rows["asset_sub_category"]);
                                        $asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category'");
                                        $asset_tag = ($rows["asset_tag"]);
                                    }

                                    if (@$array['from']) {
                                        $array = unserialize($message);
                                        if ($message_sender_id == $user_id) {
                                            echo '
            <div class="row mt-3" style="width: 100%;">
            <div class="col-md-8"></div>
            <div class="card col-md-4" style="width: 18rem;">
            <img src="' . $asset_thumbnail . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
            <div class="card-body">
            <h5 class="card-title">' . $asset_name . '</h5>
            <p class="card-title">Offer: '  . $new_symbol . $array['price'] . '</p>
            <p class="card-title">From: ' . $array['from'] . '</p>
            <p class="card-title">To: ' . $array['to'] . '</p>

            
            <a href="https://renit.co.in/ad_page.php?asset_id=' . $array['link'] . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
            </div>
            </div>
            </div>
                    ';
                                        } else {
                                            echo '
        <div class="row" style="width: 100%;">
        <div class="card col-md-4" style="width: 18rem;">
        <img src="' . $asset_thumbnail . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
        <div class="card-body">
        <h5 class="card-title">' . $asset_name . '</h5>
            <p class="card-title">Offer: '  . $new_symbol . $array['price'] . '</p>
            <p class="card-title">From: ' . $array['from'] . '</p>
            <p class="card-title">To: ' . $array['to'] . '</p>

            
            <a href="https://renit.co.in/ad_page.php?asset_id=' . $array['link'] . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
            </div>
        </div>
        <div class="col-md-8"></div>
        </div>
                    ';
                                        }
                                    } else {
                                        if ($message_sender_id == $user_id) {
                                            echo '
            <div class="row mt-3" style="width: 100%;">
            <div class="col-md-8"></div>
            <div class="card col-md-4" style="width: 18rem;">
            <img src="' . $asset_thumbnail . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
            <div class="card-body">
            <h5 class="card-title">' . $asset_name . '</h5>
            <a href="https://renit.co.in/ad_page.php?asset_id=' . $asset__get_id . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
            </div>
            </div>
            </div>
                    ';
                                        } else {
                                            echo '
        <div class="row" style="width: 100%;">
        <div class="card col-md-4" style="width: 18rem;">
        <img src="' . $asset_thumbnail . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
        <div class="card-body">
        <h5 class="card-title">' . $asset_name . '</h5>
        <a href="https://renit.co.in/ad_page.php?asset_id=' . $asset__get_id . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
        </div>
        </div>
        <div class="col-md-8"></div>
        </div>
                    ';
                                        }
                                    }
                                } else if ($message_type == 'image') {
                                    if ($message_sender_id == $user_id) {
                                        echo '
            <div class="row mb-3" style="width: 100%;">
            <div class="col-md-8"></div>
            <div class="card col-md-4" style="width: 18rem;">
            <img src="' . $message . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
            </div>
            </div>
                    ';
                                    } else {
                                        echo '
        <div class="row mb-3" style="width: 100%;">
        <div class="card col-md-4" style="width: 18rem;">
        <img src="' . $message . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
        </div>
        <div class="col-md-8"></div>
        </div>
                    ';
                                    }
                                } else {
                                    if ($message_sender_id == $user_id) {
                                        echo '
                                        <div class="message-feed right"  style="padding-top:0px; padding-bottom: 10px;">
                        <div class="media-body">
                            <div class="mf-content" style="background-color: #2d2c31; border: 1px solid white; color: white; padding: 7px; border-radius: 10px;">
                            ' . $message . '
                            </div>
                            <small class="mf-date"><i class="fa fa-clock-o"></i> ' . $message_date . '</small>
                        </div>
                    </div>

                                        ';
                                    } else {
                                        echo '
                                        <div class="message-feed media" style="padding-top:0px; padding-bottom: 0px;">
                        <div style="margin-left: 10px;" class="media-body">
                            <div class="mf-content" style="background-color: #2d2c31; border: 1px solid white; color: white; padding: 7px; border-radius: 10px;">
                            ' . $message . '
                            </div>
                            <small class="mf-date"><i class="fa fa-clock-o"></i> ' . $message_date . '</small>
                        </div>
                    </div>
                                    ';
                                    }
                                }
                            }
                        } else {

                            echo '<br><div class="row">
                            <div class="col-md-12 text-white text-center" style="background-color: black;">Select a chat ..</div>
                        </div>';
                        }
                        ?>

                    </ul>
                    <?php

                    if (@$_GET['chat_id']) { ?>
                        <div class="inbox-chat-form">
                            <textarea name="message" class="asdfghjkl" placeholder="Type a Message" id="chat-emoji"></textarea>
                            <button><i onclick="clear()" hx-get="./helpers/message.php?sender_id=<?= $user_id ?>&&reciver_id=<?= $chat_owner_id ?>&&asset_id=<?= $chat_asset_id ?>&&chat_id=<?= @$_GET['chat_id'] ?>" hx-trigger="click" hx-include="[class='asdfghjkl']" hx-target="#test" class="fas fa-paper-plane"></i></button>
                        </div>
                    <?php } ?>
                    <script>
                        function clear() {
                            var clear = document.getElementById('chat-emoji');
                            if (clear) {
                                clear.value = '';
                                console.log('done clearing');
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    MESSAGE PART END
        =======================================-->


<!--=====================================
                    JS LINK PART START
        =======================================-->
<!-- VENDOR -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/vendor/popper.min.js"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<script src="./assets/js/vendor/nice-select.min.js"></script>
<script src="./assets/js/vendor/emojionearea.min.js"></script>
<script src="./assets/js/vendor/nicescroll.min.js"></script>

<!-- CUSTOM -->
<script src="./assets/js/custom/nice-select.js"></script>
<script src="./assets/js/custom/nicescroll.js"></script>
<script src="./assets/js/custom/emojionearea.js"></script>
<script src="./assets/js/custom/main.js"></script>
<!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>