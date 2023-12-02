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
if (@$_SESSION['user_email']) {
    include('./components/sidebar.php');
}
?>
<link rel="stylesheet" href="./assets/css/custom/ad-details.css">
<?php

$asset_new = $_GET['asset_id'];
$date = date('Y-m-d H:i:s');
$run = mysqli_query($conn, "INSERT INTO `recently_viewed`(`id`, `asset_id`, `user_id`, `created_at`) 
VALUES (NULL,'$asset_new','$user_id','$date')");

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
    $asset_price = $rows['asset_price'];
    $asset_condition = $rows['asset_condition'];
    $symbol = $rows['symbol'];
    $curr_code = $rows['curr_code'];
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

<div class="d-md-none d-block"><br></div>

<section class="inner-section ad-details-part">
    <div class="container">
        <div class="">
            <div class="row content-reverse mb-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Preview Page</h5>
                        </div>
                    </div>
                    <?php
                    if ($asset_condition == 'active') {
                    } else {

                    ?>
                        <div class="p-2 row d-flex justify-content-md-center align-items-center">
                            <div class="card card-body col-md-12 mt-4">
                                <div id="notify"></div>
                                <button hx-get="./helpers/publish_ad.php?asset_id=<?= $_GET['asset_id'] ?>" hx-trigger="click" hx-target='#notify' class="btn text-white" style="background-color: black;">Publish</button>
                                <button hx-get="./helpers/delete_asset.php?asset_id=<?= $_GET['asset_id'] ?>" hx-trigger="click" hx-target='#notify' class="btn btn-danger mt-2">Delete</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row content-reverse">
            <div class="col-lg-4">

                <!-- AUTHOR CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">publisher info</h5>
                    </div>
                    <div class="ad-details-author">
                        <a href="#" class="author-img">
                            <img src="<?= $asset_profile_picture == '' ? './assets/images/user.png' : $asset_profile_picture; ?>" height="100" style="object-fit: cover;" alt="avatar">
                        </a>
                        <div class="author-meta">
                            <h4><a href="#"><?= $asset_username; ?></a></h4>
                            <h5>joined: <?= $asset_user_created_at; ?></h5>
                        </div>
                        <div class="author-widget">
                            <div id="refresh"></div>
                            <a href="./profile_view.php?user_id=<?= $asset_user_id ?>" title="Profile" class="fas fa-eye"></a>
                            <a href="./helpers/chat_link.php?asset_id=<?= $get_asset_id ?>&&owner_id=<?= $asset_user ?>&&reciver_id=<?= $user_id ?>" title="Chat" class="fas fa-envelope"></a>
                            <!-- <button type="button" title="Follow" class="follow fas fa-heart"></button> -->
                            <!-- <button type="button" title="Number" class="fas fa-phone" data-toggle="modal" data-target="#number"></button> -->
                            <button type="button" title="Profile Share" class="fas fa-share-alt" data-toggle="modal" data-target="#profile-share"></button>
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

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">area map</h5>
                    </div>
                    <iframe class="ad-details-map" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw&q=<?= $asset_location ?>"></iframe>
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
                            if ($asset_images != "") {
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
                        if ($asset_images != "") {
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

                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Useage Description</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <?= $asset_useage_description  ?>
                    </ul>
                </div>

                <!-- DESCRIPTION CARD -->
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc"><?= $asset_description ?></p>
                </div>


            </div>
        </div>
    </div>
</section>
<!--=====================================
                 AD SHARE MODAL PART START
        =======================================-->
<div class="modal fade" id="ad-share">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Share this Ad</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="modal-share">
                    <a href="#">
                        <i class="facebook fab fa-facebook-f"></i>
                        <span>facebook</span>
                    </a>
                    <a href="#">
                        <i class="twitter fab fa-twitter"></i>
                        <span>twitter</span>
                    </a>
                    <a href="#">
                        <i class="linkedin fab fa-linkedin"></i>
                        <span>linkedin</span>
                    </a>
                    <a href="#">
                        <i class="link fas fa-link"></i>
                        <span>copy link</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                 AD SHARE MODAL PART END
        =======================================-->


<!--=====================================
               PROFILE SHARE MODAL PART START
        =======================================-->
<div class="modal fade" id="profile-share">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Share this Profile</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="modal-share">
                    <a href="#">
                        <i class="facebook fab fa-facebook-f"></i>
                        <span>facebook</span>
                    </a>
                    <a href="#">
                        <i class="twitter fab fa-twitter"></i>
                        <span>twitter</span>
                    </a>
                    <a href="#">
                        <i class="linkedin fab fa-linkedin"></i>
                        <span>linkedin</span>
                    </a>
                    <a href="#">
                        <i class="link fas fa-link"></i>
                        <span>copy link</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================================
              PROFILE SHARE MODAL PART END
        =======================================-->


<!--=====================================
                  NUMBER MODAL PART START
        =======================================-->
<div class="modal fade" id="number">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Contact this Number</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-number">(+880) 183 - 8288 - 389</h3>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                  NUMBER MODAL PART END
        =======================================-->


<!--=====================================
                  CURRENCY MODAL PART START
        =======================================-->
<div class="modal fade" id="currency">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Choose a Currency</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <button class="modal-link active">United States Doller (USD) - $</button>
                <button class="modal-link">Euro (EUR) - €</button>
                <button class="modal-link">British Pound (GBP) - £</button>
                <button class="modal-link">Australian Dollar (AUD) - A$</button>
                <button class="modal-link">Canadian Dollar (CAD) - C$</button>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                  CURRENCY MODAL PART END
        =======================================-->


<!--=====================================
                LANGUAGE MODAL PART START
        =======================================-->
<div class="modal fade" id="language">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Choose a Language</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <button class="modal-link active">English</button>
                <button class="modal-link">bangali</button>
                <button class="modal-link">arabic</button>
                <button class="modal-link">germany</button>
                <button class="modal-link">spanish</button>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                   LANGUAGE MODAL PART END
        =======================================-->


<?php include('./components/footer.php'); ?>