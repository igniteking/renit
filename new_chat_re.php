<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
// include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
// include('./components/sidebar.php');
?>
<?php
if (isset($_SESSION['user_email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=./helpers/logout.php\">";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- AUTHOR META -->
    <meta name="author" content="Zaidan">
    <meta name="email" content="khanzaidan786@gmail.com">
    <meta name="profile" content="https://github.com/igniteking">

    <!-- TEMPLATE META -->
    <meta name="name" content="Renit">
    <meta name="type" content="Classified Advertising">
    <meta name="title" content="Renit.com">
    <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Chat - Renit</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FAVICON -->
    <link rel="icon" href="./assets/images/favicon.jpeg">

    <!-- FONTS -->
    <link rel="stylesheet" href="./assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="./assets/fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="./assets/css/vendor/slick.min.css">
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="./assets/css/custom/main.css">

    <link rel="stylesheet" href="./assets/js/toastify-js/src/toastify.css">
    <script src="./assets/js/toastify-js/src/toastify.js"></script>
    <!--=====================================
                    CSS LINK PART END
        =======================================-->

    <!--=====================================
                    HTMX
        =======================================-->
    <script src="https://unpkg.com/htmx.org@1.9.5" integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>

</head>

<link rel="stylesheet" href="./assets/css/vendor/emojionearea.min.css">
<link rel="stylesheet" href="./assets/css/vendor/nice-select.min.css">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<?php
if (isset($_POST['submite'])) {
    $message = $_POST['message'];
    EMail('support@renit.co.in', "Report", $message . '<br><br><b> by </b>' . $user_email);
    EMail($user_email, "Report Recived", 'We Have recieved your report, we are looking into it!');
}
?>

<body>
    <section class="">
        <div class="">
            <div class="tile tile-alt" id="messages-main" style=" width: 100%;">
                <div class="ms-menu" style="height: 100vh; overflow-y: none; background-color: #e5e5e5;">
                    <div style="background-color: black; color: white; height: 68px;">
                        <div class="card-body row justify-content-between align-items-between">
                            <div class="col-10">
                                <center>

                                    <h5 class="text-white" style="line-height: 38px;">Your Chats</h5>
                                </center>
                            </div>
                            <button class="col-2 d-block d-md-none text-white" id="ms-menu-cross" style="border-radius: 100px; border: 1px solid white; padding: 5px"><b>X</b></button>
                        </div>
                    </div>
                    <style>
                        body {
                            background-color: #e5e5e5;
                            overflow-x: hidden;
                            overflow-y: hidden;
                        }
                    </style>
                    <div class="card" style="background-color: #e5e5e5;">
                        <input type="text" hx-get="./helpers/search_chat_user.php" hx-trigger="change" hx-target="#result_search" name="chat_name_search" style="border: 0px solid #e5e5e5; outline:none; background-color: #e5e5e5;" placeholder=" Search name here ..." class="form-control">
                    </div>
                    <div class="card"></div>
                    <div class="list-group lg-alt" style="background-color: #e5e5e5;" id="result_search">
                        <?php
                        $get_chat_link_list = mysqli_query($conn, "SELECT * FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id' ORDER BY id DESC");
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
                            <div class="col-2">
                                <div class="pull-left">
                                    ' . $new_user_picture . '
                                </div>
                            </div>
                            <div class="col-9 ml-md-2">
                                <div class="" style="margin-top: 6px; font-size: 15px;">
                                    <p class="list-group-item-heading ml-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 95%">' . $get_user_name . '</p>
                                </div>
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
                        <div class="action-header clearfix" style="background-color: black; color: white; height: 70px;">
                            <style>
                                * {
                                    padding: 0;
                                    margin: 0;
                                }

                                .hidenstuff {
                                    display: none;
                                }

                                .show {
                                    display: block;
                                }

                                .message {
                                    width: 80%;
                                }

                                .random {
                                    margin-top: 18px;
                                    margin-left: -25px
                                }

                                .srt {
                                    background-color: #2d2c31;
                                    color: white;
                                    border-radius: 15px;
                                    margin-left: -12px;
                                    margin-top: 15px;
                                    width: 350px;
                                }



                                @supports (-webkit-touch-callout: none) {

                                    /* CSS specific to iOS devices */
                                    #test {
                                        height: calc(100vh - 31vh);
                                        background-color: #2196f3;
                                    }
                                }

                                @supports not (-webkit-touch-callout: none) {

                                    /* CSS for other than iOS devices */
                                    #test {
                                        height: 75vh;
                                        background-color: #2196f3;
                                    }
                                }



                                


                                @media only screen and (max-width: 600px) {

                                    .ms-menu {
                                        border: none;
                                        margin-top: 1px;
                                    }

                                    #messages-main {
                                        width: 101%;

                                    }

                                    .hidenstuff {
                                        display: block;
                                    }

                                    .show {
                                        display: none;
                                    }

                                    .random {
                                        margin-top: 18px;
                                        margin-left: 0px
                                    }

                                    .srt {
                                        color: white;
                                        padding: 10px;
                                        border-radius: 15px;
                                        border: none;
                                        border-radius: 0%;
                                        margin-left: 0px;
                                        height: 45px;
                                        margin-top: 0px;
                                    }
                                }

                                @media only screen and (max-width: 350px) and (min-width: 0px) {
                                    .srt {
                                        color: white;
                                        padding: 0px;
                                        border-radius: 15px;
                                        border: none;
                                        border-radius: 0%;
                                        margin-left: 20px;
                                        margin-right: -10px;
                                        height: 45px;
                                        margin-top: 0px;
                                    }
                                }
                            </style>
                            <div class="row">
                                <div class="col-2" id="hideonmobile" style="margin-top: -12px; margin-left: -5px;">
                                    <div class="visible-xs" id="ms-menu-trigger">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                </div>
                                <div class="col-5" style="margin-left: -15px;">
                                    <div class="pull-left hidden-xs">
                                        <a href="./profile_view.php?user_id=<?= $get_user_name_id ?>"><img src="<?= $get_user_picture != '' ? $get_user_picture : './assets/images/user.png'  ?>" alt="" class="img-avatar rounded-circle avatar ml-1">
                                            <span class="text-white" id="amsndbams"><b><?= $get_user_name ?></b></span>
                                        </a>
                                    </div>
                                </div>
                                <style>
                                    @media only screen and (min-width: 1000px) {
                                        #amsndbams {
                                            margin-left: 12px
                                        }
                                    }

                                    @media only screen and (max-width: 350px) {
                                        #amsndbams {
                                            white-space: nowrap;
                                            width: 75px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            float: right;
                                            margin-top: 5px;
                                        }
                                    }

                                    @media only screen and (max-width: 800px) {
                                        #amsndbams {
                                            white-space: nowrap;
                                            width: 75px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            float: right;
                                            margin-top: 7px;
                                            margin-left: 10px
                                        }
                                    }
                                </style>
                                <div class="col-5 row" style="margin-top: 10px; margin-left: 10px" id="newtest">
                                    <div class="col-4">
                                        <button onclick="showDialog()" class="text-white hidenstuff">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button onclick="showDialog2()" class="text-white hidenstuff">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <a href="./index.php">
                                            <button class="text-white hidenstuff">
                                                <i class="fas fa-home"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-4 row d-flex justify-content-end align-items-between" style="margin-top: -40px; margin-left: 810px;" id="newtest">
                                    <div class="col-3" style="margin-right: -30px;">
                                        <button onclick="showDialog()" class="header-widget show">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-3" style="margin-right: -30px;">
                                        <button onclick="showDialog2()" class="header-widget show">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <a href="./index.php">
                                            <button class="header-widget show">
                                                <i class="fas fa-home"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <center>
                                    <dialog id="myDialog" style="position: absolute; top: 100%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);  border: none; width: 450px; z-index:50000;">
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
                                                        <button hx-get="./helpers/delete_chat.php?chat_id=<?= @$_GET['chat_id'] ?>" hx-trigger="click" hx-target="#notify" class="btn btn-dark col-sm-12">YES</button>
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
                                    <dialog id="myDialog2" style="position: absolute; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);  border: none; width: 450px; z-index:50000;">
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <p class="px-5">
                                                    TELL US THE REASON FOR THE REPORT?
                                                </p>
                                                <br>
                                                <form action="./chat.php?chat_id=<?= @$_GET['chat_id'] ?>" method="POST">
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
        <div id="test" style="overflow-x: hidden; display: flex; flex-direction: column-reverse; background-color: #e5e5e5; position:static;" hx-trigger="load, every 2s" hx-get="./helpers/get_messages.php?chat_id=<?= @$_GET['chat_id'] ?>"></div>
        <?php
        if (@$_GET['chat_id']) { ?>
            <div class="row navbar navbar-default" style="width: -webkit-fill-available; margin-left: 0px; background-color: #e5e5e5; border: 2px solid white; border-left: none; position:fixed; bottom:0; height:70px;">
                <input type="text" id="chat-" name="message" autocomplete="off" class="form-control col-md-10 col-8 mr-md-5 message" placeholder="Type a message ..." style="background-color: #e5e5e5;">
                <div class="col-md-1 col-3 form-control" style="margin-right: -50px; background-color: #e5e5e5;">
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
                    <form action="./chat.php?chat_id=<?= $_GET['chat_id']; ?>" method="POST" enctype="multipart/form-data">
                        <input id="file-input" name="attachment" onchange="this.form.submit()" type="file" style="display: none;" />
                        <input type="hidden" value="uploadpic" name="uploadpic" style="display: hidden;"></input>
                    </form>
                    <label for="file-input">
                        <i class="fas fa-paperclip random"></i>
                    </label>
                </div>
                <button class="form-control col-2 col-md-1 srt mt-1" id="buttonprop" onclick="upload()" style="margin-right: 14px;">Send</button=>
                    <style>
                        .image-upload>input {
                            display: none;
                        }
                    </style>
            </div>
        <?php } ?>
        <script>
            // Get the input field
            var input = document.getElementById("chat-");

            // Execute a function when the user presses a key on the keyboard
            input.addEventListener("keypress", function(event) {
                // If the user presses the "Enter" key on the keyboard
                if (event.key === "Enter") {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    upload();
                }
            });



            function upload() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("test").innerHTML = this.responseText;
                    }
                };
                var message = input.value;
                xhttp.open("GET", "./helpers/message.php?sender_id=<?= $user_id ?>&&asset_id=<?= $chat_asset_id ?>&&chat_id=<?= @$_GET['chat_id'] ?>&&message=" + message, true);
                xhttp.send();
                input.value = "";

            }





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
            //                 xhttp.open("GET", "./helpers/message.php?sender_id=<?= $user_id ?>&&asset_id=<?= $chat_asset_id ?>&&chat_id=<?= @$_GET['chat_id'] ?>&&message=" + message, true);
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
        #messages-main {
            position: relative;
            margin: 0 auto;
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
            border-right: 2px solid #eee;
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
                top: 0px;
            }

            #asdasdasd {
                width: 100%;
                height: calc(100% - 58px);
                display: block;
                z-index: 1;
                top: 0px;
            }

        }

        #messages-main .ms-menu.toggled {
            display: block;
        }

        #messages-main .ms-body {
            overflow: hidden;
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

        $(function() {
            if ($('#ms-menu-cross')[0]) {
                $('body').on('click', '#ms-menu-cross', function() {
                    $('.ms-menu').attr('class', 'ms-menu');
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
    <?php // include('./components/footer.php'); 
    ?>