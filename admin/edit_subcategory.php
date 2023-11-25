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
            <h3>Add Sub Categories</h3>
        </div>
        <div class="page-content">
            <section class="h-100 gradient-custom-2">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Sub Categories</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <?php
                                        $cat_id = $_GET['cat_id'];

                                        $reg = @$_POST['request'];
                                        if ($reg) {
                                            $sub_category_name = security_check(@$_POST['sub_category_name']);
                                            $sub_category_discription = security_check(@$_POST['sub_category_discription']);
                                            $category_id = security_check(@$_POST['category_id']);
                                            $created_at = date("Y-m-d H:i:s");
                                            $insert_request = mysqli_query($conn, "UPDATE `sub_categories` SET `sub_category_description`='$sub_category_discription',`sub_category_name`='$sub_category_name',`category_id`='$category_id' WHERE id = '$cat_id'");

                                            if ($insert_request) {
                                                echo "<meta http-equiv=\"refresh\" content=\"0; url=./edit_subcategory.php?cat_id=$cat_id&&code=1\">";
                                            }
                                        }
                                        if (@$_GET['code'] == 1) {
                                            Toast(
                                                "success",
                                                "Succesfully Edited the Sub Category.."
                                            );
                                        }

                                        $get_requests = mysqli_query($conn, "SELECT * FROM sub_categories WHERE id = '$cat_id'");
                                        while ($row = mysqli_fetch_array($get_requests)) {
                                            $req_id = $row['id'];
                                            $category_name = $row['sub_category_name'];
                                            $category_description = $row['sub_category_description'];
                                            $category_id = $row['category_id'];
                                            $category_name = fetch_single_row($conn, "SELECT category_name FROM categories WHERE id = '$category_id'");
                                            $created_at = $row['created_at'];
                                        }
                                        ?>
                                        <form class="form form-horizontal" method="post" action="./edit_subcategory.php?cat_id=<?= $cat_id ?>" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Sub Category Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" value="<?= $category_name ?>" class="form-control" name="sub_category_name" placeholder="Sub Category Name" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Sub Category Discription</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="position-relative">
                                                                <textarea type="text" class="form-control" name="sub_category_discription" id="first-name-icon"> <?= $category_description ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Category</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="position-relative">
                                                                <select name="category_id" class="form-control" id="">
                                                                    <option value="<?= $category_id ?>"><?= $category_name ?></option>
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
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <input type="submit" class="btn btn-primary me-1 mb-1" name="request" value="Update"></input>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>

        <?php include("./components/footer.php"); ?>