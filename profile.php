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
<link rel="stylesheet" href="./assets/css/custom/profile.css">

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
                    PROFILE PART START
        =======================================-->
<section class="profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="account-card">
                    <div class="account-title">
                        <h3>Membership</h3>
                        <a href="setting.html">Edite</a>
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Status</h5>
                            <p>Premium</p>
                        </li>
                        <li>
                            <h5>Joined</h5>
                            <p>February 02, 2021</p>
                        </li>
                        <li>
                            <h5>Spand</h5>
                            <p>4,587</p>
                        </li>
                        <li>
                            <h5>Earn</h5>
                            <p>97,325</p>
                        </li>
                    </ul>
                </div>
                <div class="account-card">
                    <div class="account-title">
                        <h3>Contact Info</h3>
                        <a href="setting.html">Edite</a>
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Website:</h5>
                            <p>www.richardwilliam.com</p>
                        </li>
                        <li>
                            <h5>Email:</h5>
                            <p>richard@example.com</p>
                        </li>
                        <li>
                            <h5>Phone:</h5>
                            <p>+12027953213</p>
                        </li>
                        <li>
                            <h5>Skype:</h5>
                            <p>live:richard</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="account-card">
                    <div class="account-title">
                        <h3>Billing Address</h3>
                        <a href="setting.html">Edite</a>
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Post Code:</h5>
                            <p>1420</p>
                        </li>
                        <li>
                            <h5>State:</h5>
                            <p>West Jalkuri</p>
                        </li>
                        <li>
                            <h5>City:</h5>
                            <p>Narayanganj</p>
                        </li>
                        <li>
                            <h5>Country:</h5>
                            <p>Bangladesh</p>
                        </li>
                    </ul>
                </div>
                <div class="account-card">
                    <div class="account-title">
                        <h3>Shipping Address</h3>
                        <a href="setting.html">Edite</a>
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Post Code:</h5>
                            <p>1100</p>
                        </li>
                        <li>
                            <h5>State:</h5>
                            <p>Kawran Bazar</p>
                        </li>
                        <li>
                            <h5>City:</h5>
                            <p>Dhaka</p>
                        </li>
                        <li>
                            <h5>Country:</h5>
                            <p>Bangladesh</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    PROFILE PART END
        =======================================-->

<?php include('./components/footer.php'); ?>