<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
include('./components/sidebar.php');
?>
<link rel="stylesheet" href="./assets/css/vendor/emojionearea.min.css">
<link rel="stylesheet" href="./assets/css/vendor/nice-select.min.css">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<br>
<section class="mt-2">
    <?php
    if (isset($_POST['submite'])) {
        $message = $_POST['message'];
        EMail('support@renit.co.in', "Report", $message . '<br><br><b> by </b>' . $user_email);
        EMail($user_email, "Report Recived", 'We Have recieved your report, we are looking into it!');
    }
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="mt-5">
        <div class="tile tile-alt" id="messages-main">
            <div class="ms-menu" style="height: 100%; overflow-y: auto; background-color: #e5e5e5; border: 2px solid white;">
                <div style="background-color: black; color: white; height: 67px;">
                    <div class="card-body">
                        <center>
                            <h4 class="text-white">Your Chats</h4>
                        </center>
                    </div>
                </div>
                <div class="card" style="background-color: #e5e5e5;">
                    <input type="text" hx-get="./helpers/search_chat_user" hx-trigger="change" hx-target="#result_search" name="chat_name_search" style="border:none; background-color: #e5e5e5;" placeholder=" Search name here ..." class="form-control">
                </div>
                <div class="card"></div>
                <div class="list-group lg-alt" style="background-color: #e5e5e5;" id="result_search">
                    <?php
                    $get_chat_link_list = mysqli_query($conn, "SELECT * FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
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
                                $get_user_name_id = $rows['id'];
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
                                <span class="message-count" style="margin-right: -20px;">' . $unread_messages . '</span>
                            </div>
                        </div>
                    </a>
                    ';
                        }
                    } else {
                        echo "<button class='btn btn-light'>No Chats Available ..</button>";
                    }
                    ?>
                </div>
            </div>

            <style>
                #test {
                    height: 500px;
                    overflow-y: auto;
                    display: flex;
                    flex-direction: column-reverse;
                    background-color: #e5e5e5;
                }

                #hideonmobile {
                    display: none;
                }

                #newtest {
                    font-size: 25px;
                    margin-left: 200px;
                }

                @media only screen and (max-width: 600px) {
                    #hideonmobile {
                        display: block;
                    }

                    #newtest {
                        margin-left: 15px;
                        margin-top: 2px;
                        font-size: 20px
                    }
                }
            </style>
            <div class="ms-body">
                <?php if (@$_GET['chat_id']) {
                    $chat_get_id = $_GET['chat_id'];
                    $get_chat_link_list = mysqli_query($conn, "SELECT * FROM chat_link WHERE id = '$chat_get_id'");
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
                            $get_user_name_id = $rows['id'];
                            $get_user_name = $rows['user_name'];
                            $get_user_picture = $rows['profile_picture'];
                        }
                    } ?>
                    <div class="action-header clearfix" style="background-color: black; color: white; height: 68px;">
                        <div class="row">
                            <div class="col-8">
                                <div class="pull-left hidden-xs">
                                    <a href="./profile_view?user_id=<?= $get_user_name_id ?>"><img src="<?= $get_user_picture != '' ? $get_user_picture : './assets/images/user.png'  ?>" alt="" class="img-avatar rounded-circle avatar ml-2">
                                        <span class="text-white ml-2"><b><?= $get_user_name ?></b></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-1" id="hideonmobile" style="margin-top: -12px;">
                                <div class="visible-xs" id="ms-menu-trigger">
                                    <i class="fa fa-bars"></i>
                                </div>
                            </div>
                            <div class="col-2 row d-flex justify-content-end align-items-between" id="newtest">
                                <div class="col-md-4">
                                    <button onclick="showDialog()" class="header-widget">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="col-md-4 align-item-end">
                                    <button onclick="showDialog2()" class="header-widget">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </button>

                                </div>
                            </div>
                            <center>
                                <dialog id="myDialog" style="position: absolute; top: 400%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);  border: none; width: 450px; z-index:50000;">
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <p class="px-5">
                                                ARE YOU SURE YOU WANT TO REMOVE THIS CHAT?
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div id="notify"></div>
                                                <div class="col-md-6">
                                                    <button hx-get="./helpers/delete_chat?chat_id=<?= @$_GET['chat_id'] ?>" hx-trigger="click" hx-target="#notify" class="btn btn-dark col-sm-12">YES</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button onclick="closeDialog()" class="btn btn-dark col-sm-12">NO</button>
                                                </div>
                                            </div>
                                            <script>
                                                const dialog = document.getElementById("myDialog");

                                                function showDialog() {
                                                    dialog.show();
                                                }

                                                function closeDialog() {
                                                    dialog.close();
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </dialog>
                            </center>
                            <center>
                                <dialog id="myDialog2" style="position: absolute; top: 500%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);  border: none; width: 450px; z-index:50000;">
                                    <div class="card m-2">
                                        <div class="card-body">
                                            <p class="px-5">
                                                TELL US THE REASON FOR THE REPORT?
                                            </p>
                                            <br>
                                            <form action="./chat?chat_id=<?= @$_GET['chat_id'] ?>" method="POST">
                                                <textarea name="message" id="" cols="30" class="form-control" rows="10"></textarea>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input name="submite" value="Submit" class="btn btn-primary col-md-12 form-control" type="submit">
                                                        </div>
                                            </form>
                                            <div class="col-md-6">
                                                <button onclick="closeDialog2()" class="btn btn-dark form-control col-sm-12">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        const dialog2 = document.getElementById("myDialog2");

                                        function showDialog2() {
                                            dialog2.show();
                                        }

                                        function closeDialog2() {
                                            dialog2.close();
                                        }
                                    </script>
                        </div>
                    </div>
                    </dialog>
                    </center>
            </div>
        </div>
    <?php } ?>
    <div id="test" hx-trigger="load, every 2s" hx-get="./helpers/get_messages?chat_id=<?= @$_GET['chat_id'] ?>">
        <?php
        $chat_id = @$_GET['chat_id'];
        if ($chat_id) {
            $puttonseen = mysqli_query($conn, "UPDATE `message` SET `status`='1' WHERE chat_link_id = '$chat_id'");
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

            
            <a href="https://renit.co.in/ad_page?asset_id=' . $array['link'] . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
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

            
            <a href="https://renit.co.in/ad_page?asset_id=' . $array['link'] . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
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
            <a href="https://renit.co.in/ad_page?asset_id=' . $asset__get_id . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
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
        <a href="https://renit.co.in/ad_page?asset_id=' . $asset__get_id . '" class="btn btn-primary col-md-12 mt-2">View Product</a>
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
            echo 'Select a chat to see messages';
        }
        ?>
    </div>
    <?php
    if (@$_GET['chat_id']) { ?>
        <div class="row" style="width: 100%; margin-left: 0px; background-color: #e5e5e5; border: 2px solid white; border-left: none;">
            <input type="text" id="chat-" name="message" autocomplete="off" class="form-control col-md-10 mr-5" placeholder="Type your messaege here ..." style="background-color: #e5e5e5;">
            <div class="col-md-1 form-control" style="margin-right: -50px; background-color: #e5e5e5;">
                <?php
                $uploadpic = @$_POST['uploadpic'];
                if ($uploadpic) {
                    $attacment = $_FILES['attachment']['name'];
                    $done = uploadImage($attacment, "attachment", "./ateachments");
                    if ($done) {
                        $chat_id = $_GET['chat_id'];
                        $date = date('Y-m-d H:i:s');
                        $create_message = mysqli_query($conn, "INSERT INTO `message`(`asset_id`, `date`, `id`, `message`, `message_type`, `sender_id`, `status`, `chat_link_id`) 
VALUES ('$chat_asset_id','$date',NULL,'$done','image','$user_id',0,'$chat_id')");
                        Toast('black', 'successfully uploaded');
                    } else {
                        echo 'ERROR';
                    }
                }
                ?>
                <form action="./chat?chat_id=<?= $_GET['chat_id']; ?>" method="POST" enctype="multipart/form-data">
                    <input id="file-input" name="attachment" onchange="this.form.submit()" type="file" style="display: none;" />
                    <input type="hidden" value="uploadpic" name="uploadpic" style="display: hidden;"></input>
                </form>
                <label for="file-input">
                    <i class="fas fa-paperclip" style="margin-top: 18px; margin-left: -25px;"></i>
                </label>
            </div>
            <button class="form-control col-md-1" style="background-color: #2d2c31; color: white; border-radius: 15px; margin-left: -12px; height: 45px; margin-top: 5px;" hx-get="./helpers/message?sender_id=<?= $user_id ?>&&asset_id=<?= $chat_asset_id ?>&&chat_id=<?= @$_GET['chat_id'] ?>" hx-trigger="click" hx-include="#chat-" hx-target="#test"><b>Send</b></button=>
                <style>
                    .image-upload>input {
                        display: none;
                    }
                </style>
        </div>
    <?php } ?>
    <script>
        // tinymce.init({
        //     selector: "#chat-emoj",
        //     menubar: false,
        //     toolbar_location: "bottom",
        //     plugins: "autoresize link lists emoticons",
        //     autoresize_bottom_margin: 0,
        //     skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'oxide-dark' : 'oxide'),
        //     content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'),
        //     max_height: 1080,
        //     placeholder: "Enter message . . .",
        //     toolbar: "bold italic strikethrough forecolor backcolor formatpainter | numlist bullist outdent indent | link | code | addcomment | checklist | casechange | mySendButton",
        //     setup: function(editor) {
        //         editor.ui.registry.addButton("mySendButton", {
        //             tooltip: "Send Message",
        //             text: "Send Message",
        //             onAction: function() {
        //                 var xhttp = new XMLHttpRequest();
        //                 xhttp.onreadystatechange = function() {
        //                     if (this.readyState == 4 && this.status == 200) {
        //                         document.getElementById("test").innerHTML = this.responseText;
        //                     }
        //                 };
        //                 var message = editor.getContent();
        //                 xhttp.open("GET", "./helpers/message?sender_id=<?= $user_id ?>&&asset_id=<?= $chat_asset_id ?>&&chat_id=<?= @$_GET['chat_id'] ?>&&message=" + message, true);
        //                 xhttp.send();
        //                 editor.resetContent();
        //             },
        //         });
        //     },
        // });
    </script>
    </div>
    </div>
</section>
<style>
    body {
        overflow-x: hidden;
    }

    #messages-main {
        position: relative;
        margin: 0 auto;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    #messages-main:after,
    #messages-main:before {
        content: " ";
        display: table;
    }

    #messages-main .ms-menu {
        position: absolute;
        left: 0;
        top: 0;
        border-right: 1px solid #eee;
        padding-bottom: 50px;
        height: 100%;
        width: 240px;
        background: #fff;
    }

    @media (min-width:768px) {
        #messages-main .ms-body {
            padding-left: 240px;
        }
    }

    @media (max-width:767px) {
        #messages-main .ms-menu {
            height: calc(100% - 58px);
            display: none;
            z-index: 1;
            top: 58px;
        }

        #messages-main .ms-menu.toggled {
            display: block;
        }

        #messages-main .ms-body {
            overflow: hidden;
        }
    }

    #messages-main .ms-user {
        padding: 15px;
        background: #f8f8f8;
    }

    #messages-main .ms-user>div {
        overflow: hidden;
        padding: 3px 5px 0 15px;
        font-size: 11px;
    }

    #messages-main #ms-compose {
        position: fixed;
        bottom: 120px;
        z-index: 1;
        right: 30px;
        box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
    }

    #ms-menu-trigger {
        user-select: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 100%;
        padding-right: 10px;
        padding-top: 19px;
    }

    #ms-menu-trigger i {
        font-size: 21px;
    }

    #ms-menu-trigger.toggled i:before {
        content: '\f2ea'
    }

    .fc-toolbar:before,
    .login-content:after {
        content: ""
    }

    .message-feed {
        padding: 20px;
    }



    .message-feed.right>.pull-right {
        margin-left: 15px;
    }

    .message-feed:not(.right) .mf-content {
        background: #03a9f4;
        color: #fff;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    .message-feed.right .mf-content {
        background: #eee;
    }

    .mf-content {
        padding: 12px 17px 13px;
        border-radius: 2px;
        display: inline-block;
        max-width: 80%
    }

    .mf-date {
        display: block;
        color: #B3B3B3;
        margin-top: 7px;
    }

    .mf-date>i {
        font-size: 14px;
        line-height: 100%;
        position: relative;
        top: 1px;
    }

    .msb-reply {
        box-shadow: 0 -20px 20px -5px #fff;
        position: relative;
        margin-top: 30px;
        border-top: 1px solid #eee;
        background: #f8f8f8;
    }

    .four-zero,
    .lc-block {
        box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
    }

    .msb-reply textarea {
        width: 100%;
        font-size: 13px;
        border: 0;
        padding: 10px 15px;
        resize: none;
        height: 60px;
        background: 0 0;
    }

    .msb-reply button {
        position: absolute;
        top: 0;
        right: 0;
        border: 0;
        height: 100%;
        width: 60px;
        font-size: 25px;
        color: #2196f3;
        background: 0 0;
    }

    .msb-reply button:hover {
        background: #f2f2f2;
    }

    .img-avatar {
        height: 37px;
        border-radius: 2px;
        width: 37px;
    }

    .list-group.lg-alt .list-group-item {
        border: 0;
    }

    .p-15 {
        padding: 15px !important;
    }

    .action-header {
        position: relative;
        background: #f8f8f8;
        padding: 15px 13px 15px 17px;
    }

    .ah-actions {
        z-index: 3;
        float: right;
        margin-top: 7px;
        position: relative;
    }

    .actions {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .actions>li {
        display: inline-block;
    }

    .actions:not(.a-alt)>li>a>i {
        color: #939393;
    }

    .actions>li>a>i {
        font-size: 20px;
    }

    .actions>li>a {
        display: block;
        padding: 0 10px;
    }

    .ms-body {
        background: #fff;
    }

    #ms-menu-trigger {
        user-select: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 100%;
        padding-right: 10px;
        padding-top: 19px;
        cursor: pointer;
    }

    #ms-menu-trigger,
    .message-feed.right {
        text-align: right;
    }

    #ms-menu-trigger,
    .toggle-switch {
        -webkit-user-select: none;
        -moz-user-select: none;
    }
</style>
<script>
    $(function() {
        if ($('#ms-menu-trigger')[0]) {
            $('body').on('click', '#ms-menu-trigger', function() {
                $('.ms-menu').toggleClass('toggled');
            });
        }
    });
</script>
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/vendor/popper.min.js"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<script src="./assets/js/vendor/nice-select.min.js"></script>
<script src="./assets/js/vendor/emojionearea.min.js"></script>
<script src="./assets/js/vendor/nicescroll.min.js"></script>
<script src="./assets/js/custom/nice-select.js"></script>
<script src="./assets/js/custom/nicescroll.js"></script>
<script src="./assets/js/custom/emojionearea.js"></script>
<script src="./assets/js/custom/main.js"></script>
<?php include('./components/footer.php'); ?>