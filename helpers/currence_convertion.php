<?php
if (!empty($_GET['key']) or $_GET['var']) {
    $var = $_GET['var'];
    $curr = $_GET['key'];
    $amount = $_GET['amount'];
    $str = str_replace(' ', '', $curr);
    $key = 'fca_live_jO4MgJQiwkQMEDTmwqRA2kF29d5NBExUlmWcHqmo';
    $api_url = 'https://api.freecurrencyapi.com/v1/latest?apikey=' . $key . '&base_currency=' . $str . '';

    // Use cURL to fetch data from the API
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Set the appropriate Content-Type header
    header('Content-Type: application/json');

    // Output the API response
    $response;

    // Decode the JSON data into a PHP associative array
    ($dataArray = json_decode($response, true));
    $values_rec = ($dataArray['data'][$var]);
    echo $var . ' ' . round($values_rec * $amount, 2);
} else if ($_GET['get_curr_code'] == 1) {
    $key = 'fca_live_jO4MgJQiwkQMEDTmwqRA2kF29d5NBExUlmWcHqmo';
    $api_url = 'https://api.freecurrencyapi.com/v1/currencies?apikey=' . $key . '';

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
    ($dataArray = json_decode($response, true));
    // print_r($dataArray['data']);
    $var =  count($dataArray['data']);
    $new_location = (($dataArray['data']));
    foreach ($new_location as $currencyCode => $currencyDetails) {
        $currencyCode;
        $currencyDetails['symbol'];
        $currencyDetails['name'];
        $currencyDetails['symbol_native'];
        $currencyDetails['decimal_digits'];
        $currencyDetails['rounding'];
        $currencyDetails['code'];
        $currencyDetails['name_plural'];


        echo '<option value="' . $currencyCode . '">' . $currencyDetails['name'] . '</option>';
    }
}
