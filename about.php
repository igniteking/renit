<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
include('./components/sidebar.php');
if (@$_GET['status'] == 1) {
    Toast("info", "You can now login to your account!");
}
?>
<link rel="stylesheet" href="./assets/css/custom/about.css">

<!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


<!--=====================================
                    ABOUT PART START
        =======================================-->
<section class="about-part mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content text-justify">
                    <h2>About Renit</h2>
                    <p>
                        Renit provides a medium to individuals and organisations who do not have access to adequate resources and to those who have the said resources underutilized, to ‘rent in’ and ‘rent out’ such resources. We want to enable artists to explore, creators to create, entrepreneurs to build, innovators to innovate or maybe just enable individuals to have fun, but most importantly enable everyone to try and not be hindered by lack of resources.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row about-image">
                    <div class="col-6 col-lg-10" style="margin-left: 50px;">
                        <img src="./assets/data/About.jpg" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    ABOUT PART END
        =======================================-->


<!--=====================================
                    BEST PART START
        =======================================-->
<section class="best-part">
    <div class="container">
        <div class="row text-justify">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="best-card">
                    <div class="best-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="best-content">
                        <h4>Mission</h4>
                        Our mission is to help individuals and organisations make affordable consumption choices; and unlock the potential of their untapped resources, by providing them the most seamless platform to ‘rent out’ and ‘rent in’ resources; ultimately fostering a world of shared abundance.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="best-card">
                    <div class="best-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="best-content">
                        <h4>Vision</h4>
                        Our vision is to be the largest enabler for individuals and organisations; enabling them to do better, aim higher and achieve greater, ultimately making the world a better place.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="best-card">
                    <div class="best-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="best-content">
                        <h4>Values</h4>
                        We’ll be honest with you, it’s too early for a concrete answer. We are in the process of discovering values that we want to stick to in our journey. For now, we want to stick to enable our users by providing them most affordable consumption solutions.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./components/footer.php'); ?>