<!--=====================================
                    SIDEBAR PART START
        =======================================-->
<aside class="sidebar-part">
    <div class="sidebar-body">
        <div class="sidebar-header">
            <a href="./index" class="sidebar-logo">
                <h2 id="testinskdlfmsd" style="color: black; margin-top: 5px;">Renit</h2>
            </a>
            <style>
                #testinskdlfmsd {
                    margin-left: 82px;
                }

                @media only screen and (max-width: 600px) {
                    #testinskdlfmsd {
                        margin-left: 210%
                    }
                }
            </style>
            <button class="sidebar-cross"><i class="fas fa-times"></i></button>
        </div>
        <div class="sidebar-content">
            <?php
            if (@$_SESSION['user_email']) { ?>
                <div class="sidebar-profile">
                    <?php if (empty($profile_picture)) { ?>
                        <a href="#" class="sidebar-avatar"><img src="./assets/images/user.png" height="120" style="object-fit: cover;" alt="avatar"></a>
                    <?php
                    } else { ?>
                        <a href="#" class="sidebar-avatar"><img src="<?= $profile_picture ?>" height="120" style="object-fit: cover;" alt="avatar"></a>
                    <?php } ?>
                    <h4><a href="#" class="sidebar-name"><?= $username ?></a></h4>
                    <a href="ad_post" class="btn btn-inline sidebar-post">
                        <i class="fas fa-plus-circle"></i>
                        <span>Rent Out</span>
                    </a>
                    <a href="./helpers/logout" class="btn btn-inline sidebar-post">
                        <span>Log out</span>
                    </a>
                </div>
            <?php } ?>
            <div class="sidebar-menu">
                <ul class="nav nav-tabs">
                    <li><a href="#main-menu" class="nav-link active" data-toggle="tab">Product Menu</a></li>
                    <?php
                    if (@$_SESSION['user_email']) { ?>
                        <li><a href="#author-menu" class="nav-link" data-toggle="tab">My Menu</a></li>
                    <?php } ?>
                </ul>

                <div class="tab-pane active" id="main-menu">
                    <ul class="navbar-list">
                        <li class="navbar-item"><a class="navbar-link" href="./index">Home</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="./category_list">Rent by category</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="./about">About Us</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="contact">Contact</a></li>
                        <li class="navbar-item navbar-dropdown">
                            <a class="navbar-link" href="#">
                                <span>Terms And Conditions</span>
                                <i class="fas fa-plus"></i>
                            </a>
                            <ul class="dropdown-list">
                                <li><a class="dropdown-link" href="terms">Terms and Conditions</a></li>
                                <li><a class="dropdown-link" href="privacy">Privacy Policy</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
                if (@$_SESSION['user_email']) { ?>

                    <div class="tab-pane" id="author-menu">
                        <ul class="navbar-list">
                            <li class="navbar-item"><a class="navbar-link" href="ad_post">Rent Out</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="my_ad">My Products</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="setting">Settings</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="bookmark">bookmark</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="unavaibility_form">Unavailability Form</a></li>
                            <li class="navbar-item">
                                <?php
                                $cont = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'"));

                                if ($cont > 0) {
                                    $vari = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
                                    echo '<a href="./chat?chat_id=' . $vari . '" class="navbar-link">Messages</a>';
                                } else {
                                    echo '<a href="./index?no_mess=true" class="navbar-link">Messages</a>';
                                }
                                ?>
                                <script>
                                    function notif() {
                                        Toastify({
                                            text: 'No Chats found!',
                                            duration: 3000,
                                            close: true,
                                            gravity: 'top',
                                            offset: {
                                                y: 100
                                            },
                                            position: 'right',
                                            stopOnFocus: true, // Prevents dismissing of toast on hover
                                            backgroundColor: '#000000',
                                            onClick: function() {} // Callback after click
                                        }).showToast();
                                    }
                                </script>
                            </li>
                            <li class="navbar-item"><a class="navbar-link" href="./helpers/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>

            <div class="sidebar-footer">
                All Rights Reserved &copy; by <a href="./index" style="color: black;">Renit Classifieds LLP</a> <?= date('Y'); ?>
            </div>
        </div>
    </div>
</aside>
<!--=====================================
                    SIDEBAR PART END
        =======================================-->


<!--=====================================
                    MOBILE-NAV PART START
        =======================================-->
<nav class="mobile-nav">
    <div class="container">
        <div class="mobile-group">
            <a href="index" class="mobile-widget">
                <i class="fas fa-home"></i>
                <span>home</span>
            </a>
            <?php if (!@$_SESSION['user_email']) {
                echo '<a href="./auth/auth" class="mobile-widget">
                <i class="fas fa-user"></i>
                <span>Sign In</span>
            </a>';
            } else {
                echo '<a href="./setting" class="mobile-widget">
                <i class="fas fa-user"></i>
                <span>profile</span>
            </a>';
            }
            ?>
            <?php if (!@$_SESSION['user_email']) {
                echo '<a href="./auth/auth" class="mobile-widget plus-btn">
                <i class="fas fa-plus"></i>
                <span>Rent Out</span>
            </a>
            <a href="./auth/auth" class="mobile-widget">
                <i class="fas fa-heart"></i>
                <span>Bookmark</span>
            </a>
            <a href="./auth/auth" class="mobile-widget">
                <i class="fas fa-envelope"></i>
                <span>message</span>
            </a>';
            } else {
            ?>
                <a href="ad_post" class="mobile-widget plus-btn">
                    <i class="fas fa-plus"></i>
                    <span>Rent Out</span>
                </a>
                <a href="./bookmark" class="mobile-widget">
                    <i class="fas fa-heart"></i>
                    <span>Bookmark</span>
                </a>
                <?php
                $cont = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'"));

                if ($cont > 0) {
                    $vari = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
                    echo '<a href="./chat?chat_id=' . $vari . '" class="mobile-widget">
                                    <i class="fas fa-envelope"></i>
                    <span>message</span>

                                </a>';
                } else {
                    echo '<a href="./index?no_mess=true" class="mobile-widget">
                                    <i class="fas fa-envelope"></i>
                    <span>message</span>

                                </a>';
                }
                ?>
            <?php }
            if (@$_GET['no_mess'] == true) {
                Toast("black", "No Chats found!");
            } ?>
        </div>
    </div>
</nav>
<!--=====================================
                    MOBILE-NAV PART END
        =======================================-->