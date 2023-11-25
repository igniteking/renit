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
<link rel="stylesheet" href="./assets/css/custom/setting.css">

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


<!--=====================================
                    SETTING PART START
        =======================================-->
<div class="setting-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (@$_POST['save_profile']) {
                    $user_name = security_check($_POST['user_name']);
                    $user_location = security_check($_POST['user_location']);
                    $user_mobile = security_check($_POST['user_mobile']);
                    $user_city = security_check($_POST['user_city']);
                    $user_state = security_check($_POST['user_state']);
                    $user_post_code = security_check($_POST['user_post_code']);
                    $user_country = security_check($_POST['user_country']);
                    $profile_picture = $_FILES['profile_picture']['name'];
                    if (empty($profile_picture)) {
                        $mysqli_query = mysqli_query($conn, "UPDATE `user_data` SET `user_city`='$user_city', `user_state`='$user_state', `user_post_code`='$user_post_code', `user_country`='$user_country',`user_location`='$user_location',`user_name`='$user_name',`user_number`='$user_mobile' WHERE id = '$logged_id'");
                    } else {
                        $profile_picture_location = uploadImage($profile_picture, "profile_picture", "./data");
                        $mysqli_query = mysqli_query($conn, "UPDATE `user_data` SET `user_city`='$user_city', `user_state`='$user_state', `user_post_code`='$user_post_code', `user_country`='$user_country',`profile_picture`='$profile_picture_location',`user_location`='$user_location',`user_name`='$user_name',`user_number`='$user_mobile' WHERE id = '$logged_id'");
                    }

                    if ($mysqli_query) {
                        Toast('black', 'Record Updated Successfully ...');
                        refresh('./setting.php', '2');
                    } else {
                        Toast('danger', 'Error Updating Record ...');
                    }
                }
                ?>
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Edit Profile</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <form class="setting-form" method="post" action="./setting.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="user_name" value="<?= $logged_username ?>" placeholder="<?= $logged_username ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="user_location" value="<?= $logged_user_location ?>" placeholder="<?= $logged_user_location ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="user_city" value="<?= $logged_user_city ?>" placeholder="<?= $logged_user_city ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="user_state" value="<?= $logged_user_state ?>" placeholder="<?= $logged_user_state ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Post Code</label>
                                    <input type="text" class="form-control" name="user_post_code" value="<?= $logged_user_post_code ?>" placeholder="<?= $logged_user_post_code ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="user_country" value="<?= $logged_user_country ?>" placeholder="<?= $logged_user_country ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Number</label>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                                    <div class="">
                                        <div id="login" onchange="process(event)">
                                            <input id="phone" type="tel" name="user_mobile" style="width: 220%;" value="<?= $logged_user_number ?>" placeholder="<?= $logged_user_number ?>" class="dumdum form-control" />
                                        </div>
                                    </div>
                                    <style>
                                        @media only screen and (max-width: 700px) and (min-width: 350px) {
                                            #dumdum {
                                                width: 50%;
                                            }
                                        }

                                        #dumdum {
                                            width: 250%;
                                        }
                                    </style>
                                    <script>
                                        const phoneInputField = document.querySelector("#phone");
                                        const phoneInput = window.intlTelInput(phoneInputField, {
                                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                        });
                                    </script>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="user_mobile" value="<?= $logged_user_number ?>" placeholder="<?= $logged_user_number ?>">
                                </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="profile_picture" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" value="save_profile" name="save_profile" class="btn btn-inline">
                                    <i class="fas fa-user-check"></i>
                                    <span>update profile</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=====================================
                    SETTING PART END
        =======================================-->

<?php include('./components/footer.php'); ?>