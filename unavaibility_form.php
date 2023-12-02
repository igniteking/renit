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
<link rel="stylesheet" href="./assets/css/custom/ad-details.css">


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
<section class="myads-part mt-4">

    <div class="d-block d-md-none"><br></div>
    <section class="contact-part">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 m-3 card card-body adpost-form">
                    <div class="adpost-title">
                        <h3>Product Information</h3>
                    </div>
                    <?php
                    if (isset($_POST['post'])) {
                        $Product = $_POST['Product'];
                        $Email = $_POST['Email'];
                        $Number = $_POST['Number'];
                        $asset_category = $_POST['asset_category'];
                        $sub_categories = $_POST['sub-categories'];
                        $key = $_POST['key'];
                        $from = $_POST['from'];
                        $to = $_POST['to'];
                        $Describe = $_POST['Describe'];
                        $created_at = date('Y-m-d H:i:s');
                        if ($Product and $Email  and $asset_category and $sub_categories and $key and $from and $to) {
                            $query = mysqli_query($conn, "INSERT INTO `unavailability`(`id`, `product_name`, `email`, `mobile`, `date`, `date_to`, `categories`, `sub_categories`, `location`, `details`, `created_at`) VALUES 
                        (NULL,'$Product','$Email','$Number','$from','$to','$asset_category','$sub_categories','$key','$Describe','$created_at')");
                            if ($query) {
                                Toast('black', "Sent successfully ...");
                            }
                        } else {
                            Toast('warning', "Input all feilds ..");
                        }
                    }
                    ?>
                    <form class="contact-form" method="post" action="./unavaibility_form.php">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name="Product" class="form-control" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Your Email Address</label>
                                    <input type="text" name="Email" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Your Contact Number.</label>
                                    <input type="text" name="Number" class="form-control" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Does it belong to any of the below categories?*</label>
                                    <select class="form-control custom-select" name="asset_category" hx-get="./helpers/get_sub_category.php" hx-trigger="change" hx-target="#asset_sub_category">
                                        <option value="">Please Select</option>
                                        <?php
                                        $get_categories = mysqli_query($conn, "SELECT * FROM `categories`");
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
                                    <label for="">Does it belong to any of the below sub-categories?</label>
                                    <select class="form-control custom-select" id="asset_sub_category" name="sub-categories">
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Where do you need it?</label>
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
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">From when do you need it?</label>
                                    <input type="date" name="from" id="date_from" onchange="change_min_date2()" min="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Till when do you need it?</label>
                                    <input type="date" name="to" id="date_to" min="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                            <script>
                                function change_min_date2() {
                                    var date = document.getElementById('date_from').value;
                                    document.getElementById('date_to').setAttribute("min", date);
                                }
                            </script>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Describe a product you're looking for a bit more. </label>
                                    <textarea type="text" name="Describe" class="form-control" placeholder="Your Subject"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" name="post" class="btn btn-inline">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>send Request</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
<!--=====================================
                    CONTACT PART END
        =======================================-->

<?php include('./components/footer.php'); ?>