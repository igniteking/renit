<?php include("../connections/connection.php"); ?>
<?php include("../connections/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- AUTHOR META -->
    <meta name="author" content="Zaidan">
    <meta name="email" content="khanzaidan786@gmail.com">
    <meta name="profile" content="https://github.com/igniteking">

    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Renit - User Form</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR PAGE TITLE ICON -->
    <link rel="icon" href="../assets/images/favicon.jpeg">

    <!-- FOR FONTAWESOME -->
    <link rel="stylesheet" href="../assets/fonts/font-awesome/fontawesome.css">

    <!-- FOR BOOTSTRAP -->
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">

    <!-- FOR COMMON STYLE -->
    <link rel="stylesheet" href="../assets/css/custom/main.css">

    <!-- FOR USER FORM PAGE STYLE -->
    <link rel="stylesheet" href="../assets/css/custom/user-form.css">

    <link rel="stylesheet" href="../assets/js/toastify-js/src/toastify.css">
    <script src="../assets/js/toastify-js/src/toastify.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.5" integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous"></script>

    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <!--=====================================
                    USER-FORM PART START
        =======================================-->
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">
                <a href="../index">
                    <h2 class="text-white">Renit</h2>
                    <!-- <img src="../assets/images/renit-logo-removebg-preview.png" alt="logo"> -->
                </a>
                <h1>"Simply Rent It"</span></h1>
            </div>
        </div>

        <div class="user-form-category">
            <div class="user-form-header">
                <style>
                    .hideonmobile {
                        display: none;
                        color: black;
                    }

                    @media only screen and (max-width: 600px) {
                        .hideonmobile {
                            display: block;
                            color: black;
                            margin-left: 130px;
                        }
                    }
                </style>
                <a href="../index">
                    <h2 class="hideonmobile">Renit</h2>
                </a>
            </div>
            <?php
            if (@$_GET['status'] == 1) {
                Toast("success", "You Can Now Login To your Account!");
            }
            if (@$_GET['tab'] == 'login') {
                $class = "tab-pane active";
            } else if (@$_GET['tab'] == "register") {
                $class = "tab-pane";
            } else {
                $class = "tab-pane active";
            }
            ?>
            <div class="<?= $class ?> mt-5" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Upadte your user credentials to access your account.</p>
                </div>
                <?php
                $update_username = @$_POST['update_username'];
                if ($update_username) {
                    $new_username = security_check(@$_POST['new_username']);
                    $insert = mysqli_query($conn, "UPDATE user_data SET `user_name` = '$new_username' WHERE `user_email` = '" . $_SESSION["user_email"] . "'");
                    if ($insert) {
                        $_SESSION["username"] = $new_username;
                        Toast("default", "Username Upadated Successfully...");
                        header("Location: " . "../");
                    }
                }
                ?>
                <form method="post" action="./update_username">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="new_username" placeholder="Full Name">
                                <small class="form-alert">Please follow this example - Full Name</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button name="update_username" value="update_username" type="submit" class="btn btn-inline">
                                    <i class="fas fa-unlock"></i>
                                    <span>Enter your account</span>
                                </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <?php
            if (@$_GET['tab'] == 'register') {
                $class = "tab-pane active";
            } else if (@$_GET['tab'] == "register") {
                $class = "tab-pane";
            } else {
                $class = "tab-pane";
            }
            ?>
            <div class="<?= $class ?>" id="register-tab">
                <div class="user-form-title">
                    <h2>Register</h2>
                </div>
                <?php
                $reg = @$_POST['reg'];
                if ($reg) {
                    if (@$_POST['tadnc']) {
                        $email = security_check(@$_POST['email']);
                        $username = security_check(@$_POST['username']);
                        $password = security_check(@$_POST['password']);
                        $re_pass = security_check(@$_POST['re-pass']);
                        $location = security_check(@$_POST['key']);
                        $user_type = "user";
                        $ip = getenv("REMOTE_ADDR");
                        Register($user_type, $username, $password, $re_pass, $conn, $email, $location);
                    } else {
                        Toast("warning", "Please Accept The Terms and Conditions");
                    }
                }
                ?>
                <form method="POST" action="auth?tab=register">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                                <small class="form-alert">Please follow this example - Username</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <small class="form-alert">Please follow this example - email@email.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" id="form-icon1" class="form-control" name="password" placeholder="Password">
                                <z onclick="view('1')" class="form-icon"><i class="eye fas fa-eye"></i></z>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" id="form-icon2" class="form-control" name="re-pass" placeholder="Repeat Password">
                                <z onclick="view('2')" class="form-icon"><i class="eye fas fa-eye"></i></z>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <script>
                            function view(id) {
                                if (id == 1) {
                                    var feild = document.getElementById('form-icon1');
                                } else if (id == 2) {
                                    var feild = document.getElementById('form-icon2');
                                } else {
                                    var feild = document.getElementById('form-icon3');
                                }
                                if (feild.type == 'password') {
                                    feild.type = 'text';
                                } else {
                                    feild.type = 'password';
                                }
                            }
                        </script>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="key" onfocus="show()" id="asset_location_search" hx-get="../helpers/location" hx-include="[id=asset_location_search]" hx-target="#asset_location_list" hx-trigger="keyup change" class="form-control" placeholder="Enter location">
                                <script>
                                    window.addEventListener('click', function(e) {
                                        if (document.getElementById('asset_location_search').contains(e.target)) {

                                        } else if (document.getElementById('here').contains(e.target)) {
                                            // Clicked in box
                                        } else {
                                            // Clicked outside the box
                                            var x = document.getElementById('here');
                                            if (x.style.display == 'block') {
                                                console.log('yes');
                                                x.style.display = 'none';
                                            }
                                        }
                                    });


                                    function show() {
                                        var x = document.getElementById('here');
                                        if (x.style.display == 'none') {
                                            console.log('yes');
                                            x.style.display = 'block';
                                        }
                                    }

                                    function insert_value(val) {
                                        var location_search = document.getElementById('asset_location_search').value = val;
                                        var parent = document.getElementById('location_list');
                                        var x = document.getElementById('here');
                                        if (x.style.display == 'block') {
                                            console.log('yes');
                                            x.style.display = 'none';
                                        }
                                        while (parent.hasChildNodes())
                                            parent.firstChild.remove()
                                    }
                                </script>
                                <div class="" id="here" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="asset_location_list"></div>
                                        </div>
                                    </div>
                                </div>
                                </small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="tadnc" id="signup-check">
                                    <label class="custom-control-label" for="signup-check">By clicking, you accept all of Renit's <a href="../terms">terms & conditions</a> as well as its <a href="../privacy">privacy policy</a> of Renit.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" value="reg" name="reg" class="btn btn-inline">
                                    <i class="fas fa-user-check"></i>
                                    <span>Create new account</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--=====================================
                    USER-FORM PART END
        =======================================-->


    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- FOR BOOTSTRAP -->
    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>

    <!-- FOR INTERACTION -->
    <script src="../assets/js/custom/main.js"></script>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>