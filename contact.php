<?php
include('./connections/connection.php');
include('./connections/functions.php');
include('./connections/global.php');
include('./components/header.php');
include('./components/sidebar.php');
if (@$_GET['status'] == 1) {
    Toast("black", "You can now login to your account!");
}
?>
<link rel="stylesheet" href="./assets/css/custom/contact.css">
<!-- ============================= 
CONTACT PART START
======================================= -->
<div class="d-block d-md-none"><br></div>
<section class="contact-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Find Us</h3>
                    <p>Mumbai, India </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <h3>Send Mail</h3>
                    <a href="mailto:support@renit.co.in">
                        <p>support@renit.co.in</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.03900799053!2d72.88118615!3d19.082250749999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1695061663131!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                if (isset($_POST['post'])) {
                    $name = $_POST['yourname'];
                    $email = $_POST['youremail'];
                    $subject = $_POST['yoursubject'];
                    $message = $_POST['yourmessage'];
                    $created_at = date('Y-m-d H:i:s');
                    if ($name and $subject and $message and $email) {
                        $custom_message = "
                        HI.. this is $name, <br>
                        and my email address is $email <br>
                        and my message is <br>
                        $message
                    ";
                        if (EMail('support@renit.co.in', $subject, $custom_message)) {
                            Toast('black', "Sent successfully ...");
                        }
                    } else {
                        Toast('warning', "Input all feilds ..");
                    }
                }
                ?>
                <form class="contact-form" method="post" action="./contact">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="yourname" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="youremail" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="yoursubject" class="form-control" placeholder="Your Subject">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea class="form-control" name="yourmessage" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-btn">
                                <button type="submit" name="post" class="btn btn-inline">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>send message</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--=====================================
                    CONTACT PART END
        =======================================-->

<?php include('./components/footer.php'); ?>