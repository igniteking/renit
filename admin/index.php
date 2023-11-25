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
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Products</h6>
                                            <h6 class="font-extrabold mb-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets")) ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Users</h6>
                                            <h6 class="font-extrabold mb-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_data")) ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Category</h6>
                                            <h6 class="font-extrabold mb-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories")) ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Sub Cat</h6>
                                            <h6 class="font-extrabold mb-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sub_categories")) ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Latest Products</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $fetch = mysqli_query($conn, "SELECT * FROM assets ORDER BY id DESC LIMIT 5");
                                                while ($a = mysqli_fetch_array($fetch)) {
                                                    $asset_id = $a['id'];
                                                    $asset_name = $a['asset_name'];
                                                    $asset_description = $a['asset_description'];
                                                    $asset_thumbnail = $a['asset_thumbnail'];
                                                    echo '<tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="../' . $asset_thumbnail . '">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">' . $asset_name . '</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0" style="white-space: nowrap; width: 100%;
                                                        overflow: hidden;
                                                        text-overflow: ellipsis;">' . $asset_description . '</p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <a href="../ad_page.php?asset_id=' . $asset_id . '"><button class="btn btn-block btn-md btn-outline-primary font-bold mt-3">View Product</button></a>
                                                    </td>
                                                </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <tfoot>
                                            <a href="./all_products.php"><button class="btn btn-block btn-md btn-outline-primary font-bold mt-3">View All Product</button></a>
                                        </tfoot>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="assets/images/faces/1.jpg" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold"><?= $username ?></h5>
                                    <h6 class="text-muted mb-0">@<?= $user_type ?></h6><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Users</h4>
                        </div>
                        <div class="card-content pb-4">
                            <?php
                            $fetch = mysqli_query($conn, "SELECT * FROM user_data ORDER BY id DESC LIMIT 3");
                            while ($a = mysqli_fetch_array($fetch)) {
                                $user_name = $a['user_name'];
                                $profile_picture = $a['profile_picture'];
                                if ($profile_picture == "") {
                                    $profile_picture = "assets/images/user.png";
                                }
                                echo '<div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="../' . $profile_picture . '">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">' . $user_name . '</h5>
                                </div>
                            </div>';
                            }
                            ?>
                            <div class="px-4">
                                <a href=""><button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>View All Requests</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php include("./components/footer.php"); ?>
        <!-- <script>
    var optionsProfileVisit = {
        annotations: {
            position: 'back'
        },
        dataLabels: {
            enabled: false
        },
        chart: {
            type: 'bar',
            height: 300
        },
        fill: {
            opacity: 1
        },
        plotOptions: {},
        series: [{
            name: 'sales',
            data: [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]
        }],
        colors: '#435ebe',
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        },
    }
    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
    chartProfileVisit.render();
</script> -->