<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?lat=0&callback=test&id=2172797&units=%2522metric%2522%20or%20%2522imperial%2522&mode=xml%252C%20html&q=tehran",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
        "x-rapidapi-key: aee77541camshd1b9e4eabf15742p11fc54jsnfc6ab8658a57"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}