<?php include("../connections/connection.php"); ?>
<?php include("../connections/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Renit</title>
    <link rel="icon" href="../../assets/images/favicon.jpeg">

    <link rel="stylesheet" href="../assets/css/main/app.css">
    <link rel="stylesheet" href="../assets/css/pages/auth.css">
    <link rel="stylesheet" href="../assets/extensions/toastify-js/src/toastify.css">
    <script src="../assets/extensions/toastify-js/src/toastify.js"></script>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html">
                            <img src="../assets/images/logo/logo.png" alt="Logo">
                            <h3>Renit</h3>
                        </a>
                    </div> -->

                    <?php
                    if (@$_GET['status'] == 1) {
                        Toast("info", "You can now login to your account!");
                    }
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
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form method="POST" action="./login.php">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <input type="submit" name="login" value="Log in" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <!-- <p class="text-gray-600">Don't have an account? <a href="./register.php" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-image: url('https://picsum.photos/1920/2000?grayscale'); background-repeat: no-repeat, repeat; background-size: cover;">
                </div>
            </div>
        </div>

    </div>

</body>

</html>