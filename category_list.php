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
<link rel="stylesheet" href="./assets/css/custom/category-list.css">
<br><br>

<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->
<section class="single-banner d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2 style="text-transform: none;">Rent By Category</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="single-content mt-5 d-md-none">
    <h2 style="color: black">Rent By Category</h2>
</div>
<!--=====================================
        CATEGORY PART START
        =======================================-->
<section class="inner-section category-part mt-md-5 pt-md-5">
    <div class="container">
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
                        <a href="listing?cat_id=' . $category_id . '" class="category-content">
                            <h4>' . $category_name . '</h4>
                        </a>
                    </div>
                    <ul class="category-list">
                    ';
                $get_sub_categories = mysqli_query($conn, "SELECT * FROM `sub_categories` WHERE `category_id` = '$category_id'");
                while ($rows1 = mysqli_fetch_array($get_sub_categories)) {
                    $sub_category_id = $rows1["id"];
                    $sub_category_name = $rows1["sub_category_name"];
                    echo '
                        <li><a href="./sub_listing?cat_id=' . $sub_category_id . '">
                                <h6>' . $sub_category_name . '</h6>
                                <p>' . mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets WHERE asset_category = '$category_id' AND `asset_sub_category` = '$sub_category_id'")) . '</p>
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
    </div>
</section>

<?php include('./components/footer.php'); ?>