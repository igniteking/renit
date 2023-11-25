<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
include('./components/sidebar.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
?>
<link rel="stylesheet" href="./assets/css/custom/index.css">
<br><br>
<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->
<style>
    @media only screen and (max-width: 350px) and (min-width: 0px) {
        .side_margin_for_card {
            margin-left: 1rem;
        }
    }

    @media only screen and (max-width: 700px) and (min-width: 350px) {
        .side_margin_for_card {
            margin-left: 2.5rem;
        }
    }
</style>

<!--=====================================
                    AD LIST PART START
        =======================================-->
<section class="inner-section ad-list-part mt-md-5 pt-5">
    <div class="container">
        <div class="row content-reverse">

            <div class="col-lg-8 col-xl-9">
                <div class="row" id="notify">
                    <?php
                    $asset_search_name = $_GET['asset'];
                    $asset_key = $_GET['key'];
                    $min_price = @$_GET['min_price'];
                    if ($min_price == '') {
                        $min_price = 0;
                    }
                    $max_price = @$_GET['max_price'];
                    $get_npo_stars = @$_GET['stars'];
                    if ($get_npo_stars) {
                        if ($max_price) {
                            if (empty($asset_search_name) && empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price ORDER BY id DESC LIMIT 15");
                                while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                    (getimagesize('./' . $asset_thumbnail)[1]);
                                    if (getimagesize('./' . $asset_thumbnail)[1] > 500) {
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

                                    $arr = array();
                                    $i = 0;
                                    $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                                    if (mysqli_num_rows($get_stars) > 0) {

                                        while ($stars = mysqli_fetch_array($get_stars)) {
                                            $staers = $stars['stars'];
                                            $arr[$i] = $staers;
                                            $i++;
                                        }
                                        $ranasdklamsd = array_sum($arr) / count($arr);
                                    } else {
                                        $ranasdklamsd = 0;
                                    }
                                    if ($ranasdklamsd  == $get_npo_stars) {
                                        echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                    }
                                }
                            } else if (empty($asset_search_name)) {
                    ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&min_price<?= @$_GET['min_price'] ?>&&max_price=<?= @$_GET['max_price'] ?>&&stars=<?= @$_GET['stars'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else if (empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                            $height = "200";
                                            $width = "";
                                        }
                                        $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                                        if ($get_bookmark > 0) {
                                            $type = 'remove';
                                            $icon = 'fas';
                                        } else {
                                            $icon = 'far';
                                            $type = 'add';
                                        }
                                        $arr = array();
                                        $i = 0;
                                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                                        if (mysqli_num_rows($get_stars) > 0) {

                                            while ($stars = mysqli_fetch_array($get_stars)) {
                                                $staers = $stars['stars'];
                                                $arr[$i] = $staers;
                                                $i++;
                                            }
                                            $ranasdklamsd = array_sum($arr) / count($arr);
                                        } else {
                                            $ranasdklamsd = 0;
                                        }
                                        if ($ranasdklamsd  == $get_npo_stars) {
                                            echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                        }
                                    }
                                } else {
                                    echo '<div class="row"><div class="card"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (!empty($asset_search_name) && !empty($asset_key)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&min_price<?= @$_GET['min_price'] ?>&&max_price=<?= @$_GET['max_price'] ?>&&stars=<?= @$_GET['stars'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else {
                                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                            }
                        } else {
                            if (empty($asset_search_name) && empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_condition = 'active' ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                        (getimagesize('./' . $asset_thumbnail)[1]);
                                        if (getimagesize('./' . $asset_thumbnail)[1] > 500) {
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
                                        $arr = array();
                                        $i = 0;
                                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                                        if (mysqli_num_rows($get_stars) > 0) {

                                            while ($stars = mysqli_fetch_array($get_stars)) {
                                                $staers = $stars['stars'];
                                                $arr[$i] = $staers;
                                                $i++;
                                            }
                                            $ranasdklamsd = array_sum($arr) / count($arr);
                                        } else {
                                            $ranasdklamsd = 0;
                                        }
                                        if ($ranasdklamsd  == $get_npo_stars) {
                                            echo '
                
                                            <div class="col-md-4">
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
                                                        </div>
                                                    </div>
                                                    </div>
                                                                ';
                                        }
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (empty($asset_search_name)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&stars=<?= @$_GET['stars'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else if (empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                            $height = "200";
                                            $width = "";
                                        }
                                        $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                                        if ($get_bookmark > 0) {
                                            $type = 'remove';
                                            $icon = 'fas';
                                        } else {
                                            $icon = 'far';
                                            $type = 'add';
                                        }
                                        $arr = array();
                                        $i = 0;
                                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                                        if (mysqli_num_rows($get_stars) > 0) {

                                            while ($stars = mysqli_fetch_array($get_stars)) {
                                                $staers = $stars['stars'];
                                                $arr[$i] = $staers;
                                                $i++;
                                            }
                                            $ranasdklamsd = array_sum($arr) / count($arr);
                                        } else {
                                            $ranasdklamsd = 0;
                                        }
                                        if ($ranasdklamsd  == $get_npo_stars) {
                                            echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                        }
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (!empty($asset_search_name) && !empty($asset_key)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&stars=<?= @$_GET['stars'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else {
                                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                            }
                        }
                    } else {
                        if ($max_price) {
                            if (empty($asset_search_name) && empty($asset_key)) {

                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                        (getimagesize('./' . $asset_thumbnail)[1]);
                                        if (getimagesize('./' . $asset_thumbnail)[1] > 500) {
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

                                        echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (empty($asset_search_name)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&min_price<?= @$_GET['min_price'] ?>&&max_price=<?= @$_GET['max_price'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else if (empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                            $height = "200";
                                            $width = "";
                                        }
                                        $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                                        if ($get_bookmark > 0) {
                                            $type = 'remove';
                                            $icon = 'fas';
                                        } else {
                                            $icon = 'far';
                                            $type = 'add';
                                        }

                                        echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (!empty($asset_search_name) && !empty($asset_key)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>&&min_price<?= @$_GET['min_price'] ?>&&max_price=<?= @$_GET['max_price'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else {
                                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                            }
                        } else {
                            if (empty($asset_search_name) && empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_condition = 'active' ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                        (getimagesize('./' . $asset_thumbnail)[1]);
                                        if (getimagesize('./' . $asset_thumbnail)[1] > 500) {
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

                                        echo '
                
                                        <div class="col-md-4">
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
                                                    </div>
                                                </div>
                                                </div>
                                                            ';
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (empty($asset_search_name)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                            <?php
                            } else if (empty($asset_key)) {
                                $get_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' ORDER BY id DESC LIMIT 15");
                                if (mysqli_num_rows($get_assets) > 0) {
                                    while ($rows = mysqli_fetch_assoc($get_assets)) {
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
                                            $height = "200";
                                            $width = "";
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

                                        echo '
                
            <div class="col-md-4">
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
                        </div>
                    </div>
                    </div>
                                ';
                                    }
                                } else {
                                    echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                                }
                            } else if (!empty($asset_search_name) && !empty($asset_key)) {
                            ?>
                                <input type="hidden" hx-get="./helpers/convert.php?asset=<?= @$_GET['asset'] ?>" hx-include="[id='location']" hx-target="#notify" hx-trigger="load keyup changed" id="location" value="<?= str_replace(" ", "", $_GET['key']) ?>" class="form-control" name="address">
                    <?php
                            } else {
                                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4 col-xl-3">
                <button onclick="hide()" id="butt" class="btn btn-dark col-md-12 mb-2">Show Filter</button>
                <style>
                    #butt {
                        display: none;
                    }

                    @media only screen and (max-width: 600px) {
                        #randomething {
                            display: none;
                        }

                        #butt {
                            display: block;
                            background-color: black;
                        }
                    }
                </style>
                <script>
                    function hide() {
                        var x = document.getElementById('randomething');
                        if (x.style.display == 'none') {
                            x.style.display = 'block';
                            console.log('show');
                        } else {
                            x.style.display = 'none';
                            console.log('hide');
                        }
                    }
                </script>
                <div class="row" id="randomething">
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by Price</h6>
                            <form class="product-widget-form" action="./ad_listing.php" method="get">
                                <div class="product-widget-group">
                                    <input type="number" name="min_price" min="0" placeholder="min - 00">
                                    <input type="number" name="max_price" max="100000" placeholder="max - 1L">
                                    <input type="hidden" name="asset" value="<?= @$_GET['asset'] ?>">
                                    <input type="hidden" name="key" value="<?= @$_GET['key'] ?>">
                                    <input type="hidden" name="stars" value="<?= @$_GET['stars'] ?>">
                                </div>
                                <button type="submit" class="product-widget-btn">
                                    <i class="fas fa-search"></i>
                                    <span>search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                            <h6 class="product-widget-title">Filter by rating</h6>
                            <form class="product-widget-form" method="get" action="./ad_listing.php">
                                <ul class="product-widget-list">
                                    <li class="product-widget-item">
                                        <input type="hidden" name="asset" value="<?= @$_GET['asset'] ?>">
                                        <input type="hidden" name="key" value="<?= @$_GET['key'] ?>">
                                        <input type="hidden" name="max_price" value="<?= @$_GET['max_price'] ?>">
                                        <input type="hidden" name="min_price" value="<?= @$_GET['min_price'] ?>">
                                        <div class="product-widget-checkbox">
                                            <input type="radio" name="stars" value="5" id="chcek4">
                                        </div>
                                        <label class="product-widget-label" for="chcek4">
                                            <span class="product-widget-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="product-widget-number">(<?= mysqli_num_rows(mysqli_query($conn, "SELECT stars FROM review WHERE stars = '5'")) ?>)</span>
                                        </label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox">
                                            <input type="radio" name="stars" value="4" id="chcek5">
                                        </div>
                                        <label class="product-widget-label" for="chcek5">
                                            <span class="product-widget-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="product-widget-number">(<?= mysqli_num_rows(mysqli_query($conn, "SELECT stars FROM review WHERE stars = '4'")) ?>)</span>
                                        </label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox">
                                            <input type="radio" name="stars" value="3" id="chcek6">
                                        </div>
                                        <label class="product-widget-label" for="chcek6">
                                            <span class="product-widget-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="product-widget-number">(<?= mysqli_num_rows(mysqli_query($conn, "SELECT stars FROM review WHERE stars = '3'")) ?>)</span>
                                        </label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox">
                                            <input type="radio" name="stars" value="2" id="chcek7">
                                        </div>
                                        <label class="product-widget-label" for="chcek7">
                                            <span class="product-widget-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="product-widget-number">(<?= mysqli_num_rows(mysqli_query($conn, "SELECT stars FROM review WHERE stars = '2'")) ?>)</span>
                                        </label>
                                    </li>
                                    <li class="product-widget-item">
                                        <div class="product-widget-checkbox">
                                            <input type="radio" name="stars" value="1" id="chcek8">
                                        </div>
                                        <label class="product-widget-label" for="chcek8">
                                            <span class="product-widget-star">
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="product-widget-number">(<?= mysqli_num_rows(mysqli_query($conn, "SELECT stars FROM review WHERE stars = '1'")) ?>)</span>
                                        </label>
                                    </li>
                                </ul>
                                <button type="submit" class="product-widget-btn">
                                    <i class="fas fa-search"></i>
                                    <span>search</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    AD LIST PART END
        =======================================-->
<?php include('./components/footer.php'); ?>