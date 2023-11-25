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
<link rel="stylesheet" href="./assets/css/custom/setting.css">

<?php // Fetch user details
$get_user_id = $_GET['user_id'];
$get_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$get_user_id'");
while ($rows = mysqli_fetch_assoc($get_user)) {
    $logged_id = $rows['id'];
    $logged_username = $rows['user_name'];
    $logged_profile_picture = $rows['profile_picture'];
    $logged_user_email = $rows['user_email'];
    $logged_user_location = $rows['user_location'];
    $logged_user_number = $rows['user_number'];
    $logged_user_type = $rows['user_type'];
    $logged_user_city = $rows['user_city'];
    $logged_user_state = $rows['user_state'];
    $logged_user_post_code = $rows['user_post_code'];
    $logged_user_country = $rows['user_country'];
    $logged_user_created_at = $rows['created_at'];
} ?>
<br><br>
<!--=====================================
                DASHBOARD HEADER PART START
                =======================================-->
<section class="dash-header-part mt-4 pt-4">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-5">
                    <div class="dash-header-left">
                        <?php
                        if (!empty($logged_profile_picture)) { ?>
                            <div class="dash-avatar">
                                <center><img src="<?= $logged_profile_picture ?>" class="img img-avatar rounded-circle ml-md-0 ml-5" height="150" style="object-fit: cover;" alt="avatar"></center>
                            </div>
                        <?php } else {
                        ?>
                            <div class="dash-avatar">
                                <img src="./assets/images/user.png" class="img img-avatar rounded-circle ml-md-0 ml-5" height="150" style="object-fit: cover;" alt="avatar">
                            </div>
                        <?php } ?>
                        <div class="dash-intro" id="tetete">
                            <h4><?= $logged_username ?></h4>
                        </div>
                    </div>
                </div>
                <style>
                    @media only screen and (max-width: 350px) and (min-width: 0px) {
                        .dash-avatar {
                            margin-left: 5px;
                        }

                        #tetete {
                            margin-left: 70px;
                        }
                    }

                    @media only screen and (max-width: 400px) and (min-width: 350px) {
                        .dash-avatar {
                            margin-left: 35px;
                        }

                        #tetete {
                            margin-left: 95px;
                        }
                    }

                    @media only screen and (max-width: 600px) and (min-width: 400px) {
                        .dash-avatar {
                            margin-left: 60px;
                        }

                        #tetete {
                            margin-left: 125px;
                        }
                    }
                </style>
                <div class="col-lg-7">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$logged_id'")) ?></h2>
                            <p>listing ads</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</section>
<!--=====================================
                DASHBOARD HEADER PART END
        =======================================-->


<!--=====================================
                    MY ADS PART START
        =======================================-->
<section class="myads-part">
    <div class="container">
        <div class="row mt-3">
            <?php

            $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$get_user_id'");
            while ($rows = mysqli_fetch_assoc($get_asset)) {
                @$asset_id = $rows["id"];
                @$asset_name = $rows["asset_name"];
                @$asset_thumbnail = $rows["asset_thumbnail"];
                @$asset_price = $rows["asset_price"];
                @$asset_location = $rows["asset_location"];
                $new_symbol = $rows['symbol'];
                @$asset_category = intval($rows["asset_category"]);
                @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                @$asset_sub_category = intval($rows["asset_sub_category"]);
                @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                (getimagesize($asset_thumbnail)[1]);
                if (getimagesize($asset_thumbnail)[1] > 500) {
                    $width = "260";
                    $height = "200";
                    $margin = "0px";
                } else {
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

                cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
            }
            ?>
        </div>
    </div>
</section>
<!--=====================================
                    MY ADS PART END
        =======================================-->

<?php include('./components/footer.php'); ?>