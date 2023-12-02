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

    <!-- TEMPLATE META -->
    <meta name="name" content="Renit">
    <meta name="type" content="Classified Advertising">
    <meta name="title" content="Renit">
    <meta name="keywords" content="classicads, classified, ads, classified ads, listing, business, directory, jobs, marketing, portal, advertising, local, posting, ad listing, ad posting,">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Home - Renit</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2K8M00JPM0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2K8M00JPM0');
    </script>
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.jpeg">
    <link rel="SHORTCUT ICON" href="./assets/images/favicon.jpeg" />
    <!-- FONTS -->
    <link rel="stylesheet" href="./assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="./assets/fonts/font-awesome/fontawesome.css">

    <!-- VENDOR -->
    <link rel="stylesheet" href="./assets/css/vendor/slick.min.css">
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="./assets/css/custom/main.css">

    <link rel="stylesheet" href="./assets/js/toastify-js/src/toastify.css">
    <script src="./assets/js/toastify-js/src/toastify.js"></script>
    <!--=====================================
                    CSS LINK PART END
        =======================================-->

    <!--=====================================
                    HTMX
        =======================================-->
    <script src="https://unpkg.com/htmx.org@1.9.5" integrity="sha384-xcuj3WpfgjlKF+FXhSQFQ0ZNr39ln+hwjN3npfM9VBnUskLolQAcN80McRIVOPuO" crossorigin="anonymous"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>

</head>

<body>
    <!--=====================================
                    HEADER PART START
        =======================================-->
    <header class="header-part header-fixed" style="top: -7px;">
        <div class="mx-4">
            <div class="header-content">
                <div class="header-left">
                    <button type="button" style="margin-top: 3px;" class="header-widget sidebar-btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <?php
                    if (isset($_SESSION['user_email'])) { ?>
                        <a href="index.php" class="">
                            <h2 id="logo" class="text-white">Renit</h2>
                            <!-- <img width="150px" style="margin-right: 50px;margin-left: 50px;" src="./assets/images/Renit-logo.jpeg" alt="logo"> -->
                        </a>
                        <style>
                            * {
                                margin: 0px;

                            }

                            #logo {
                                margin-bottom: -7px;
                                padding: 20px;
                                margin-right: 0px;
                                margin-left: 30px;
                            }

                            @media only screen and (max-width: 600px) {
                                #logo {
                                    margin-right: 20px;
                                }
                            }
                        </style>
                    <?php } else { ?>
                        <style>
                            #logo {
                                padding: 20px;
                                margin-right: 50px;
                                margin-left: 20px;
                            }

                            @media only screen and (max-width: 600px) {
                                #logo {
                                    margin-right: 20px;
                                }
                            }
                        </style>
                        <a href="index.php" class="">
                            <h2 id="logo" class="text-white">Renit</h2>
                            <!-- <img width="150px" style="margin-right: 50px;margin-left: 50px;" src="./assets/images/Renit-logo.jpeg" alt="logo"> -->
                        </a>
                    <?php } ?>
                    <?php
                    if (!@$_SESSION['user_email']) {
                        echo '
                        <a href="./auth/auth.php" id="hideonombile" class="btn btn-inline post-btn" style="padding: 10px; width: 135px; margin-left: -30px; font-size: 12px;">
                                <i class="fas fa-lock"></i>
                                <span>Sign In</span>
                            </a>
                        ';
                    }
                    ?>
                    <button type="button" class="header-widget search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <style>
                    #search_show {
                        display: none;
                    }

                    .header-form {
                        margin-right: -40px;
                    }

                    #location_search::placeholder,
                    #asset_search::placeholder {
                        text-transform: none;
                    }

                    #something {
                        width: 104%;
                        margin-left: -25px;
                    }


                    @media only screen and (max-width: 600px) {
                        .header-form {
                            padding: 10px;
                        }

                        #search_hide {
                            display: none;
                        }

                        #search_show {
                            display: block;
                        }

                        #something {
                            display: none;
                            margin-left: -15px;
                            width: 103%;
                            margin-top: 60px;
                        }

                        #hideonombile {
                            display: none;
                        }

                        .header-form {
                            margin-right: 40px;
                        }
                    }
                </style>
                <div class="header-form">
                    <form action="./ad_listing.php" method="get">
                        <div class="row mt-3">
                            <input value="<?= @$_GET['asset'] ?>" name="asset" autocomplete="off" id="asset_search" hx-get="./helpers/asset.php" hx-include="[id=asset_search]" hx-target="#location_list" hx-trigger="keyup" class="col-md-5 form-control-sm ms-md-4 m-xsm-4" style="border-radius: 7px; padding: 20px;" placeholder="Search, what you need..."> <br><br>
                            <input value="<?= @$_GET['key'] ?>" name="key" autocomplete="off" hx-get="./helpers/location.php" hx-include="[id=location_search]" hx-target="#location_list" hx-trigger="keyup" class="col-md-5 form-control-sm ml-md-2" style="border-radius: 7px; padding: 20px;" id="location_search" placeholder="Search, where you need it...">
                            <button class="col-md-5 form-control mt-2" id="search_show" style="color:white; background-color: black; border:2px solid white; border-radius: 7px; font-size: large;">Search</button>
                            <button type="submit" class="header-widget" id="search_hide" style="margin-left: 7px; margin-top: -12px;">
                                <i class="fas fa-search"></i>
                            </button>

                        </div>
                    </form>
                    <script>
                        document.body.addEventListener('click', function(e) {
                            var clickElement = event.target;
                            // Check if the clicked element is an input field
                            if (clickElement.tagName === 'INPUT' && clickElement.id === 'asset_search' || clickElement.id === 'location_search') {
                                // Clicked outside the box
                                var x = document.getElementById('something');
                                if (x.style.display == 'none') {
                                    x.style.display = 'block';
                                }
                            } else {
                                var x = document.getElementById('something');
                                if (x.style.display == 'block') {
                                    x.style.display = 'none';
                                }
                            }
                        });

                        function insert_value_asset(val) {
                            var location_search = document.getElementById('asset_search').value = val;
                            var parent = document.getElementById('location_list');
                            var x = document.getElementById('something');
                            if (x.style.display == 'block') {
                                console.log('yes');
                                x.style.display = 'none';
                            }
                            while (parent.hasChildNodes())
                                parent.firstChild.remove()
                        }

                        function insert_value(val) {
                            var location_search = document.getElementById('location_search').value = val;
                            var parent = document.getElementById('location_list');
                            var x = document.getElementById('something');
                            if (x.style.display == 'block') {
                                console.log('yes');
                                x.style.display = 'none';
                            }
                            while (parent.hasChildNodes())
                                parent.firstChild.remove()
                        }
                    </script>
                    <div class="header-option" id="something" style="display: none;">
                        <div class="card col-md-10" style="margin: 10px;">
                            <div class="card-body">
                                <div id="location_list"></div>
                                <div id="asset_list"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <?php
                    if (isset($_SESSION['user_email'])) { ?>
                        <ul class="header-list" style="margin-top: 3px;">
                            <li class="header-item">
                                <a href="./bookmark.php" class="header-widget">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li class="header-item">
                                <?php
                                $cont = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'"));

                                if ($cont > 0) {
                                    $vari = fetch_single_row($conn, "SELECT id FROM chat_link WHERE chat_owner_id = '$user_id' OR chat_reciever_id = '$user_id'");
                                    echo '<a href="./chat.php?chat_id=' . $vari . '"><button type="button" class="header-widget">
                                    <i class="fas fa-envelope"></i>
                                </button></a>';
                                } else {
                                    echo '<button type="button" onclick="notif()" class="header-widget">
                                    <i class="fas fa-envelope"></i>
                                </button>';
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
                        </ul>
                    <?php } else { ?>
                        <ul class="header-list" style="margin-right: 7px;">
                            <li class="header-item">
                                <a href="./auth/auth.php" class="header-widget">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li class="header-item">
                                <a href="./auth/auth.php"><button type="button" class="header-widget">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                </a>
                            </li>
                        <?php } ?>
                        <?php
                        if (isset($_SESSION['user_email'])) { ?>
                            <a href="./ad_post.php" class="btn btn-inline post-btn" style="padding: 10px; width: 135px; font-size: 12px;">
                                <i class="fas fa-plus-circle"></i>
                                <span>Rent Out</span>
                            </a>
                        <?php } else { ?>
                            <a href="./auth/auth.php" class="btn btn-inline post-btn" style="padding: 10px; width: 135px; font-size: 12px;">
                                <i class="fas fa-plus-circle"></i>
                                <span>Rent Out</span>
                            </a>
                        <?php }  ?>
                </div>
            </div>
        </div>
    </header>
    <!--=====================================
                    HEADER PART END
        =======================================-->


    <style>
        @media only screen and (max-width: 350px) and (min-width: 0px) {
            .side_margin_for_card {
                margin-left: 1rem;
            }
        }

        @media only screen and (max-width: 700px) and (min-width: 350px) {
            .side_margin_for_card {
                margin-left: 2.5rem;
            }
        }
    </style>
    <?php
    function cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon)
    {
        echo '
                
            <div class="col-md-3">
                        <div class="product-card">
                            <a href="./ad_page.php?asset_id=' . $asset_id . '">
                                <div class="product-media">
                                    <div class="side_margin_for_card">
                                    <img class="object-fit-contain" style="object-position: center; object-fit: contain;" width="' . $width . '" height="' . $height . '" src="' . $asset_thumbnail . '" alt="product">
                                    </div>
                                </div>
                            </a>
                        <div class="product-content">
                            <ol class="breadcrumb product-category">
                                <li><i class="fas fa-tags"></i></li>
                                <li class="breadcrumb-item"><a href="#">' . $asset_category_name . '</a></li>
                                <li class="breadcrumb-item active" aria-current="page">' . $asset_sub_category_name . '</li>
                            </ol>
                            <h5 class="product-title" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <a href="./ad_page.php?asset_id=' . $asset_id . '">' . $asset_name . '</a>
                            </h5>
                            <div class="product-meta" style="white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                <span><i class="fas fa-map-marker-alt"></i>' . $asset_location . '</span>
                            </div>
                            <div class="product-info">
                                <h5 class="product-price">' . $new_symbol . $asset_price . '<span>/Per Day</span></h5>
                                ';
        if (@$_SESSION['user_email']) {
            echo '<div id="notify' . $asset_id . '">
                                    <button type="button" title="Wishlist" hx-get="./helpers/bookmark.php?type=' . $type . '&&asset_id=' . $asset_id . '&&user_id=' . $user_id . '" hx-trigger="click" hx-target="#notify' . $asset_id . '" class="' . $icon . ' fa-heart"></button>
                                </div>';
        }
        echo '
                            </div>
                        </div>
                    </div>
                    </div>
                                ';
    }
    ?>