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
    <title>Renit - Forget Password</title>

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
                <h2 class="text-white">Renit</h2>
                <!-- <a href="#"><img src="../assets/images/renit-logo-removebg-preview.png" alt="logo"></a> -->
                <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                <p>Biggest Online Advertising Marketplace in the World.</p>
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
                <h2 class="hideonmobile">Renit</h2>
            </div>
            <div class="user-form-category-btn">
            </div>
            <?php
            if (@$_GET['status'] == 1) {
                Toast("success", "You Can Now Login To your Account!");
            }
            if (@$_GET['tab'] == '') {
                $class = "tab-pane active";
            } else if (@$_GET['tab'] == "1") {
                $class = "tab-pane";
            } else {
                $class = "tab-pane active";
            }
            ?>
            <div class="<?= $class ?>" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                    <p>Use your email credentials to reset your account's password.</p>
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

                    EFMail($email, 'Reset Password', '<a href="https://renit.co.in/auth/forget_password.php?auth=1&email=' . $email . '&tab=1">Click here to reset your password</a>');
                }
                ?>
                <form method="post" action="./forget_password.php">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <small class="form-alert">Please follow this example - email@email.com</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button name="login" value="login" type="submit" class="btn btn-inline">
                                    <i class="fas fa-unlock"></i>
                                    <span>Reset Your Password</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="user-form-direction">
                    <p>Don't have an account? click on <span><a href="./auth.php">( sign up )</a></span></p>
                </div>
            </div>

            <?php
            if (@$_GET['tab'] == '1') {
                $class = "tab-pane active";
            } else if (@$_GET['tab'] == "") {
                $class = "tab-pane";
            } else {
                $class = "tab-pane";
            }
            ?>
            <div class="<?= $class ?>" id="register-tab">
                <div class="user-form-title">
                    <h2>Set your new password</h2>
                </div>
                <?php
                $reg = @$_POST['reg'];
                if ($reg) {
                    if (@$_GET['auth'] == 1) {
                        $email = security_check(@$_GET['email']);
                        $username = security_check(@$_POST['username']);
                        $password = security_check(@$_POST['password']);
                        $re_pass = security_check(@$_POST['re-pass']);
                        if ($password == $re_pass) {
                            if (preg_match("/\d/", $password)) {
                                if (preg_match("/[A-Z]/", $password)) {
                                    if (preg_match("/[a-z]/", $password)) {
                                        if (preg_match("/\W/", $password)) {
                                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                            if (mysqli_query($conn, "UPDATE `user_data` SET `user_password`='$hashedPwd' WHERE user_email = '$email'")) {
                                                Toast('success', 'Password changed successfully');
                                                refresh('./auth.php', 2);
                                            }
                                        } else {
                                            echo "<div class='error-styler'><center>
                                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one special character!</p>;
                                                        </center></div>";
                                        }
                                    } else {
                                        echo "<div class='error-styler'><center>
                                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one small Letter</p>
                                </center></div>";
                                    }
                                } else {
                                    echo "<div class='error-styler'><center>
                                                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one Capital Letter</p>
                                </center></div>";
                                }
                            } else {
                                echo "<div class='error-styler'><center>
                                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one digit</p>
                            </center></div>";
                            }
                        } else {
                            echo "<div class='error-styler'><center>
                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Both Password's Dont Match!</p>
                            </center></div>";
                        }
                    } else {
                        refresh('../index.php', 0);
                    }
                }
                ?>
                <form method="POST" action="./forget_password.php?auth=<?= $_GET['auth'] ?>&email=<?= $_GET['email'] ?>&tab=<?= $_GET['tab'] ?>">
                    <div class="row">
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
                                <button type="submit" value="reg" name="reg" class="btn btn-inline">
                                    <i class="fas fa-user-check"></i>
                                    <span>Create new passwrod</span>
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