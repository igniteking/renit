<?php
// $name = $_GET['name'];
// $message = $_GET[$name];
$url = "https://renit0104.cognitiveservices.azure.com/contentmoderator/moderate/v1.0/ProcessImage/Evaluate?CacheImage=false";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    'Content-Type: image/jpeg', 'Content-Type: application/json', 'Ocp-Apim-Subscription-Key: 783239d0106040cc81bc035d2d8ce18f'
);


$data = array(
    'CacheImage: false', 'body: {
        "DataRepresentation":"URL",
        "Value":"Content-Type: image/jpeg",
      }',
);
// curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// Check if decoding was successful
($response = curl_exec($curl));
if ($response !== null) {
} else {
    echo "Failed to decode JSON.";
}
// print_r($response)
print_r($dataArray = json_decode($response, true));

echo @$cat1 = (($dataArray['Classification']['Category1']['Score'])) . '<br>';
@$cat2 = (($dataArray['Classification']['Category2']['Score'])) . '<br>';
@$cat3 = (($dataArray['Classification']['Category3']['Score'])) . '<br>';

if (@$cat3 >= 0.8) {
    echo 'Content is not appropriate';
} else {
    if (@$cat2 >= 0.8) {
        echo 'Content is not appropriate';
    } else {
        if (@$cat1 >= 0.8) {
            echo 'Content is not appropriate';
        }
    }
}
curl_close($curl);
