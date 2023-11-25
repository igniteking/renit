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
<?php
if (isset($_SESSION['user_email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=./helpers/logout.php\">";
    exit();
}
?>
<link rel="stylesheet" href="./assets/css/custom/dashboard.css">
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

<?php include('./components/dash_comp.php'); ?>
<section class="dashboard-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                $status = fetch_single_row($conn, "SELECT active FROM user_data WHERE id = '$user_id'");
                if ($status == '') {
                ?>
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Newsletter</h3>
                            <button data-dismiss="alert">close</button>
                        </div>
                        <div class="dash-content">
                            <p>Your Email is not verified. <a href="./helpers/sendMail.php?user_id=<?= $user_email ?>">Click Here to verify</a></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Reviews</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <div class="dash-review-widget">
                        <h4>(4) Unread Review</h4>
                        <select class="custom-select">
                            <option selected>Unread Review</option>
                            <option value="1">All Review</option>
                            <option value="2">5 Star Review</option>
                            <option value="3">4 Star Review</option>
                            <option value="3">3 Star Review</option>
                            <option value="3">2 Star Review</option>
                            <option value="3">1 Star Review</option>
                        </select>
                    </div>
                    <ul class="review-list">
                        <li class="review-item">
                            <div class="review-user">
                                <div class="review-head">
                                    <div class="review-profile">
                                        <a href="#" class="review-avatar">
                                            <img src="./assets/images/avatar/03.jpg" alt="review">
                                        </a>
                                        <div class="review-meta">
                                            <h6>
                                                <a href="#">miron mahmud -</a>
                                                <span>June 02, 2020</span>
                                            </h6>
                                            <ul>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li>
                                                    <h5>- for delivery system</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-widget">
                                        <button class="review-dots-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="review-widget-list">
                                            <li><a href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                            <li><a href="#"><i class="fas fa-flag"></i>Report</a></li>
                                            <li><a href="#"><i class="fas fa-shield-alt"></i>Block</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.</p>
                            </div>
                        </li>
                        <li class="review-item">
                            <div class="review-user">
                                <div class="review-head">
                                    <div class="review-profile">
                                        <a href="#" class="review-avatar">
                                            <img src="./assets/images/avatar/02.jpg" alt="review">
                                        </a>
                                        <div class="review-meta">
                                            <h6>
                                                <a href="#">labonno khan -</a>
                                                <span>June 02, 2020</span>
                                            </h6>
                                            <ul>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star active"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li>
                                                    <h5>- for product quality</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review-widget">
                                        <button class="review-dots-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="review-widget-list">
                                            <li><a href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                            <li><a href="#"><i class="fas fa-flag"></i>Report</a></li>
                                            <li><a href="#"><i class="fas fa-shield-alt"></i>Block</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.</p>
                            </div>
                            <div class="review-author">
                                <div class="review-head">
                                    <div class="review-profile">
                                        <a href="#" class="review-avatar">
                                            <img src="./assets/images/avatar/04.jpg" alt="review">
                                        </a>
                                        <div class="review-meta">
                                            <h6><a href="#">Miron Mahmud</a></h6>
                                            <h6>Author - <span>June 02, 2020</span></h6>
                                        </div>
                                    </div>
                                    <div class="review-widget">
                                        <button class="review-dots-btn">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="review-widget-list">
                                            <li><a href="#"><i class="fas fa-edit"></i>Edit</a></li>
                                            <li><a href="#"><i class="fas fa-trash-alt"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima.</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">...</li>
                        <li class="page-item"><a class="page-link" href="#">67</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Membership</h3>
                        <button data-dismiss="alert">close</button>
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
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Current Info</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <ul class="account-card-list">
                        <li>
                            <h5>Active Ads</h5>
                            <h6>3</h6>
                        </li>
                        <li>
                            <h5>Booking Ads</h5>
                            <h6>0</h6>
                        </li>
                        <li>
                            <h5>Rental Ads</h5>
                            <h6>1</h6>
                        </li>
                        <li>
                            <h5>Sales Ads</h5>
                            <h6>2</h6>
                        </li>
                    </ul>
                </div>
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Fun fact</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <div class="account-card-content">
                        <p>Your last ad running was 3 days ago and only have 5 hours left until your last ad expires.</p>
                    </div>
                </div>
                <div class="account-card alert fade show">
                    <div class="account-title">
                        <h3>Resources</h3>
                        <button data-dismiss="alert">close</button>
                    </div>
                    <ul class="account-card-link">
                        <li>
                            <a href="#">
                                <i class="fas fa-dot-circle"></i>
                                <span>Asset Use Guidelines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-dot-circle"></i>
                                <span>Authoring Tutorial</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-dot-circle"></i>
                                <span>Knowledgebase</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-dot-circle"></i>
                                <span>Watermarks</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-dot-circle"></i>
                                <span>Selling Tips</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    DASHBOARD PART END
        =======================================-->

<?php include('./components/footer.php'); ?>