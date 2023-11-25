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
<link rel="stylesheet" href="./assets/css/custom/bookmark.css">
<?php // Fetch user details
$get_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$user_id'");
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
<!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
<!-- <section class="single-banner dashboard-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>bookmark</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">bookmark</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


<!--=====================================
                DASHBOARD HEADER PART START
        =======================================-->
<?php include('./components/dash_comp.php'); ?>

<!--=====================================
                DASHBOARD HEADER PART END
        =======================================-->


<!--=====================================
                    BOOKMARK PART START
        =======================================-->
<section class="bookmark-part">
    <div class="container">
        <div class="row">
            <?php
            $get_bookmarkasdasd = mysqli_query($conn, "SELECT * FROM `bookmark` WHERE `user_id` = '$logged_id'");
            if ($get_bookmarkasdasd) {
                while ($rows = mysqli_fetch_assoc($get_bookmarkasdasd)) {
                    $asset__get_id = $rows['asset_id'];
                    $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$asset__get_id'");
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
                        $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                        if ($get_bookmark > 0) {
                            $type = 'remove';
                            $icon = 'fas';
                        } else {
                            $icon = 'far';
                            $type = 'add';
                        }

                        cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
<!--=====================================
                    BOOKMARK PART END
        =======================================-->

<?php include('./components/footer.php'); ?>