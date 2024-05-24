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
            <h3>Sub Categories List</h3>
        </div>
        <div class="page-content">
            <?php
            $reg = @$_POST['request'];
            if ($reg) {
                $amount = security_check(@$_POST['amount']);
                $ref_id = security_check(@$_POST['ref_id']);
                $screen_shot = security_check(@$_POST['screen_shot']);
                $created_at = date("Y-m-d H:i:s");
                $status = "pending";
                $length = 10;
                $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                $folder = mkdir("./picture/$random");
                $target_dir = "./picture/$random/";
                $filename2 = $_FILES['screen_shot']['name'];
                $array_content2 = move_uploaded_file($_FILES['screen_shot']['tmp_name'], $target_dir . $filename2);
                $final2 =  $target_dir . $filename2;
                $insert_request = mysqli_query($conn, "INSERT INTO `request_recharge`(`amount`, `created_at`, `id`, `reverence_ss`, `status`, `user_id`) VALUES
                                             ('$amount','$created_at', NULL ,'$final2','$status','$user_id')");

                if ($insert_request) {
                    Toast(
                        "sucess",
                        "Succesfully Submitted Recharge Request.."
                    );
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=./request_recharge\">";
                }
            }

            ?>
            <!-- Hoverable rows start -->
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Discription</th>
                                                    <th>Date</th>
                                                    <th>Action (s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (@$_GET['code'] == 1) {
                                                    Toast('success', 'Request Accepted Succesfully ...');
                                                } else if (@$_GET['code'] == 2) {
                                                    Toast('success', 'Request Rejected Succesfully ...');
                                                }
                                                $get_requests = mysqli_query($conn, "SELECT * FROM sub_categories ORDER BY id DESC");
                                                while ($row = mysqli_fetch_array($get_requests)) {
                                                    $req_id = $row['id'];
                                                    $category_name = $row['sub_category_name'];
                                                    $category_description = $row['sub_category_description'];
                                                    $created_at = $row['created_at'];
                                                    echo '
                                                    <tr>
                                                <td class="text-bold-500">' . $category_name . '</td>
                                                <td>' . $category_description . '</td>
                                                <td>' . $created_at . '</td>
                                                <td>
                                                <a href="./edit_subcategory?cat_id=' . $req_id . '"><button class="btn icon btn-success">Edit</button></a>
                                                <button onclick="accept(' . $req_id . ',' . $user_id . ')" class="btn icon btn-danger"><i class="bi bi-x-lg"></i></button>
                                                </td>
                                                </tr>
                                                ';
                                                }
                                                ?>

                                                <script>
                                                    function accept(req_id, amount, user_id) {
                                                        var xhttp = new XMLHttpRequest();
                                                        xhttp.onreadystatechange = function() {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                window.location.href = this.response;
                                                            }
                                                        };
                                                        xhttp.open("GET", "./helpers/recharge?req_id=" + req_id + "&&amount=" + amount + "&&user_id=" + user_id + "&&status=accept", true);
                                                        xhttp.send();
                                                    }

                                                    function reject(req_id, amount, user_id) {
                                                        var xhttp = new XMLHttpRequest();
                                                        xhttp.onreadystatechange = function() {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                window.location.href = this.response;
                                                            }
                                                        };
                                                        xhttp.open("GET", "./helpers/recharge?req_id=" + req_id + "&&amount=" + amount + "&&user_id=" + user_id + "&&status=reject", true);
                                                        xhttp.send();
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Hoverable rows end -->
        </div>

        <?php include("./components/footer.php"); ?>