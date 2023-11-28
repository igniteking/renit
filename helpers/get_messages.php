<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
function cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon)
{
    echo '
                
            <div class="col-md-12" style="margin-left: 30px;">
                        <div class="product-card">
                            <a href="./ad_page.php?asset_id=' . $asset_id . '">
                                <div class="product-media">
                                    <div class="side_margin_for_card">
                                    <img class="object-fit-contain" style="object-position: center; object-fit: contain;" width="' . $width . '" height="' . $height . '" src="' . $asset_thumbnail . '" alt="product">
                                    </div>
                                </div>
                            </a>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">' . $asset_category_name . '</a></li>
                                <li class="breadcrumb-item active" aria-current="page">' . $asset_sub_category_name . '</li>
                            </ol>
                            <h5 class="product-title card-title" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <a href="./ad_page.php?asset_id=' . $asset_id . '">' . $asset_name . '</a>
                            </h5>
                            <div class="product-meta" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <span><i class="fas fa-map-marker-alt"></i>' . $asset_location . '</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">' . $new_symbol . $asset_price . '<span>/Per Day</span></h5>
                                ';
    if (@$_SESSION['user_email']) {
        echo '<div id="notify' . $asset_id . '">
                                    <button type="button" title="Wishlist" hx-get="./helpers/bookmark.php?type=' . $type . '&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify' . $asset_id . '" class="' . $icon . ' fa-heart"></button>
                                </div>';
    }
    echo '
    </div>
    <a href="https://renit.co.in/ad_page.php?asset_id=' . $asset_id . '" class="btn col-md-12 mb-2" style="background-color: #2d2c31; color: white;">View</a>
                        </div>
                    </div>
                    </div>
                                ';
}

function DetailedCardWidget($message, $asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon)
{
    $array = unserialize($message);
    echo '
                
            <div class="col-md-12" style="margin-left: 30px;">
                        <div class="product-card">
                            <a href="./ad_page.php?asset_id=' . $asset_id . '">
                                <div class="product-media">
                                    <div class="side_margin_for_card">
                                    <img class="object-fit-contain" style="object-position: center; object-fit: contain;" width="' . $width . '" height="' . $height . '" src="' . $asset_thumbnail . '" alt="product">
                                    </div>
                                </div>
                            </a>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">' . $asset_category_name . '</a></li>
                                <li class="breadcrumb-item active" aria-current="page">' . $asset_sub_category_name . '</li>
                            </ol>
                            <h5 class="product-title card-title" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <a href="./ad_page.php?asset_id=' . $asset_id . '">' . $asset_name . '</a>
                            </h5>
                            <p class="text-secondary text-muted">Offer: '  . $new_symbol . $array['price'] . '</p>
                            <p class="text-secondary text-muted">From: ' . $array['from'] . '</p>
                            <p class="text-secondary text-muted">To: ' . $array['to'] . '</p>
                            <div class="product-info">
                                <h5 class="product-price">' . $new_symbol . $asset_price . '<span>/Per Day</span></h5>
                                
    </div>
    <a href="https://renit.co.in/ad_page.php?asset_id=' . $asset_id . '" class="btn col-md-12 mb-2" style="background-color: #2d2c31; color: white;">View</a>
                        </div>
                    </div>
                    </div>
                                ';
}
$chat_id = $_GET['chat_id'];
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

    $get_card = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$message_asset_id'");
    while ($rows = mysqli_fetch_assoc($get_card)) {
        $asset_id = $rows["id"];
        $asset_name = $rows["asset_name"];
        $asset_thumbnail = $rows["asset_thumbnail"];
        $asset_price = $rows["asset_price"];
        $asset_location = $rows["asset_location"];
        $new_symbol = $rows['symbol'];
        $asset_category = intval($rows["asset_category"]);
        $asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
        $asset_sub_category = intval($rows["asset_sub_category"]);
        $asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
    }
    if ($message_type == 'simple') {
        (getimagesize("../" . $asset_thumbnail)[1]);
        if (getimagesize("../" . $asset_thumbnail)[1] > 500) {
            $width = "260";
            $height = "200";
            $margin = "50px";
        } else {
            $margin = "50px";
            $width = "200px";
            $height = "200px";
            $margin = "0px";
        }
        if (@$_SESSION['user_email']) {
            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
            if ($get_bookmark > 0) {
                $type = 'remove';
                $icon = 'fas';
            } else {
                $icon = 'far';
                $type = 'add';
            }
        } else {
            $type = "";
            $user_id = "";
            $icon = "";
            $user_id = "";
        }
        if ($message_sender_id == $user_id) {
            echo '
                <div class="row mt-3 mt-3 mb-3" style="width: 100%;">
                <div class="col-md-9 col-2"></div>
            <div class="col-md-3 col-10">';
            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
            echo "
            </div>
            </div>
            ";
        } else {
            echo '
                <div class="row mt-3 mt-3 mb-3" style="width: 100%;">
            <div class="col-md-3 col-10" style="margin-left: -20px;">';
            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
            echo '
            <div class="col-md-9 col-2" ></div>
            </div>
            </div>
            ';
        }
    } else if ($message_type == 'detailed') {
        (getimagesize("../" . $asset_thumbnail)[1]);
        if (getimagesize("../" . $asset_thumbnail)[1] > 500) {
            $width = "260";
            $height = "200";
            $margin = "50px";
        } else {
            $margin = "50px";
            $width = "200";
            $height = "200px";
            $margin = "0px";
        }
        if (@$_SESSION['user_email']) {
            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
            if ($get_bookmark > 0) {
                $type = 'remove';
                $icon = 'fas';
            } else {
                $icon = 'far';
                $type = 'add';
            }
        } else {
            $type = "";
            $user_id = "";
            $icon = "";
            $user_id = "";
        }


        if ($message_sender_id == $user_id) {
            echo '
            <div class="row mt-3 mt-3 mb-3" style="width: 100%;">
            <div class="col-md-9 col-2"></div>
            <div class="col-md-3 col-10" style="margin-left: -20px;">
            ';
            echo DetailedCardWidget($message, $asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, "test", $user_id, "@");
            echo '
            </div>
            </div>
                        ';
        } else {
            echo '
            <div class="row mt-3 mt-3 mb-3" style="width: 100%;">
            <div class="col-md-3 col-10">
            ';
            echo DetailedCardWidget($message, $asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, "test", $user_id, "@");
            echo '
            <div class="col-md-9 col-2"></div>
            </div>
            </div>';
        }
    } else if ($message_type == 'image') {
        if ($message_sender_id == $user_id) {
            echo '
            <div class="row mb-3" style="width: 100%;">
            <div class="col-md-8"></div>
            <div class="card col-md-4 khasjdanks" style="width: 18rem;">
            <img src="' . $message . '" class="card-img-top object-fit-contain" style="object-position: center; object-fit: contain;">
            </div>
            </div>
                    ';
        } else {
            echo '
        <div class="row mb-3" style="width: 100%;">
        <div class="card col-md-4 ml-md-5 khasjdanks" style="width: 18rem;">
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
                            <div class="mf-content" style="background-color: #2d2c31; border: 1px solid white; color: white; padding: 7px; border-radius: 10px; white-space: initial; word-wrap: break-word; text-align: left;">
                            ' . $message . '
                            </div>
                            <small class="mf-date" style="margin-top: -2px;"><i class="fa fa-clock-o"></i> ' . $message_date . '</small>
                        </div>

                    </div>

                                        ';
        } else {
            echo '
                                        <div class="message-feed media" style="padding-top:0px; padding-bottom: 0px;">
                        <div style="margin-left: 10px;" class="media-body" >
                            <div class="mf-content" style="background-color: #2d2c31; border: 1px solid white; color: white; padding: 7px; border-radius: 10px; white-space: initial; word-wrap: break-word;  text-align: left;">
                            ' . $message . '
                            </div>
                            <small class="mf-date" style="margin-top: -2px;"><i class="fa fa-clock-o"></i> ' . $message_date . '</small>
                        </div>
                    </div>
                                    ';
        }
    }
}
echo "
<style>

@media only screen and (max-width: 600px) {
    .khasjdanks {
        margin-left: 25%;
    }
    
}

@media only screen and (max-width: 350px) and (min-width: 0px) {
    .zxczxczxczxc {
        width: 60%;
        margin-left: 22%;
    }
    .khasjdanks{
        margin: 10px;
        margin-left: 30%;
    }
}

@media only screen and (max-width: 700px) and (min-width: 350px) {
    .zxczxczxczxc {
        width: 60%;
        margin-left: 22%;
    }
    .khasjdanks{
        margin: 10px;
        margin-left: 30%;
    }
}

@media only screen and (max-width: 1500px) and (min-width: 700px) {
    .zxczxczxczxc {
        width: 100%;
    }
}
</style>";
