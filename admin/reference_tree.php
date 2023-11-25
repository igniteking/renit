<?php include("./connections/connection.php"); ?>
<?php include("./connections/functions.php"); ?>
<?php include("./connections/global.php"); ?>
<?php include("./components/header.php"); ?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php include("./components/sidebar.php") ?>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Layout Default</h3>
                            <p class="text-subtitle text-muted">The default layout </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Loan application for all category</h4>
                        </div>
                        <div class="card-body">
                            <!-- // Basic multiple Column Form section start -->
                            <div class="body genealogy-body genealogy-scroll">
                                <div class="genealogy-tree">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <img src="./assets/images/faces/1.jpg" alt="Member">
                                                        <div class="member-details mt-2">
                                                            <h6><?= $username ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul class="active">
                                                <?php
                                                getLeftUsers(25, $conn, 1, 'left');
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            function getLeftUsers($count, $conn, $child_id, $location)
                            {
                                // Base case: If count reaches 0, stop the recursion
                                if ($count <= 0) {
                                    return;
                                }

                                $get_member = mysqli_query($conn, "SELECT * FROM `mlm_tree` WHERE parent_id = '$child_id' AND child_location = '$location'");
                                while ($rows = mysqli_fetch_assoc($get_member)) {
                                    $child_id = $rows['child_id'];
                                    $get_member_left_details = mysqli_query($conn, "SELECT * FROM `user_data` WHERE id = '$child_id'");
                                    while ($rows = mysqli_fetch_assoc($get_member_left_details)) {
                                        $child_name = $rows['user_name'];
                                        $child_id = $rows['id'];
                                        echo '
                                                <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img src="./assets/images/faces/1.jpg" alt="Member">
                                                                    <div class="member-details">
                                                                        <p>' . $child_name . '</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="member-view-box">
                                                                        <div class="member-image">
                                                                            <img src="./assets/images/faces/1.jpg" alt="Member">
                                                                            <div class="member-details">
                                                                                <h3>Member 1-3</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="member-view-box">
                                                                                <div class="member-image">
                                                                                    <img src="./assets/images/faces/1.jpg" alt="Member">
                                                                                    <div class="member-details">
                                                                                        <h3>Member 1-3-1</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);">
                                                                            <div class="member-view-box">
                                                                                <div class="member-image">
                                                                                    <img src="./assets/images/faces/1.jpg" alt="Member">
                                                                                    <div class="member-details">
                                                                                        <h3>Member 1-3-2</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                            ';
                                        getLeftUsers($count - 1, $conn, $child_id, $location);
                                    }
                                }
                                // Recursive call with decreased count
                            }

                            ?>
                            <!-- // Basic multiple Column Form section end -->
                        </div>
                    </div>
                </section>
            </div>
            <style>
                /*----------------genealogy-scroll----------*/

                .genealogy-scroll::-webkit-scrollbar {
                    width: 5px;
                    height: 8px;
                }

                .genealogy-scroll::-webkit-scrollbar-track {
                    border-radius: 10px;
                    background-color: #e4e4e4;
                }

                .genealogy-scroll::-webkit-scrollbar-thumb {
                    background: #212121;
                    border-radius: 10px;
                    transition: 0.5s;
                }

                .genealogy-scroll::-webkit-scrollbar-thumb:hover {
                    background: #d5b14c;
                    transition: 0.5s;
                }


                /*----------------genealogy-tree----------*/
                .genealogy-body {
                    white-space: nowrap;
                    overflow-y: hidden;
                    padding: 50px;
                    min-height: 500px;
                    padding-top: 10px;
                    text-align: center;
                }

                .genealogy-tree {
                    display: inline-block;
                }

                .genealogy-tree ul {
                    padding-top: 20px;
                    position: relative;
                    padding-left: 0px;
                    display: flex;
                    justify-content: center;
                }

                .genealogy-tree li {
                    float: left;
                    text-align: center;
                    list-style-type: none;
                    position: relative;
                    padding: 20px 5px 0 5px;
                }

                .genealogy-tree li::before,
                .genealogy-tree li::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 50%;
                    border-top: 2px solid #ccc;
                    width: 50%;
                    height: 18px;
                }

                .genealogy-tree li::after {
                    right: auto;
                    left: 50%;
                    border-left: 2px solid #ccc;
                }

                .genealogy-tree li:only-child::after,
                .genealogy-tree li:only-child::before {
                    display: none;
                }

                .genealogy-tree li:only-child {
                    padding-top: 0;
                }

                .genealogy-tree li:first-child::before,
                .genealogy-tree li:last-child::after {
                    border: 0 none;
                }

                .genealogy-tree li:last-child::before {
                    border-right: 2px solid #ccc;
                    border-radius: 0 5px 0 0;
                    -webkit-border-radius: 0 5px 0 0;
                    -moz-border-radius: 0 5px 0 0;
                }

                .genealogy-tree li:first-child::after {
                    border-radius: 5px 0 0 0;
                    -webkit-border-radius: 5px 0 0 0;
                    -moz-border-radius: 5px 0 0 0;
                }

                .genealogy-tree ul ul::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 50%;
                    border-left: 2px solid #ccc;
                    width: 0;
                    height: 20px;
                }

                .genealogy-tree li a {
                    text-decoration: none;
                    color: #666;
                    font-family: arial, verdana, tahoma;
                    font-size: 11px;
                    display: inline-block;
                    border-radius: 5px;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                }

                .genealogy-tree li a:hover+ul li::after,
                .genealogy-tree li a:hover+ul li::before,
                .genealogy-tree li a:hover+ul::before,
                .genealogy-tree li a:hover+ul ul::before {
                    border-color: #fbba00;
                }

                /*--------------memeber-card-design----------*/
                .member-view-box {
                    padding: 0px 20px;
                    text-align: center;
                    border-radius: 4px;
                    position: relative;
                }

                .member-image {
                    width: 60px;
                    position: relative;
                }

                .member-image img {
                    width: 60px;
                    height: 60px;
                    border-radius: 6px;
                    background-color: #000;
                    z-index: 1;
                }
            </style>
            <script>
                $(function() {
                    $('.genealogy-tree ul').hide();
                    $('.genealogy-tree>ul').show();
                    $('.genealogy-tree ul.active').show();
                    $('.genealogy-tree li').on('click', function(e) {
                        var children = $(this).find('> ul');
                        if (children.is(":visible")) children.hide('fast').removeClass('active');
                        else children.show('fast').addClass('active');
                        e.stopPropagation();
                    });
                });
            </script>
            <?php include("./components/footer.php"); ?>