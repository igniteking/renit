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
    $dataArray = (json_decode($response, true));

    // Check if decoding was successful
    if ($dataArray === null && json_last_error() !== JSON_ERROR_NONE) {
        echo 'JSON decoding failed. Error: ' . json_last_error_msg();
    } else {
        // Access the data as an associative array
        $count = (count(($dataArray['predictions'][0]['terms'])));
        $fetched_country = ((($dataArray['predictions'][0]['terms'][$count - 1]['value'])));


        $path1 = '../helpers/dataset.json';
        $jsonString_dataset = file_get_contents($path1);
        $jsonData_dataset = json_decode($jsonString_dataset, true);

        $path = '../helpers/symbol.json';
        $jsonString = file_get_contents($path);
        $jsonData = json_decode($jsonString, true);

        $rendom = count($jsonData_dataset);
        for ($i = 0; $i < $rendom; $i++) {
            $country = $jsonData_dataset[$i]['country'];
            if ($country == $fetched_country) {
                $country_code = $jsonData_dataset[$i]['currency_code'] . '<br>';
                $final = ($jsonData[$jsonData_dataset[$i]['currency_code']]);
                echo $symbol = ($final['symbol']);
                $code = ($final['code']);
                echo '<input type="hidden" name="curr_code" value="' . $code . '">';
                echo '<input type="hidden" name="curr_sumbol" value="' . $symbol . '">';
                // print_r(array($symbol, $code));
            }
        }
    }
}
