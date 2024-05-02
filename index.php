<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You are now logged in to your account.");
}
include('./components/sidebar.php');

?>
<link rel="stylesheet" href="./assets/css/custom/index.css">

<!--=====================================
                    BANNER PART START
        =======================================-->
<section class="banner-part">
    <div class="container">
        <div class="banner-content">
            <h1></h1><br><br><br><br>
        </div>
    </div>
</section>
<!--=====================================
                    BANNER PART END
        =======================================-->


<!--=====================================
                    SUGGEST PART START
        =======================================-->
<section class="suggest-part">
    <div class="container">
        <div class="suggest-slider slider-arrow">
            <?php
            $get_categories = mysqli_query($conn, "SELECT * FROM `categories` ORDER BY id DESC");
            while ($rows = mysqli_fetch_array($get_categories)) {
                $category_id = $rows["id"];
                $category_name = $rows["category_name"];
                $category_icon = $rows["category_icon"];
                echo '
                <a href="listing.php?cat_id=' . $category_id . '" class="suggest-card" style="background-color: #000; border: 2px solid white;">
                <img src="' . $category_icon . '" alt="car">
                <h6 class="text-white">' . $category_name . '</h6>
                <p class="text-white">' . mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_category = '$category_id' AND asset_condition = 'active'")) . ' ads</p>
                </a>
            ';
            }
            ?>
        </div>
    </div>
</section>

<section class="section recomend-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Top <span>Products</span></h2>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $get_assets = mysqli_query($conn, "SELECT * FROM `assets` WHERE asset_condition = 'active' ORDER BY `id` DESC LIMIT 8");
            while ($rows = mysqli_fetch_array($get_assets)) {
                @$asset_id = $rows["id"];
                @$asset_name = $rows["asset_name"];
                @$asset_thumbnail = $rows["cropped_image_data"];
                @$asset_price = $rows["asset_price"];
                @$asset_location = $rows["asset_location"];
                $new_symbol = $rows['symbol'];
                @$asset_category = intval($rows["asset_category"]);
                @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                @$asset_sub_category = intval($rows["asset_sub_category"]);
                @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");

                $width = "263px";
                $height = "268px";
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
                }

                cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
            }
            ?>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <?php
                    if (@$_SESSION['user_email']) {
                    ?>
                        <h2>Recently Viewed <span>Products</span></h2>
                    <?php } else { ?>
                        <h2>Recent <span>Products</span></h2>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (@$_SESSION['user_email']) {
                if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM recently_viewed WHERE user_id = '$user_id'")) > 0) {
                    $get_recently_viewd = mysqli_query($conn, "SELECT * FROM `assets` WHERE asset_condition = 'active' ORDER BY `id` DESC LIMIT 8");
                    while ($rows = mysqli_fetch_array($get_recently_viewd)) {
                        @$recent_asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["cropped_image_data"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        @$new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category'");
                        $width = "263px";
                        $height = "268px";
                        $get_recently_viewd_asset = $rows['id'];
                        $get_assets = mysqli_query($conn, "SELECT * FROM recently_viewed WHERE user_id = '$user_id' AND asset_id = '$get_recently_viewd_asset' ORDER BY id DESC LIMIT 8");
                        while ($rows = mysqli_fetch_array($get_assets)) {

                            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                        }
                    }
                }
            } else {
                $get_assets = mysqli_query($conn, "SELECT * FROM `assets` WHERE asset_condition = 'active' ORDER BY `id` DESC LIMIT 8");
            }
            while ($rows = mysqli_fetch_array(@$get_assets)) {
                $asset_id = $rows["id"];
                $asset_name = $rows["asset_name"];
                $asset_thumbnail = $rows["cropped_image_data"];
                $asset_price = $rows["asset_price"];
                $asset_location = $rows["asset_location"];
                $new_symbol = $rows['symbol'];
                $asset_category = intval($rows["asset_category"]);
                $asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                $asset_sub_category = intval($rows["asset_sub_category"]);
                $asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                $width = "263px";
                $height = "268px";
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
        <br><br>
        <!-- <div class="recomend-slider slider-arrow mt-4">
                    <?php
                    $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `assets`")) - 8;
                    $get_assets = mysqli_query($conn, "SELECT * FROM `assets` WHERE asset_condition = 'active' AND id BETWEEN '1' AND '$num' ORDER BY id DESC LIMIT 4");
                    while ($rows = mysqli_fetch_array($get_assets)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["cropped_image_data"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        $width = "263px";
                        $height = "268px";
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
                </div> -->
    </div>
    </div>
    </div>
</section>

<section class="section category-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-center-heading">
                    <h2>Product <span>Categories</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $get_categories = mysqli_query($conn, "SELECT * FROM `categories`");
            while ($rows = mysqli_fetch_array($get_categories)) {
                $category_id = $rows["id"];
                $category_name = $rows["category_name"];
                $category_image = $rows["category_image"];
                echo '
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <div class="category-card">
                    <div class="category-head">
                        <img src="' . $category_image . '" alt="category">
                        <a href="./listing.php?cat_id=' . $category_id . '" class="category-content">
                            <h4>' . $category_name . '</h4>
                            <p>' . mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_category = '$category_id' AND asset_condition = 'active'")) . '</p>
                        </a>
                    </div>
                    <ul class="category-list">
                    ';
                $get_sub_categories = mysqli_query($conn, "SELECT * FROM `sub_categories` WHERE category_id = '$category_id' LIMIT 5");
                while ($rows = mysqli_fetch_array($get_sub_categories)) {
                    $sub_category_id = $rows["id"];
                    $sub_category_name = $rows["sub_category_name"];
                    echo '
                        <li><a href="./sub_listing.php?cat_id=' . $sub_category_id . '">
                                <h6>' . $sub_category_name . '</h6>
                                <p>' . mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_sub_category = '$sub_category_id' AND asset_condition = 'active'")) . '</p>
                            </a></li>';
                }
                echo '
                        </ul>
                </div>
            </div>
                ';
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="center-20">
                    <a href="./category_list.php" class="btn btn-inline">
                        <i class="fas fa-eye"></i>
                        <span>view all categories</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="intro-part" style="height: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <div class="section-center-heading">
                    <h2>Do you have something to share and rent to others?</h2>
                    <?php
                    if (isset($_SESSION['user_email'])) { ?>
                        <a href="./ad_post.php" class="btn btn-outline">
                            <i class="fas fa-plus-circle"></i>
                            <span>Rent Out</span>
                        </a>
                    <?php } else { ?>
                        <a href="./auth/auth.php" class="btn btn-outline">
                            <i class="fas fa-plus-circle"></i>
                            <span>Rent Out</span>
                        </a>
                    <?php }  ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    INTRO PART END
        =======================================-->


<?php include('./components/footer.php'); ?>