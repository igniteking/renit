<!--=====================================
                    FOOTER PART PART
        =======================================-->
<footer class="footer-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>Contact Us</h3>
                    <ul class="footer-address text-white">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p style="margin-left: 5px;">Mumbai, India</p>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:support@renit.co.in">
                                <p class="text-white">support@renit.co.in</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-content">
                    <h3>Information</h3>
                    <ul class="footer-widget">
                        <li><a href="./index.php" class="text-white">Home</a></li>
                        <li><a href="./about.php" class="text-white">About Us</a></li>
                        <li><a href="./terms.php" class="text-white">Terms & Conditions</a></li>
                        <li><a href="./privacy.php" class="text-white">Privacy Policy</a></li>
                        <li><a href="./contact.php" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="footer-info">
                    <style>
                        .flogo {
                            width: 350px;
                            margin-top: 70px;
                            margin-left: 124px;
                        }

                        @media only screen and (max-width: 600px) {
                            .flogo {
                                display: none;
                            }

                        }
                    </style>
                    <h1 class="flogo" style="font-size: 100px; color:white; ">Renit</h1>
                    <!-- <img src="./assets/images/Renit-logo.jpeg" class="flogo" alt="logo"> -->
                    <ul class="footer-count">
                        <!-- <li>
                            <h5>929,238</h5>
                            <p>Registered Users</p>
                        </li> -->
                        <!-- <li>
                            <h5><?= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM assets")) ?></h5>
                            <p>Community Ads</p>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-end" id="akldal">
        <div class="container">
            <div class="footer-end-content text-white">
                <p>All Rights Reserved &copy; by <a href="./index.php" class="text-white">Renit Classifieds LLP</a> <?= date('Y'); ?>
                <ul class="footer-social">
                    <li><a target="_blank" href="https://www.facebook.com/people/Renit/100083612162204/"><i class="text-white fab fa-facebook-f"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/Renit_Inc"><img src="./assets/twitterx.png" width="20px" style="margin: 10px;" alt="" srcset=""></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/company/Renitinc/"><i class="text-white fab fa-linkedin-in"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/Renitinc/"><i class="text-white fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- VENDOR -->
<script src="./assets/js/vendor/popper.min.js"></script>
<script src="./assets/js/vendor/bootstrap.min.js"></script>
<script src="./assets/js/vendor/slick.min.js"></script>

<!-- CUSTOM -->
<script src="./assets/js/custom/slick.js"></script>
<script src="./assets/js/custom/main.js"></script>
<!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>