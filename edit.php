<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
} ?>
<link rel="stylesheet" href="./assets/css/custom/ad-post.css">

<?php // Fetch user details

if (@$_SESSION['user_email']) {
    include('./components/sidebar.php');
}

$get_user = mysqli_query($conn, "SELECT * FROM user_data WHERE id = '$user_id'");
while ($rows = mysqli_fetch_assoc($get_user)) {
    $logged_id = $rows['id'];
    $logged_username = $rows['user_name'];
    $logged_profile_picture = $rows['profile_picture'];
    $logged_user_email = $rows['user_email'];
    $logged_user_location = $rows['user_location'];
    $logged_user_number = $rows['user_number'];
    $logged_user_type = $rows['user_type'];
    $logged_user_created_at = $rows['created_at'];
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
    $asset_price_type = $rows['asset_price_type'];
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
<!--=====================================
                DASHBOARD HEADER PART START
        =======================================-->
<?php include('./components/dash_comp.php'); ?>

<!--=====================================
                    ADPOST PART START
        =======================================-->
<section class="adpost-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                if (@$_GET["code"] == 1) {
                    Toast('black', 'You have successfully Uploaded your product.');
                }
                if (@$_POST['submit']) {
                    $asset_name = security_check(@$_POST['asset_name']);
                    $asset_category = security_check(@$_POST['asset_category']);
                    $asset_sub_category = security_check(@$_POST['asset_sub_category']);
                    $asset_price = security_check(@$_POST['asset_price']);
                    $asset_safety_deposite = security_check(@$_POST['asset_safety_deposite']);
                    $brand_name = security_check(@$_POST['brand_name']);
                    $asset_model = security_check(@$_POST['asset_model']);
                    $asset_location = security_check(@$_POST['key']);
                    $asset_description = security_check(@$_POST['asset_description']);
                    $asset_userage_description = security_check(@$_POST['asset_userage_description']);
                    $asset_by_name = security_check(@$_POST['asset_by_name']);
                    $asset_by_number = security_check(@$_POST['asset_by_number']);
                    $asset_by_address = security_check(@$_POST['asset_by_address']);
                    $asset_price_type = security_check(@$_POST['asset_price_type']);
                    $asset_category_type = security_check(@$_POST['asset_category_type']);
                    $asset_condition = security_check(@$_POST['asset_condition']);
                    $curr_code = security_check(@$_POST['curr_code']);
                    $curr_sumbol = security_check(@$_POST['curr_sumbol']);
                    $created_at =  date('Y-m-d H:i:s');
                    $inset_asset = mysqli_query($conn, "UPDATE `assets` SET `asset_brand`='$brand_name',`asset_by_address`='$asset_by_address',`asset_by_name`='$asset_by_name',`asset_by_number`='$asset_by_number',`asset_category`='$asset_category',`asset_description`='$asset_description',`asset_location`='$asset_location',`asset_model`='$asset_model',`asset_name`='$asset_name',`asset_price`='$asset_price',`asset_safety_deposite`='$asset_safety_deposite',`asset_sub_category`='$asset_sub_category',`asset_useage_description`='$asset_useage_description',`asset_user`='$asset_user',`asset_price_type`='$asset_price_type',`asset_category_type`='$asset_category_type',`asset_condition`='$asset_condition',`curr_code`='$curr_code' WHERE id= '$get_asset_id'");
                    if ($inset_asset) {
                        refresh('./preview_page?asset_id=' . $get_asset_id . '', '0');
                    } else {
                        Toast('info', 'All Feilds are required!');
                    }
                }
                // }
                ?>
                <form class="adpost-form" method="POST" action="./edit?asset_id=<?= $get_asset_id; ?>" enctype="multipart/form-data">
                    <div class="adpost-card">
                        <div class="adpost-title">
                            <h3>Ad Information</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" value="<?= $asset_name ?>" onchange="block(1)" hx-get="./helpers/content_mod?name=asset_name&" hx-trigger="keyup changed" hx-target="#notify1" id="title" class="form-control" name="asset_name" placeholder="Type your product title here">
                                    <div id="notify1"></div>
                                </div>
                            </div>
                            <script>
                                function block(val) {
                                    if (document.getElementById("notify" + val).innerHTML == 'Content is not appropriate') {
                                        // document.getElementById("recall").disabled = 'disabled';
                                        console.log("disabled")
                                    } else {
                                        document.getElementById("recall").disabled = '';
                                        console.log("NOPE")
                                    }
                                }
                            </script>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Brand Name</label>
                                    <input type="text" value="<?= $asset_brand ?>" onchange="block(2)" hx-get="./helpers/content_mod?name=brand_name&" hx-trigger="keyup changed" hx-target="#notify2" class="form-control" name="brand_name" placeholder="Type your brand name here">
                                    <div id="notify2"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Model Name / Number</label>
                                    <input type="text" value="<?= $asset_model ?>" onchange="block(3)" hx-get="./helpers/content_mod?name=asset_model&" hx-trigger="keyup changed" hx-target="#notify3" class="form-control" name="asset_model" placeholder="Type your model name / number here">
                                    <div id="notify3"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-control custom-select" name="asset_category" hx-get="./helpers/get_sub_category" hx-trigger="change" hx-target="#asset_sub_category">
                                        <option value="<?= fetch_single_row($conn, "SELECT id FROM categories WHERE id = '$asset_category'") ?>"><?= fetch_single_row($conn, "SELECT category_name FROM categories WHERE id = '$asset_category'") ?></option>
                                        <?php
                                        $get_categories = mysqli_query($conn, "SELECT * FROM `categories` LIMIT 9");
                                        while ($rows = mysqli_fetch_array($get_categories)) {
                                            $category_id = $rows["id"];
                                            $category_name = $rows["category_name"];
                                            echo '
                                                <option value="' . $category_id . '">' . $category_name . '</option>
                                            ';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Sub Category</label>
                                    <select class="form-control custom-select" id="asset_sub_category" name="asset_sub_category">
                                        <option value="<?= fetch_single_row($conn, "SELECT id FROM sub_categories WHERE id = '$asset_sub_category'") ?>"><?= fetch_single_row($conn, "SELECT sub_category_name FROM sub_categories WHERE id = '$asset_sub_category'") ?></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Product Price Type</label>
                                    <select class="form-control custom-select" name="asset_price_type">
                                        <option value="<?= $asset_price_type ?>"><?= $asset_price_type ?></option>
                                        <option value="fixed">fixed</option>
                                        <option value="negotiable">negotiable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" value="<?= $asset_location ?>" name="key" autocomplete="off" id="asset_location_search" hx-get="./helpers/location" hx-include="[id=asset_location_search]" hx-target="#asset_location_list" hx-trigger="keyup change" class="form-control" placeholder="Enter location">
                                </div>
                                <script>
                                    document.body.addEventListener('click', function(e) {
                                        var clickedElement = event.target;
                                        console.log(clickedElement);
                                        // Check if the clicked element is an input field
                                        if (clickedElement.tagName === 'INPUT' && clickedElement.id === 'asset_location_search') {
                                            console.log('tagName INPUT');
                                            // Clicked outside the box
                                            var x = document.getElementById('heretest');
                                            if (x.style.display == 'none') {
                                                console.log('yes');
                                                x.style.display = 'block';
                                            }
                                        } else {
                                            var x = document.getElementById('heretest');
                                            if (x.style.display == 'block') {
                                                x.style.display = 'none';
                                                console.log('hidden');
                                            }
                                            console.log('tagName not INPUT');

                                        }
                                    });

                                    function insert_value(val) {
                                        var location_search = document.getElementById('asset_location_search').value = val;
                                        var parent = document.getElementById('location_list');
                                        var x = document.getElementById('heretest');
                                        if (x.style.display == 'block') {
                                            console.log('yes');
                                            x.style.display = 'none';
                                        }
                                        while (parent.hasChildNodes())
                                            parent.firstChild.remove()
                                    }
                                </script>
                                <div class="" id="heretest" style="display: none;">
                                    <div class="card" style="margin-top: -30px;">
                                        <div class="card-body">
                                            <div id="asset_location_list"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Price Per Day</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input value="<?= $asset_price ?>" hx-get="./helpers/get_country" hx-include="[id=asset_location_search]" hx-target="#basic-addon1" hx-trigger="click keyup change" type="number" class="form-control" name="asset_price" placeholder="Enter your pricing amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Safety Deposit</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">@</span>
                                        </div>
                                        <input value="<?= $asset_safety_deposite ?>" hx-get="./helpers/get_country" hx-include="[id=asset_location_search]" hx-target="#basic-addon2" hx-trigger="click keyup change" type="number" class="form-control" type="number" class="form-control" id="asset_safety_deposite" name="asset_safety_deposite" placeholder="Enter your pricing amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Description</label>
                                    <textarea class="form-control" onchange="block(4)" hx-get="./helpers/content_mod?name=asset_description&" hx-trigger="keyup changed" hx-target="#notify4" name="asset_description" placeholder="Describe your message"><?= $asset_description ?></textarea>
                                    <div id="notify4"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Usage Description</label>
                                    <textarea class="form-control" onchange="block(5)" hx-get="./helpers/content_mod?name=asset_userage_description&" hx-trigger="keyup changed" hx-target="#notify5" name="asset_userage_description" placeholder="Describe your message"><?= $asset_useage_description ?></textarea>
                                    <div id="notify5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="adpost-card">
                        <div class="adpost-title">
                            <h3>Contact Person</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" value="<?= $asset_username ?>" name="asset_by_name" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="asset_by_email" value="<?= $asset_user_email ?>" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Number</label>
                                    <link rel="stylesheet" href="styles.css" />
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                                    </head>
                                    <div class="container">
                                        <div id="login" onchange="process(event)">
                                            <input id="phone" value="<?= $asset_by_number ?>" type="tel" name="phone" name="asset_by_number" class="form-control" />
                                        </div>
                                    </div>
                                    <script>
                                        const phoneInputField = document.querySelector("#phone");
                                        const phoneInput = window.intlTelInput(phoneInputField, {
                                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="asset_by_address" value="<?= $asset_by_address ?>" class="form-control" placeholder="Your Address">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" value="submit" id="recall" name="submit" class="btn btn-inline">
                                        <i class="fas fa-check-circle"></i>
                                        <span>update your product</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    ADPOST PART END
        =======================================-->

<?php include('./components/footer.php'); ?>