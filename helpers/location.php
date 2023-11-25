<?php
// Set the URL of the API you want to access
if (!empty($_GET['key'])) {
    $address = $_GET['key'];
    $str = str_replace(' ', '', $address);
    $api_url = 'https://maps.googleapis.com/maps/api/place/autocomplete/json?input=' . $str . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';

    // Use cURL to fetch data from the API
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // print_r(explode('{', $ch));
    // Set the appropriate Content-Type header
    header('Content-Type: application/json');

    // Output the API response
    $response;

    // Decode the JSON data into a PHP associative array
    $dataArray = json_decode($response, true);

    // Check if decoding was successful
    if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
        echo 'JSON decoding failed. Error: ' . json_last_error_msg();
    } else {
        // Access the data as an associative array
        for ($i = 0; $i < 3; $i++) {
            $val = @$dataArray['predictions'][$i]['description'];
            echo '<p onclick="insert_value(' . "'$val'" . ' )">' . $val . '</p>';
        }
    }
}
