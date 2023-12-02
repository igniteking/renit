<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
if (@$_GET['code'] == 1) {
    Toast("warning", "Preview is ready !");
}
include('./components/sidebar.php');
?>
<link rel="stylesheet" href="./assets/css/custom/ad-details.css">

<?php

$asset_new = $_GET['asset_id'];
$date = date('Y-m-d H:i:s');
if (@$user_id) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM recently_viewed WHERE user_id = '$user_id' AND asset_id = '$asset_new'")) == 0) {
        $run = mysqli_query($conn, "INSERT INTO `recently_viewed`(`id`, `asset_id`, `user_id`, `created_at`) 
VALUES (NULL,'$asset_new','$user_id','$date')");
    }
}

$get_asset_id = $_GET['asset_id'];
$get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE id = '$get_asset_id'");
while ($rows = mysqli_fetch_assoc($get_asset)) {
    $asset_brand = $rows['asset_brand'];
    $asset_by_address = $rows['asset_by_address'];
    $asset_by_area = $rows['asset_by_area'];
    $asset_by_name = $rows['asset_by_name'];
    $asset_by_number = $rows['asset_by_number'];
    $asset_category = $rows['asset_category'];
    $asset_description = $rows['asset_description'];
    $asset_images = $rows['asset_images'];
    $asset_location = $rows['asset_location'];
    $asset_model = $rows['asset_model'];
    $asset_name = $rows['asset_name'];
    $asset_safety_deposite = $rows['asset_safety_deposite'];
    $asset_sub_category = $rows['asset_sub_category'];
    $firstasset_thumbnail = $rows['asset_thumbnail'];
    $asset_useage_description = $rows['asset_useage_description'];
    $asset_user = $rows['asset_user'];
    $symbol = $rows['symbol'];
    $curr_code = $rows['curr_code'];
    $asset_price = $rows['asset_price'];
    $asset_category = intval($rows["asset_category"]);
    $asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
    $asset_sub_category = intval($rows["asset_sub_category"]);
    $asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
    $asset_tag = ($rows["asset_tag"]);

    (getimagesize($firstasset_thumbnail)[1]);
    if (getimagesize($firstasset_thumbnail)[1] > 500) {
        $width = "260";
        $height = "200";
        $margin = "0px";
    } else {
        $margin = "0px";
    }
    // Fetch user details
    $get_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$asset_user'");
    while ($rows = mysqli_fetch_assoc($get_user)) {
        $asset_user_id = $rows['id'];
        $asset_username = $rows['user_name'];
        $asset_profile_picture = $rows['profile_picture'];
        $asset_user_email = $rows['user_email'];
        $asset_user_location = $rows['user_location'];
        $asset_user_type = $rows['user_type'];
        $asset_user_created_at = $rows['created_at'];
    }
}
?>

<section class="inner-section ad-details-part">
    <div class="container d-flex justify-content-center">

        <div class="row content-reverse" style="width: 100%;">
            <div class="col-lg-4">

                <!-- AUTHOR CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">publisher info</h5>
                    </div>
                    <div class="ad-details-author">
                        <a href="#" class="author-img">
                            <img src="<?= $asset_profile_picture == '' ? './assets/images/user.png' : $asset_profile_picture; ?>" alt="avatar">
                        </a>
                        <div class="author-meta">
                            <h4><a href="#"><?= $asset_username; ?></a></h4>
                            <h5>joined: <?= $asset_user_created_at; ?></h5>
                        </div>
                        <div class="author-widget">
                            <div id="refresh"></div>
                            <a href="./profile_view.php?user_id=<?= $asset_user_id ?>" title="Profile" class="fas fa-eye"></a>
                            <button type="button" title="Copy Profile Link" class="link fas fa-link" onclick="myFunction()"></button>
                        </div>
                        <ul class="author-list">
                            <li>
                                <h6>total Products</h6>
                                <p><?=
                                    mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$asset_user'"))
                                    ?></p>
                            </li>
                            <li>
                                <h6>total ratings</h6>
                                <p><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$get_asset_id'")); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <script>
                    function change_min_date() {
                        var date = document.getElementById('from_date').value;
                        document.getElementById('to_date').setAttribute("min", date);
                    }
                </script>
                <!-- SAFETY CARD -->
                <div class="d-none d-md-block">
                    <?php
                    if (@$_SESSION['user_email'] and $asset_user_id != $user_id) {
                    ?>
                        <div class="common-card">
                            <div class="card-header">
                                <h5 class="card-title">Make An Offer</h5>
                            </div>
                            <div class="ad-details-safety">
                                <form action="./helpers/chat_link.php" method="get">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input type="date" name="from" onchange="change_min_date()" min="<?= date('Y-m-d') ?>" id="from_date" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="from">To</label>
                                        <input type="date" name="to" min="<?= date('Y-m-d') ?>" id="to_date" class="form-control" placeholder="Email">
                                    </div>
                                    <input type="hidden" name="asset_id" value="<?= $_GET['asset_id']; ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="reciver_id" value="<?= $user_id ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="owner_id" value="<?= $asset_user_id ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="message" value="<?= $message ?>" class="form-control" placeholder="Email">
                                    <div class="form-group">
                                        <label for="from">Your Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="00.00">
                                    </div>
                                    <button type="submit" name="offer" class="btn btn-inline review-submit">
                                        <i class="fas fa-clipboard"></i>
                                        <span>Make An Offer</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="common-card">
                            <div class="card-header">
                                <h5 class="card-title">Make An Offer</h5>
                            </div>
                            <div class="ad-details-safety">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" name="from" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="from">To</label>
                                    <input type="date" name="to" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                </div>
                                <input type="hidden" name="asset_id" value="<?= $_GET['asset_id']; ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="reciver_id" value="<?= $user_id ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="owner_id" value="<?= $asset_user_id ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="message" value="<?= $message ?>" class="form-control" placeholder="Email">
                                <div class="form-group">
                                    <label for="from">Your Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="00.00">
                                </div>
                                <a href="./auth/auth.php" style="all: unset;">
                                    <button type="submit" name="offer" class="btn btn-inline review-submit">
                                        <i class="fas fa-clipboard"></i>
                                        <span>Make An Offer</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- LOCATION CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">area map</h5>
                    </div>
                    <iframe class="ad-details-map" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw&q=<?= $asset_location ?>"></iframe>
                </div>

                <!-- SAFETY CARD -->
                <!-- <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">safety tips</h5>
                    </div>
                    <div class="ad-details-safety">
                        <p>Check the item before you buy</p>
                        <p>Pay only after collecting item</p>
                        <p>Beware of unrealistic offers</p>
                        <p>Meet seller at a safe location</p>
                        <p>Do not make an abrupt decision</p>
                        <p>Be honest with the ad you post</p>
                    </div>
                </div> -->

                <!-- FEATURE CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Similar Products</h5>
                    </div>
                    <div class="ad-details-feature slider-arrow">
                        <?php
                        $just = $_GET['asset_id'];
                        $get_featured_assets = mysqli_query($conn, "SELECT * FROM assets WHERE asset_category = '$asset_category' AND id <> '$just' AND asset_condition = 'active' LIMIT 5");
                        if (mysqli_num_rows($get_featured_assets) > 0) {
                            while ($rows = mysqli_fetch_assoc($get_featured_assets)) {
                                @$just_asset_id = $rows["id"];
                                @$just_asset_name = $rows["asset_name"];
                                @$just_asset_thumbnail = $rows["asset_thumbnail"];
                                @$just_asset_price = $rows["asset_price"];
                                @$just_asset_location = $rows["asset_location"];
                                $new_symbol = $rows['symbol'];
                                @$just_asset_category = intval($rows["asset_category"]);
                                @$just_asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                                @$just_asset_sub_category = intval($rows["asset_sub_category"]);
                                @$just_asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                                (getimagesize($just_asset_thumbnail)[1]);
                                if (getimagesize($just_asset_thumbnail)[1] > 500) {
                                    $width = "260px";
                                    $height = "200px";
                                    $margin = "0px";
                                } else {
                                    $margin = "0px";
                                    $width = "0px";
                                    $height = "0px";
                                }
                                if (@$_SESSION['user_email']) {
                                    $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$just_asset_id'"));
                                    if ($get_bookmark > 0) {
                                        $type = 'remove';
                                        $icon = 'fas';
                                    } else {
                                        $icon = 'far';
                                        $type = 'add';
                                    }
                                }
                                echo '
                            <div class="product-card">
                                <a href="./ad_page.php?asset_id=' . $just_asset_id . '" class="feature-img">
                                <img class="object-fit-contain" style="object-position: center; object-fit: contain;" width="' . $width . '" height="' . $height . '" src="' . $just_asset_thumbnail . '" alt="product">
                                </a>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">' . $just_asset_category_name . '</a></li>
                                <li class="breadcrumb-item active" aria-current="page">' . $just_asset_sub_category_name . '</li>
                                </ol>
                                <h5 class="product-title" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <a href="./ad_page.php?asset_id=' . $just_asset_id . '">' . $just_asset_name . '</a>
                                </h5>
                            <div class="product-meta" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <span><i class="fas fa-map-marker-alt"></i>' . $just_asset_location . '</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">' . $new_symbol . $just_asset_price . '<span>/Per Day</span></h5>
                                ';
                                if (@$_SESSION['user_email']) {
                                    echo '<div id="notify' . $just_asset_id . '">
                                    <button type="button" title="Wishlist" hx-get="./helpers/bookmark.php?type=' . $type . '&&asset_id=' . $just_asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify' . $just_asset_id . '" class="' . $icon . ' fa-heart"></button>
                                    </div>';
                                }
                                echo '
                            </div>
                            </div>
                            </div>
                                ';
                            }
                        } else {
                            echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <!-- AD DETAILS CARD -->
                <div class="common-card">
                    <div class="ad-details-slider-group" dir="rlt">
                        <div class="ad-details-slider slider-arrow">
                            <div class="product-media">
                                <div class="ml-sm-5 ml-md-0">
                                    <img class="object-fit-contain border rounded" style="object-position: center; object-fit: contain;" width="500px" height="500px" src="<?= $firstasset_thumbnail ?>" alt="product">
                                </div>
                            </div>
                            <?php
                            $files = glob($asset_images . '*');
                            $var = count($files);
                            for ($i = 0; $i < $var; $i++) {
                                echo '
                                <div class="product-media">
                                <div class="">
                                <img class="object-fit-contain border rounded" style="object-position: center; object-fit: contain;" width="500px" height="500px" src="' . $files[$i] . '" alt="product">
                                </div>
                        </div>
                                
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <style>
                        .style {
                            height: 100px;
                        }

                        @media only screen and (max-width: 600px) {
                            .style {
                                height: 100px;
                            }
                        }
                    </style>
                    <div class="ad-thumb-slider" dir="rlt">
                        <div class="product-media">
                            <div class="ml-5 ml-md-0">
                                <img class="object-fit-contain border rounded style" style="object-position: center; object-fit: contain;" width="500px" height="500px" src=" <?= $firstasset_thumbnail ?>" alt="product">
                            </div>
                        </div>
                        <?php
                        $files = glob($asset_images . '*');
                        $var = count($files);
                        for ($i = 0; $i < $var; $i++) {
                            echo '
                            <div class="product-media">
                            <div class="">
                                <img class="object-fit-contain border rounded style" style="object-position: center; object-fit: contain;" width="500px" height="500px" src="' . $files[$i] . '" alt="product">
                                </div>
                    </div>
                                ';
                        }
                        ?>
                    </div>
                    <div class="row">
                        <style>
                            #hideondesk {
                                display: none;
                            }

                            @media only screen and (max-width: 600px) {

                                #hide_mob,
                                #cat,
                                #name,
                                #loc {
                                    display: none;
                                }

                                #hideondesk {
                                    display: block;
                                    margin-bottom: 30px;
                                }
                            }
                        </style>
                    </div>
                    <br>
                    <h3 class="ad-details-title" style="margin-left: -10px; margin-left: 1px;" id="name"><?= $asset_name ?></h3>
                    <!-- PRICE CARD -->
                    <div id="hideondesk" class="row">
                        <div class="ad-details-action col-md-12">
                            <div type="button" style="background-color: white; font-size:27px; font-weight:bold; text-transform: capitalize;" class="wish"><?= $asset_name ?></div>
                        </div>
                    </div>
                    <div class="ad-details-action">
                        <?php
                        if (isset($user_id)) {
                            // Get bookmarks for this asset
                            $asset__get_id = $_GET['asset_id'];
                            $get_bookmark = mysqli_query($conn, "SELECT * FROM bookmark WHERE user_id = '$user_id' AND asset_id = '$asset__get_id'");
                            if (mysqli_num_rows($get_bookmark) > 0) {
                                $var = '<i class="fas fa-check"></i>bookmarked';
                                $type = "remove";
                            } else {
                                $var = '<i class="fas fa-heart"></i>bookmark';
                                $type = "add";
                            }
                        }
                        if (@$_SESSION['user_email']) {
                            echo '<div id="notify">
                                <button type="button" title="Wishlist" hx-get="./helpers/bookmark.php?state=button&&type=' . $type . '&&asset_id=' . $asset__get_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify">' . $var . '</button>
                                </div>
                                '; ?>
                            <?php
                            if ($asset_user_id == $user_id) {
                                echo '<a href="#" style="all: unset;" title="Owned By You"><button type="button">Owned By You</button></a>';
                            } else {
                            ?>
                                <a href="./helpers/chat_link.php?asset_id=<?= $get_asset_id ?>&&owner_id=<?= $asset_user ?>&&reciver_id=<?= $user_id ?>" style="all: unset;" title="Chat"><button type="button"><i class="fa fa-comment"></i>Chat</button></a>
                            <?php } ?>
                            <a href="./contact.php" style="all: unset;" title="Report"><button type="button"><i class="fas fa-exclamation-triangle"></i>report</button></a>
                        <?php
                        } else { ?>
                            <a href="./auth/auth.php" style="all: unset;" title="Bookmark"><button type="button"><i class="fas fa-heart"></i>bookmark</button></a>
                            <a href="./auth/auth.php" style="all: unset;" title="Chat"><button type="button"><i class="fa fa-comment"></i>Chat</button></a>
                            <a href="./contact.php" style="all: unset;" title="Report"><button type="button"><i class="fas fa-exclamation-triangle"></i>report</button></a>

                        <?php } ?>

                    </div>
                </div>

                <!-- SPECIFICATION CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Specification</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>price:</h6>
                            <p><?= $symbol . ' ' . $asset_price ?></p>
                        </li>
                        <li>
                            <h6>published:</h6>
                            <p><?= date('d M Y') ?></p>
                        </li>
                        <li>
                            <h6>location:</h6>
                            <p style="white-space: normal; margin-left: 15px; text-align:right;"><?= $asset_location ?></p>
                        </li>
                        <li>
                            <h6>category:</h6>
                            <p style="margin-left: 36px;"><?= $asset_category_name ?> / <?= $asset_sub_category_name ?></p>
                        </li>
                        <li>
                            <h6>asset model:</h6>
                            <p><?= $asset_model ?></p>
                        </li>
                        <li>
                            <h6>asset deposit:</h6>
                            <p><?= $symbol . ' ' . $asset_safety_deposite ?></p>
                        </li>
                    </ul>
                </div>
                <!-- DESCRIPTION CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc"><?= $asset_description ?></p>
                </div>

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Currency Convertor</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>
                                <?= $symbol . ' ' . $asset_price ?>
                                <input type="hidden" class="col-md-12 form-control" id="amount" value="<?= $asset_price ?>" name="amount"></input>
                            </h6>
                            <input type="hidden" class="col-md-12 form-control" id="key" value="<?= $curr_code ?>" name="key"></input>
                            <div id="randometjdgj">
                            </div>
                        </li>
                        <li>
                            <h6>to:</h6>
                            <input type="hidden" hx-get="./helpers/currence_convertion.php?get_curr_code=1" hx-target="#valuesin" hx-trigger="load keyup changed" id="">
                            <select class="form-control" id="valuesin" name="var" hx-get="./helpers/currence_convertion.php" hx-target="#randometjdgj" hx-include="[id='key'],[id='amount']" hx-trigger="click changed">
                                <option value=""></option>
                            </select>
                        </li>
                        <z style="text-transform:inherit;">
                            Reflected prices here are based on previous closing.
                        </z>
                    </ul>
                </div>

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Usage Description</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <?= $asset_useage_description  ?>
                    </ul>
                </div>

                <div class="d-md-none d-block">
                    <script>
                        function change_min_date2() {
                            var date = document.getElementById('date_from').value;
                            document.getElementById('date_to').setAttribute("min", date);
                        }
                    </script>
                    <?php
                    if (@$_SESSION['user_email'] and $asset_user_id != $user_id) {
                    ?>
                        <div class="common-card">
                            <div class="card-header">
                                <h5 class="card-title">Make An Offer</h5>
                            </div>
                            <div class="ad-details-safety">
                                <form action="./helpers/chat_link.php" method="get">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input type="date" name="from" id="date_from" onchange="change_min_date2()" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="from">To</label>
                                        <input type="date" name="to" id="date_to" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                    </div>
                                    <input type="hidden" name="asset_id" value="<?= $_GET['asset_id']; ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="reciver_id" value="<?= $user_id ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="owner_id" value="<?= $asset_user_id ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" name="message" value="<?= $message ?>" class="form-control" placeholder="Email">
                                    <div class="form-group">
                                        <label for="from">Your Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="00.00">
                                    </div>
                                    <button type="submit" name="offer" class="btn btn-inline review-submit">
                                        <i class="fas fa-clipboard"></i>
                                        <span>Make An Offer</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="common-card">
                            <div class="card-header">
                                <h5 class="card-title">Make An Offer</h5>
                            </div>
                            <div class="ad-details-safety">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" name="from" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="from">To</label>
                                    <input type="date" name="to" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Email">
                                </div>
                                <input type="hidden" name="asset_id" value="<?= $_GET['asset_id']; ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="reciver_id" value="<?= $user_id ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="owner_id" value="<?= $asset_user_id ?>" class="form-control" placeholder="Email">
                                <input type="hidden" name="message" value="<?= $message ?>" class="form-control" placeholder="Email">
                                <div class="form-group">
                                    <label for="from">Your Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="00.00">
                                </div>
                                <a href="./auth/auth.php" style="all: unset;">
                                    <button type="submit" name="offer" class="btn btn-inline review-submit">
                                        <i class="fas fa-clipboard"></i>
                                        <span>Make An Offer</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>

                <!-- REVIEWS CARD -->
                <div class="common-card" id="review">
                    <div class="card-header">
                        <h5 class="card-title">reviews (<?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '" . $_GET['asset_id'] . "'")); ?>)</h5>
                        Average Rating (
                        <?php
                        $arr = array();
                        $i = 0;
                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '" . $_GET['asset_id'] . "'");
                        if (mysqli_num_rows($get_stars) > 0) {

                            while ($stars = mysqli_fetch_array($get_stars)) {
                                $staers = $stars['stars'];
                                $arr[$i] = $staers;
                                $i++;
                            }
                            echo $ranasdklamsd = round(array_sum($arr) / count($arr), 2) . ' stars';
                        } else {
                            echo 0;
                        }
                        ?>
                        )
                    </div>
                    <div class="ad-details-review">
                        <ul class="review-list">
                            <?php
                            $rendom_id = $_GET['asset_id'];
                            $get_review = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$rendom_id'");
                            while ($rows = mysqli_fetch_assoc($get_review)) {
                                $rendom_id = $_GET['asset_id'];
                                $content = $rows['content'];
                                $created_at = $rows['created_at'];
                                $id = $rows['id'];
                                $stars = $rows['stars'];
                                $user_id = $rows['user_id'];
                                // Fetch user details
                                $get_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$user_id'");
                                while ($rows = mysqli_fetch_assoc($get_user)) {
                                    $review_user_id = $rows['id'];
                                    $review_username = $rows['user_name'];
                                    $review_profile_picture = $rows['profile_picture'];
                                    if ($review_profile_picture != '') {
                                        $review_profile_picture = $review_profile_picture;
                                    } else {
                                        $review_profile_picture = './assets/images/user.png';
                                    }
                                    $review_user_email = $rows['user_email'];
                                    $review_user_location = $rows['user_location'];
                                    $review_user_type = $rows['user_type'];
                                    $review_user_created_at = $rows['created_at'];
                                }
                                echo '
                                <li class="review-item">
                                <div class="review-user">
                                    <div class="review-head">
                                        <div class="review-profile">
                                            <a href="#" class="review-avatar">
                                                <img src="' . $review_profile_picture . '" alt="review">
                                            </a>
                                            <div class="review-meta">
                                                <h6>
                                                    <a href="#"> ' . $review_username . ' -</a>
                                                    <span>' . $created_at . '</span>
                                                </h6>
                                                <ul>';
                                for ($i = 0; $i < $stars; $i++) {
                                    echo ' <li><i class="fas fa-star active"></i></li>';
                                }
                                echo '
                                                </ul>
                                                </div>
                                                </div>
                                                </div>
                                                <p class="review-desc">' . $content . '</p>
                                                </div>
                                                </li>
                                                ';
                            }
                            ?>

                        </ul>
                        <?php
                        if (@$_GET['review'] == 1) {
                            Toast('black', 'Review Posted ...');
                        }
                        if (isset($_POST['review'])) {
                            $content = $_POST['content'];
                            $star = $_POST['rating'];
                            $created_at = date('Y-m-d H:i:s');
                            $rendom_id = $_GET['asset_id'];
                            $insert_review = mysqli_query($conn, "INSERT INTO `review`(`asset_id`, `content`, `created_at`, `id`, `stars`, `user_id`)
                             VALUES ('$rendom_id','$content','$created_at', NULL,'$star','$user_id')");
                            if ($insert_review) {
                                $kasjdnskdjgnskdjgnskn = $_GET['asset_id'];
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=./ad_page.php?asset_id=$kasjdnskdjgnskdjgnskn&&review=1\">";
                            }
                        }
                        if (@$_SESSION['user_email']) {
                            if (mysqli_num_rows(mysqli_query($conn, "SELECT id FROM review WHERE asset_id = '$get_asset_id' AND user_id = '$user_id'")) <= 0) { ?>
                                <form class="review-form" method="post" action="./ad_page.php?asset_id=<?= $get_asset_id ?>">
                                    <div class="star-rating">
                                        <input type="radio" name="rating" value="5" id="star-5"><label for="star-5"></label>
                                        <input type="radio" name="rating" value="4" id="star-4"><label for="star-4"></label>
                                        <input type="radio" name="rating" value="3" id="star-3"><label for="star-3"></label>
                                        <input type="radio" name="rating" value="2" id="star-2"><label for="star-2"></label>
                                        <input type="radio" name="rating" value="1" id="star-1"><label for="star-1"></label>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" placeholder="Describe"></textarea>
                                    </div>
                                    <button type="submit" name="review" class="btn btn-inline review-submit">
                                        <i class="fas fa-tint"></i>
                                        <span>drop your review</span>
                                    </button>
                                </form>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function myFunction() {

        // Copy the text inside the text field
        navigator.clipboard.writeText('https://renit.co.in/profile_view.php?user_id="<?= $asset_user_id; ?>"');

        // Alert the copied text
        alert("Link Copied");
    }
</script>
<div style="margin-top: -100px;">
    <?php include('./components/footer.php'); ?>
</div>