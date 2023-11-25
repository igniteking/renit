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
                <h2 class="text-white">Renit</h2>
                <!-- <a href="#"><img src="../assets/images/renit-logo-removebg-preview.png" alt="logo"></a> -->
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
                <h2 class="hideonmobile">Renit</h2>
            </div>
            <div class="user-form-category-btn">
                <ul class="nav nav-tabs">
                    <li><a href="#login-tab" class="nav-link active" data-toggle="tab">Verify Your Account</a></li>
                </ul>
            </div>
            <div class="tab-pane active" id="login-tab">
                <div class="user-form-title">
                    <h2>Welcome!</h2>
                </div>
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h3>Please verify your email to continue to login</h3>
                        </div>
                        <div class="card-footer">
                            <a style="all: unset;" href="https://mail.google.com/mail/u/0/#inbox">
                                <button class="btn col-md-12 text-white" style="background-color: black;">Click to open gmail</button>
                        </div>
                        </a>
                    </div>
                </div>
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