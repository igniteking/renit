<section class="dash-header-part mt-5 pt-5">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-5">
                    <div class="dash-header-left">
                        <?php
                        if (!empty($logged_profile_picture)) { ?>
                            <div class="dash-avatar">
                                <a href="setting"><img src="<?= $logged_profile_picture ?>" class="img img-avatar rounded-circle" height="150" style="object-fit: cover;" alt="avatar"></a>
                            </div>
                        <?php } else {
                        ?>
                            <div class="dash-avatar">
                                <a href="setting"><img src="./assets/images/user.png" alt="avatar"></a>
                            </div>
                        <?php } ?>
                        <div class="dash-intro">
                            <h4><a href="#"></a><?= $logged_username ?></h4>
                            <ul class="dash-meta">
                                <?php
                                if (!empty($logged_profile_picture)) { ?>
                                    <li>
                                        <i class="fas fa-phone-alt"></i>
                                        <span><?= $logged_user_number ?></span>
                                    </li>
                                <?php }
                                ?>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span><?= $logged_user_email ?></span>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span style="margin-left: 2px;"><?= $logged_user_location ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" style="margin-top: 10px;">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$logged_id'")) ?></h2>
                            <p>Total Products Listed</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" style="margin-top: 10px;">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2><?php
                                $get = 0;
                                $get_all_asset_ids = mysqli_query($conn, "SELECT * FROM assets WHERE asset_user = '$user_id' AND asset_condition = 'active'");
                                while ($rows = mysqli_fetch_array($get_all_asset_ids)) {
                                    $myassetids = $rows['id'];
                                    $get += mysqli_num_rows(mysqli_query($conn, "SELECT * FROM recently_viewed WHERE asset_id = '$myassetids'"));
                                }
                                echo $get; ?>
                            </h2>
                            <p>Total Views - All Products</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash-menu-list">
                        <ul>
                            <?php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                            if ($curPageName == 'my_ad') {
                            ?>
                                <li><a href="my_ad" class="active">My Products</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="my_ad" class="">My Products</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                            if ($curPageName == 'ad_post') {
                            ?>
                                <li><a href="ad_post" class="active">Rent Out</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="ad_post">Rent Out</a></li>
                            <?php
                            }
                            ?>
                            <li><a href="chat<?php
                                                    $cont = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'"));

                                                    if ($cont > 0) {
                                                        $vari = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
                                                        echo '?chat_id=' . $vari;
                                                    }
                                                    ?>">message</a></li>
                            <?php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                            if ($curPageName == 'bookmark') {
                            ?>
                                <li><a href="bookmark" class="active">bookmarks</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="bookmark">bookmarks</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                            if ($curPageName == 'setting') {
                            ?>
                                <li><a href="setting" class="active">settings</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="setting">settings</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                            if ($curPageName == 'unavaibility_form') {
                            ?>
                                <li><a href="unavaibility_form" class="active">Unavailability Form</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="unavaibility_form">Unavailability Form</a></li>
                            <?php
                            }
                            ?>
                            <li><a href="./helpers/logout">logout</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>