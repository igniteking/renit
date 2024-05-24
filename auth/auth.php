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
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <?php
                    if (@$_GET['tab'] == 'login') {
                        echo '
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
                    ';
                    } else if (@$_GET['tab'] == "register") {
                        echo '
                    <li><a href="#login-tab" class="nav-link" data-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link active" data-toggle="tab">sign up</a></li>
                    ';
                    } else {
                        echo '
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                    <li><a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
                    ';
                    }
                    ?>

                </ul>
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
            <div class="<?= $class ?>" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use credentials to access your account.</p>
                </div>
                <?php
                $login = @$_POST['login'];
                if ($login) {
                    $email_address = security_check(@$_POST['email']);
                    if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                        $email = $email_address;
                    } else {
                        echo "This is an INVALID email address.\n";
                    }
                    $password = security_check(@$_POST['password']);
                    Login($conn, $email, $password);
                }
                ?>
                <form method="post" action="./auth?tab=login">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <small class="form-alert">Please follow this example - email@email.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="form-icon3" placeholder="Password">
                                <z onclick="view('3')" type="button" class="form-icon"><i class="eye fas fa-eye"></i></z>
                                <small class="form-alert">Password must be 6 characters</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-right">
                                <a href="./forget_password" class="form-forgot">Forgot password?</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button name="login" value="login" type="submit" class="btn btn-inline">
                                    <i class="fas fa-unlock"></i>
                                    <span>Enter your account</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <a href="google-oauth.php" class="btn bsb-btn-xl btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg>
                                    <span class="ms-2 fs-6">Login with Google</span>
                                </a>
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
            <div class="<?= $class ?>" style="margin-top: -25px;" id="register-tab">
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
                        <div class="col-12">
                            <div class="form-group">
                                <a href="google-oauth.php" class="btn bsb-btn-xl btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg>
                                    <span class="ms-2 fs-6">Login with Google</span>
                                </a>
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