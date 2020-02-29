<?php
// When you have your own client ID and secret, put them down here:
$CLIENT_ID = "1020117375:AAFH-vEUBmS57jovAlB07e7LsTpJHnxmaPs";
$CLIENT_SECRET = "-268496";
$postData = array(
    'number' => '+989193109312',  // Specify the recipient's number (NOT the gateway number) here.
    'message' => 'Have a nice day! Loving you:)'
);
$headers = array(
    'Content-Type: application/json',
    'X-WM-CLIENT-ID: '.$CLIENT_ID,
    'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
//$url = 'http://api.whatsmate.net/v1/telegram/single/message/0';
$url = 'https://api.telegram.org/bot1020117375:AAFH-vEUBmS57jovAlB07e7LsTpJHnxmaPs/sendMessage;';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);