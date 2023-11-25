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
            <h3>Add Categories</h3>
        </div>
        <div class="page-content">
            <section class="h-100 gradient-custom-2">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Categories</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <?php
                                        $reg = @$_POST['request'];
                                        if ($reg) {
                                            $category_name = security_check(@$_POST['category_name']);
                                            $category_discription = security_check(@$_POST['category_discription']);
                                            $category_icon = $_FILES['icon']['name'];
                                            $category_image = $_FILES['file']['name'];
                                            $category_icon_location = uploadImage($category_icon, "icon", "../assets/images/category");
                                            $category_image_location = uploadImage($category_image, "file", "../assets/images/category");
                                            $created_at = date("Y-m-d H:i:s");
                                            $insert_request = mysqli_query($conn, "INSERT INTO `categories`(`category_description`, `category_icon`, `category_image`, `category_name`, `created_at`, `id`) 
                                            VALUES ('$category_discription','$category_icon_location','$category_image_location','$category_name','$created_at',NULL)");

                                            if ($insert_request) {
                                                echo "<meta http-equiv=\"refresh\" content=\"0; url=./add_categories.php?code=1\">";
                                            }
                                        }
                                        if (@$_GET['code'] == 1) {
                                            Toast(
                                                "success",
                                                "Succesfully Added the Category.."
                                            );
                                        }

                                        ?>
                                        <form class="form form-horizontal" method="post" action="./add_categories.php" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Category Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="category_name" placeholder="Category Name" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-receipt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Category Discription</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="position-relative">
                                                                <textarea type="text" class="form-control" name="category_discription" id="first-name-icon"> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Category Icon</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="position-relative">
                                                                <input type="file" class="form-control" name="icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Category Image</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="position-relative">
                                                                <input type="file" class="form-control" name="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <input type="submit" class="btn btn-primary me-1 mb-1" name="request" value="Submit"></input>
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