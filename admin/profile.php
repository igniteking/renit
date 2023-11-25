<?php include("./connections/connection.php"); ?>
<?php include("./connections/functions.php"); ?>
<?php include("./connections/global.php"); ?>
<?php include("./components/header.php"); ?>
<?php
if (@$_GET["status"] == 1) {
    Toast("success", "Login Successfull :) ");
}
?>
<div id="app">
    <?php include("./components/sidebar.php") ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Profile Statistics</h3>
        </div>
        <div class="page-content">
            <section class="h-100 gradient-custom-2">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-9 col-xl-7">
                            <div class="card">
                                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                        <?php
                                        $profile_picture = array_values(mysqli_fetch_array($conn->query("SELECT `profile_picture` FROM `user_data` WHERE id = '$user_id'")))[0];
                                        if (!empty($profile_picture)) {
                                            $profile_picture = $profile_picture;
                                        } else {
                                            $profile_picture = './assets/images/faces/1.jpg';
                                        }
                                        ?>
                                        <img src="<?= $profile_picture ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineForm" class="btn btn-outline-primary" data-mdb-ripple-color="dark" style="z-index: 1;">
                                            Edit profile
                                        </button>
                                    </div>
                                    <div class="ms-3" style="margin-top: 130px;">
                                        <h5 class="text-white"><?= $username ?></h5>
                                        <p>@<?= $user_type ?></p>
                                    </div>
                                </div>
                                <div class="p-4 text-black">
                                    <div class="d-flex justify-content-end text-center py-1">
                                        <div>
                                            <p class="mb-1 h5">253</p>
                                            <p class="small text-muted mb-0">Applications</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="mb-1 h5">1026</p>
                                            <p class="small text-muted mb-0">Followers</p>
                                        </div>
                                        <div>
                                            <p class="mb-1 h5">478</p>
                                            <p class="small text-muted mb-0">Following</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <?php
                                    if (@$_GET['code'] == 1) {
                                        Toast('success', 'Record Update Succesfully ...');
                                    } else if (@$_GET['code'] == 2) {
                                        Toast('danger', 'Error Updating Record ...');
                                    } else if (@$_GET['code'] == 3) {
                                        Toast('info', 'Input All Feilds ...');
                                    }
                                    if (@$_POST["save"]) {
                                        $username = security_check($_POST['username']);
                                        $filename = $_FILES['file']['name'];
                                        $location = uploadImage($filename);
                                        if ($location and $username) {
                                            $update_row = mysqli_query($conn, "UPDATE `user_data` SET `user_name`='$username', `profile_picture`='$location' WHERE id = '$user_id'");
                                            if ($update_row) {
                                                echo "<meta http-equiv=\"refresh\" content=\"0; url=./profile.php?code=1\">";
                                            } else {
                                                echo "<meta http-equiv=\"refresh\" content=\"0; url=./profile.php?code=2\">";
                                            }
                                        } else {
                                            echo "<meta http-equiv=\"refresh\" content=\"0; url=./profile.php?code=3\">";
                                        }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <!--login form Modal -->
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Edit Form </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="./profile.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <label>Username: </label>
                                                        <div class="form-group">
                                                            <input type="text" name="username" placeholder="Username" class="form-control">
                                                        </div>
                                                        <label>Profile Picture: </label>
                                                        <div class="form-group">
                                                            <input type="file" name="file" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <input type="submit" value="Save" name="save" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        </input>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-2">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">My Wallets</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Widthrawl Wallet</a>
                                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Compound Wallet</a>
                                                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Blocked Wallet</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                <div class="card" style="border: 2px solid black;">
                                                                    <div class="card-body px-4 py-4-5">
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                                                <div class="stats-icon purple mb-2">
                                                                                    <i class="iconly-boldShow"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                                                <h6 class="text-muted font-semibold">Widthrawl Wallet</h6>
                                                                                <h6 class="font-extrabold mb-0">
                                                                                    <?php
                                                                                    $final_withral_amount = 0;
                                                                                    $get_widthrawl_wallet = mysqli_query($conn, "SELECT widthrawl_wallet FROM wallet WHERE user_id = '$user_id'");
                                                                                    while ($row = mysqli_fetch_assoc($get_widthrawl_wallet)) {
                                                                                        $widthrawl_wallet = intval($row['widthrawl_wallet']);
                                                                                        echo $final_withral_amount += $widthrawl_wallet;
                                                                                    }
                                                                                    ?>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                <div class="card" style="border: 2px solid black;">
                                                                    <div class="card-body px-4 py-4-5">
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                                                <div class="stats-icon purple mb-2">
                                                                                    <i class="iconly-boldShow"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                                                <h6 class="text-muted font-semibold">Widthrawl Wallet</h6>
                                                                                <h6 class="font-extrabold mb-0">
                                                                                    <?php
                                                                                    $final_compound_amount = 0;
                                                                                    $get_compound_wallet = mysqli_query($conn, "SELECT compound_wallet FROM wallet WHERE user_id = '$user_id'");
                                                                                    while ($row = mysqli_fetch_assoc($get_compound_wallet)) {
                                                                                        $compound_wallet = intval($row['compound_wallet']);
                                                                                        echo $final_compound_amount += $compound_wallet;
                                                                                    }
                                                                                    ?>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                <div class="card" style="border: 2px solid black;">
                                                                    <div class="card-body px-4 py-4-5">
                                                                        <div class="row">
                                                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                                                <div class="stats-icon purple mb-2">
                                                                                    <i class="iconly-boldShow"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                                                <h6 class="text-muted font-semibold">Blocked Wallet</h6>
                                                                                <h6 class="font-extrabold mb-0">
                                                                                    <?php
                                                                                    $final_blocked_amount = 0;
                                                                                    $get_blocked_wallet = mysqli_query($conn, "SELECT extra_wallet FROM wallet WHERE user_id = '$user_id'");
                                                                                    while ($row = mysqli_fetch_assoc($get_blocked_wallet)) {
                                                                                        $blocked_wallet = intval($row['extra_wallet']);
                                                                                        echo $final_blocked_amount += $blocked_wallet;
                                                                                    }
                                                                                    ?>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                                Sed lacus quam, convallis quis condimentum ut, accumsan congue massa.
                                                                Pellentesque et quam vel massa pretium ullamcorper
                                                                vitae eu tortor.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>

        <?php include("./components/footer.php"); ?>