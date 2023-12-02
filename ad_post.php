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
} ?>
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
            <div class="col-lg-12">
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
                    $asset_thumbnail = $_FILES['asset_thumbnail']['name'];
                    $asset_thumbnail_location = uploadProductImage($asset_thumbnail, "asset_thumbnail", "./assets/images/product");
                    $curr_code = security_check(@$_POST['curr_code']);
                    $curr_sumbol = security_check(@$_POST['curr_sumbol']);

                    // if ($asset_by_address and $asset_by_name and $asset_by_number and $asset_category and $asset_category_type and $asset_condition and $asset_description and $asset_location and $asset_location and $asset_model and $asset_name and $asset_price and $asset_price_type and $asset_safety_deposite and $asset_sub_category and $asset_thumbnail and $asset_thumbnail_location and $asset_userage_description) {
                    if ($asset_name) {

                        // $asset_images = $_FILES['upload']['name'];
                        $total = count($_FILES['upload']['name']);

                        // Loop through each file

                        $length = 10;
                        $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                        $folder = mkdir("./assets/images/product/$random");
                        //Make sure we have a file path
                        for ($i = 0; $i < $total; $i++) {
                            //Get the temp file path
                            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                            if ($tmpFilePath != "") {
                                //Setup our new file path
                                $newFilePath = "./assets/images/product/$random/" . $_FILES['upload']['name'][$i];
                                $newFilePath2 = "./assets/images/product/$random/";
                                //Upload the file into the temp dir
                                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                    //Handle other code here

                                }
                            }
                        }


                        $created_at =  date('Y-m-d H:i:s');
                        $inset_asset = mysqli_query($conn, "INSERT INTO `assets`(`created_at`,`asset_price_type`,`asset_category_type`,`asset_condition`,`asset_brand`, `asset_by_address`, `asset_by_name`, `asset_by_number`, `asset_category`, `asset_description`, `asset_images`, `asset_location`, `asset_model`, `asset_name`, `asset_price`,`asset_safety_deposite`, `asset_sub_category`, `asset_thumbnail`, `asset_useage_description`, `asset_user`, `id`, `symbol`, `curr_code`) 
                    VALUES ('$created_at','$asset_price_type','$asset_category_type','$asset_condition','$brand_name','$asset_by_address','$asset_by_name','$asset_by_number','$asset_category','$asset_description','$newFilePath2','$asset_location','$asset_model','$asset_name','$asset_price','$asset_safety_deposite','$asset_sub_category','$asset_thumbnail_location','$asset_userage_description','$user_id',NULL, '$curr_sumbol','$curr_code')");
                        if ($inset_asset) {
                            $geo = fetch_single_row($conn, "SELECT id FROM assets WHERE asset_user = '$user_id' ORDER BY id DESC");
                            refresh('./preview_page.php?asset_id=' . $geo . '', '0');
                        }
                    } else {
                        Toast('info', 'Product Title are required!');
                    }
                }
                ?>
                <form class="adpost-form" method="POST" action="./ad_post.php" enctype="multipart/form-data">
                    <div class="adpost-card">
                        <div class="adpost-title">
                            <h3>Product Information</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" onchange="block(1)" hx-get="./helpers/content_mod.php?name=asset_name&" hx-trigger="keyup changed" hx-target="#notify1" id="title" class="form-control" name="asset_name" placeholder="Type your product title here">
                                    <div id="notify1"></div>
                                </div>
                            </div>
                            <script>
                                function block(val) {
                                    if (document.getElementById("notify" + val).innerHTML == 'Content is not appropriate') {
                                        document.getElementById("recall").disabled = 'disabled';
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
                                    <input type="text" onchange="block(2)" hx-get="./helpers/content_mod.php?name=brand_name&" hx-trigger="keyup changed" hx-target="#notify2" class="form-control" name="brand_name" placeholder="Type your brand name here">
                                    <div id="notify2"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Model Name / Number</label>
                                    <input type="text" onchange="block(3)" hx-get="./helpers/content_mod.php?name=asset_model&" hx-trigger="keyup changed" hx-target="#notify3" class="form-control" name="asset_model" placeholder="Type your model name / number here">
                                    <div id="notify3"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Cover Image</label>
                                    <input type="file" name="asset_thumbnail" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Other Images</label>
                                    <input type="file" name="upload[]" multiple="multiple" accept="image/png, image/gif, image/jpeg" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-control custom-select" name="asset_category" hx-get="./helpers/get_sub_category.php" hx-trigger="change" hx-target="#asset_sub_category">
                                        <option value="">Please Select</option>
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
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Product Price Type</label>
                                    <select class="form-control custom-select" name="asset_price_type">
                                        <option value="fixed">fixed</option>
                                        <option value="negotiable">negotiable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Location</label>
                                    <input type="text" name="key" autocomplete="off" id="asset_location_search" hx-get="./helpers/location.php" hx-include="[id=asset_location_search]" hx-target="#asset_location_list" hx-trigger="keyup change" class="form-control" placeholder="Enter location">
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
                                        <input style="z-index: 1;" hx-get="./helpers/get_country.php" hx-include="[id=asset_location_search]" hx-target="#basic-addon1" hx-trigger="click keyup change" type="number" class="form-control" name="asset_price" placeholder="Enter your pricing amount">
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
                                        <input style="z-index: 1;" hx-get="./helpers/get_country.php" hx-include="[id=asset_location_search]" hx-target="#basic-addon2" hx-trigger="click keyup change" type="number" class="form-control" type="number" class="form-control" id="asset_safety_deposite" name="asset_safety_deposite" placeholder="Enter your pricing amount">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-control custom-select" name="asset_category_type">
                                        <option value="sale">sale</option>
                                        <option value="rent">rent</option>
                                        <option value="booking">booking</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Product Condition</label>
                                    <select class="form-control custom-select" name="asset_condition">
                                        <option value="used">used</option>
                                        <option value="new">new</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Description</label>
                                    <textarea class="form-control" onchange="block(4)" hx-get="./helpers/content_mod.php?name=asset_description&" hx-trigger="keyup changed" hx-target="#notify4" name="asset_description" placeholder="Describe your message"></textarea>
                                    <div id="notify4"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Product Usage Description</label>
                                    <textarea class="form-control" onchange="block(5)" hx-get="./helpers/content_mod.php?name=asset_userage_description&" hx-trigger="keyup changed" hx-target="#notify5" name="asset_userage_description" placeholder="Describe your message"></textarea>
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
                                    <input type="text" name="asset_by_name" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="asset_by_email" class="form-control" placeholder="Your Email">
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
                                            <input id="phone" type="tel" name="phone" name="asset_by_number" class="form-control" />
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
                                    <input type="text" name="asset_by_address" class="form-control" placeholder="Your Address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="adpost-card">
                        <div class="adpost-title">
                            <h3>Plan Information</h3>
                        </div>
                        <ul class="adpost-plan-list">
                            <li>
                                <div class="adpost-plan-content">
                                    <h6>Free Plan - <span>Submit 5 Ad Listings</span></h6>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                </div>
                                <div class="adpost-plan-meta">
                                    <h3>$00.00</h3>
                                    <button class="btn btn-outline">
                                        <span>Select</span>
                                    </button>
                                </div>
                            </li>
                            <li>
                                <div class="adpost-plan-content">
                                    <h6>Standerd Plan - <span>Submit 10 Ad Listings</span></h6>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                </div>
                                <div class="adpost-plan-meta">
                                    <h3>$23.00</h3>
                                    <button class="btn btn-outline">
                                        <span>Select</span>
                                    </button>
                                </div>
                            </li>
                            <li>
                                <div class="adpost-plan-content">
                                    <h6>Premium Plan - <span>Unlimited Ad Listings</span></h6>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit Delectus minus Eaque corporis accusantium incidunt officiis deleniti.</p>
                                </div>
                                <div class="adpost-plan-meta">
                                    <h3>$43.00</h3>
                                    <button class="btn btn-outline">
                                        <span>Select</span>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    <div class="adpost-card pb-2">
                        <div class="adpost-agree">
                            <div class="form-group">
                                <input type="checkbox" class="form-check">
                            </div>
                            <p>By clicking, you agree to Renit's <a href="./terms.php">Terms of Use</a> as well as its <a href="./privacy.php">Privacy Policy</a>; and acknowledge that you are the rightful owner of this item.</p>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" value="submit" id="recall" name="submit" class="btn btn-inline">
                                <i class="fas fa-check-circle"></i>
                                <span>published your ad</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="col-lg-4">
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Safety Tips</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <ul class="account-card-text">
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                        </li>
                        <li>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!--=====================================
                    ADPOST PART END
        =======================================-->

<?php include('./components/footer.php'); ?>