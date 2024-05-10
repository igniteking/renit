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
<link rel="stylesheet" href="./assets/css/custom/contact.css">
<!-- ============================= 
CONTACT PART START
======================================= -->
<section class="contact-part mt-md-0 mt-4">
    <div class="container">
        <div class="row">
            <?php
            $cat_id = $_GET['cat_id'];
            $get_asset2 = mysqli_query($conn, "SELECT * FROM assets WHERE asset_category = '$cat_id' AND asset_condition = 'active'");
            if (mysqli_num_rows($get_asset2) == 0) {
                echo "<div class='col-md-12 card card-body'><h5>No Products Found!</h5></div>";
            } else {
                while ($rows = mysqli_fetch_assoc($get_asset2)) {
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
            }
            ?>
        </div>
    </div>
</section>
<!--=====================================
                    CONTACT PART END
        =======================================-->

<?php include('./components/footer.php'); ?>