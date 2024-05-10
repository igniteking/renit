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
                DASHBOARD HEADER PART START
        =======================================-->
<?php include('./components/dash_comp.php'); ?>
<!--=====================================
                DASHBOARD HEADER PART END
        =======================================-->


<!--=====================================
                    MY ADS PART START
        =======================================-->
<section class="myads-part mt-4">

    <div class="container">
        <div class="row">
            <?php
            $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$user_id'");
            $count = mysqli_num_rows($get_asset);
            if ($count > 0) {
                while ($rows = mysqli_fetch_array($get_asset)) {
                    @$asset_id = $rows["id"];
                    @$asset_name = $rows["asset_name"];
                    @$asset_thumbnail = $rows["cropped_image_data"];
                    @$asset_price = $rows["asset_price"];
                    @$asset_location = $rows["asset_location"];
                    @$asset_condition = $rows["asset_condition"];
                    $new_symbol = $rows['symbol'];
                    @$asset_category = intval($rows["asset_category"]);
                    @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                    @$asset_sub_category = intval($rows["asset_sub_category"]);
                    @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                    $width = "268px";
                    $height = "268px";
                    $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                    if ($get_bookmark > 0) {
                        $type = 'remove';
                        $icon = 'fas';
                    } else {
                        $icon = 'far';
                        $type = 'add';
                    }

                    if ($asset_condition == 'active') {
                        $active_status = 'checked';
                    } else {
                        $active_status = '';
                    }
                    echo '<div class="col-md-3">
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
                            <h5 class="product-title" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
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
                            <div class="btn-group row m-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn-sm mr-2" style="background-color: black; color: white;"><a href="./edit.php?asset_id=' . $asset_id . '" class="text-white">Edit</a></button>
                            <button type="button" hx-confirm="Are you sure you wish to delete this product?" title="Delete This Asset" hx-get="./helpers/delete_asset.php?asset_id=' . $asset_id . '"  hx-trigger="click" hx-target="#notify' . $asset_id . '" class="btn-sm btn-danger mr-2">Delete</button>
                            <div class="custom-control custom-switch">
                            <div id="rand' . $asset_id . '">
                                <input type="checkbox" ' . $active_status . ' class="custom-control-input" id="customSwitches' . $asset_id . '" hx-get="./helpers/asset_status.php?asset_id=' . $asset_id . '&&status=' . $asset_condition . '"  hx-trigger="click" hx-target="#rand' . $asset_id . '">
                            <label class="custom-control-label" for="customSwitches' . $asset_id . '">Status</label>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>';
                }
            } else {
                echo 'No Record  Found ...';
            }
            ?>
        </div>
    </div>
</section>
<!--=====================================
                    MY ADS PART END
        =======================================-->

<?php include('./components/footer.php'); ?>