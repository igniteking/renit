<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');

$min_price = @$_GET['min_price'];
if ($min_price == '') {
    $min_price = 0;
}
$max_price = @$_GET['max_price'];
$get_npo_stars = @$_GET['stars'];
if ($get_npo_stars) {
    if ($max_price) {
        if (!empty($_GET['asset'])) {
            $asset_search_name = @$_GET['asset'];
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }
                        $arr = array();
                        $i = 0;
                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                        if (mysqli_num_rows($get_stars) > 0) {

                            while ($stars = mysqli_fetch_array($get_stars)) {
                                $staers = $stars['stars'];
                                $arr[$i] = $staers;
                                $i++;
                            }
                            $ranasdklamsd = array_sum($arr) / count($arr);
                        } else {
                            $ranasdklamsd = 0;
                        }
                        if ($ranasdklamsd  == $get_npo_stars) {
                            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                        }
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else if (empty($_GET['asset'])) {
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }
                        $arr = array();
                        $i = 0;
                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                        if (mysqli_num_rows($get_stars) > 0) {

                            while ($stars = mysqli_fetch_array($get_stars)) {
                                $staers = $stars['stars'];
                                $arr[$i] = $staers;
                                $i++;
                            }
                            $ranasdklamsd = array_sum($arr) / count($arr);
                        } else {
                            $ranasdklamsd = 0;
                        }
                        if ($ranasdklamsd  == $get_npo_stars) {
                            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                        }
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else {
            echo '<div class="row"><div class="card"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
        }
    } else {
        if (!empty($_GET['asset'])) {
            $asset_search_name = @$_GET['asset'];
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active'");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }
                        $arr = array();
                        $i = 0;
                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                        if (mysqli_num_rows($get_stars) > 0) {

                            while ($stars = mysqli_fetch_array($get_stars)) {
                                $staers = $stars['stars'];
                                $arr[$i] = $staers;
                                $i++;
                            }
                            $ranasdklamsd = array_sum($arr) / count($arr);
                        } else {
                            $ranasdklamsd = 0;
                        }
                        if ($ranasdklamsd  == $get_npo_stars) {
                            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                        }
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else if (empty($_GET['asset'])) {
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_condition = 'active'");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }
                        $arr = array();
                        $i = 0;
                        $get_stars = mysqli_query($conn, "SELECT * FROM review WHERE asset_id = '$asset_id'");
                        if (mysqli_num_rows($get_stars) > 0) {

                            while ($stars = mysqli_fetch_array($get_stars)) {
                                $staers = $stars['stars'];
                                $arr[$i] = $staers;
                                $i++;
                            }
                            $ranasdklamsd = array_sum($arr) / count($arr);
                        } else {
                            $ranasdklamsd = 0;
                        }
                        if ($ranasdklamsd  == $get_npo_stars) {
                            cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                        }
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else {
            echo '<div class="row"><div class="card"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
        }
    }
} else {
    if ($max_price) {
        if (!empty($_GET['asset'])) {
            $asset_search_name = @$_GET['asset'];
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }

                        cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else if (empty($_GET['asset'])) {
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_condition = 'active' AND asset_price BETWEEN $min_price AND $max_price");

                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }

                        cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else {
            echo '<div class="row"><div class="card"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
        }
    } else {
        if (!empty($_GET['asset'])) {
            $asset_search_name = @$_GET['asset'];
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_name LIKE '%$asset_search_name%' AND asset_condition = 'active'");
                error_reporting(E_ALL);
                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }

                        cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else if (empty($_GET['asset'])) {
            $api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $_GET['address'] . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray = json_decode($response, true));
            @$latitude = ($dataArray['results'][0]['geometry']['location']['lat']);
            @$longitude = ($dataArray['results'][0]['geometry']['location']['lng']);



            // NEARBY SEARCH DIRECT

            $nearby_url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $latitude . '2%2C' . $longitude . '&radius=10000&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
            // Use cURL to fetch data from the API
            $ch_nearby = curl_init($nearby_url);
            curl_setopt($ch_nearby, CURLOPT_RETURNTRANSFER, true);
            $response_nearby = curl_exec($ch_nearby);
            curl_close($ch_nearby);

            // print_r(explode('{', $ch));
            // Set the appropriate Content-Type header
            header('Content-Type: application/json');

            // Output the API response
            // print_r($response);

            // Decode the JSON data into a PHP associative array
            ($dataArray_nearby = json_decode($response_nearby, true));
            $var =  count($dataArray_nearby['results']);
            $output = 0;
            for ($i = 0; $i < $var; $i++) {
                # code...
                $new_location = (($dataArray_nearby['results'][$i]['name']));
                $new_location = htmlspecialchars($new_location);
                $get_asset = mysqli_query($conn, "SELECT * FROM assets WHERE asset_location LIKE '%$new_location%' AND asset_condition = 'active'");
                if (mysqli_num_rows($get_asset) > 0) {
                    $output = 1;
                    while ($rows = mysqli_fetch_assoc($get_asset)) {
                        @$asset_id = $rows["id"];
                        @$asset_name = $rows["asset_name"];
                        @$asset_thumbnail = $rows["asset_thumbnail"];
                        @$asset_price = $rows["asset_price"];
                        @$asset_location = $rows["asset_location"];
                        $new_symbol = $rows['symbol'];
                        @$asset_category = intval($rows["asset_category"]);
                        @$asset_category_name = fetch_single_row($conn, "SELECT `category_name` FROM `categories` WHERE id = '$asset_category'");
                        @$asset_sub_category = intval($rows["asset_sub_category"]);
                        @$asset_sub_category_name = fetch_single_row($conn, "SELECT `sub_category_name` FROM `sub_categories` WHERE id = '$asset_sub_category';");
                        (getimagesize('../' . $asset_thumbnail)[1]);
                        if (getimagesize('../' . $asset_thumbnail)[1] > 500) {
                            $width = "260";
                            $height = "200";
                            $margin = "0px";
                        } else {
                            $margin = "0px";
                            $width = "260";
                            $height = "200";
                        }

                        if (@$_SESSION['user_email']) {

                            $get_bookmark = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `bookmark` WHERE user_id = '$user_id' AND asset_id = '$asset_id'"));
                            if ($get_bookmark > 0) {
                                $type = 'remove';
                                $icon = 'fas';
                            } else {
                                $icon = 'far';
                                $type = 'add';
                            }
                        } else {
                            $type = "";
                            $user_id = "";
                            $icon = "";
                            $user_id = "";
                        }

                        cardWidget($asset_id, $width, $height, $asset_thumbnail, $asset_category_name, $asset_sub_category_name, $asset_name, $asset_location, $new_symbol, $asset_price, $type, $user_id, $icon);
                    }
                }
            }
            if ($output != 1) {
                echo '<div class="row"><div class="card col-md-12"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
            }
        } else {
            echo '<div class="row"><div class="card"><div class="card-body"><h5>No Products Found!</h5></div></div></div>';
        }
    }
}
