<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
$api_url = 'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
($dataArray = json_decode($resp, true));
$lat = ($dataArray['location']['lat']);
$lng = ($dataArray['location']['lng']);
curl_close($curl);

$get_my_location = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $lat . '%20' . $lng . '&key=AIzaSyDpYx_XZEi34ZSg0JH5JunRo8zTe67Q-Aw';
$curl2 = curl_init($get_my_location);
curl_setopt($curl2, CURLOPT_URL, $get_my_location);
curl_setopt($curl2, CURLOPT_POST, true);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl2);
($dataArray = json_decode($response, true));
$my_location = ($dataArray['results'][0]['address_components'][7]['long_name']);

mysqli_query($conn, "UPDATE `user_data` SET `user_country`='$my_location' WHERE id= '$user_id'");

echo "<meta http-equiv=\"refresh\" content=\"0; url=../index?status=1\">";
