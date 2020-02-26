<?php
// When you have your own client ID and secret, put them down here:
$CLIENT_ID = "75db14f2d437e394b4bf86c1903335f1";
$CLIENT_SECRET = "11847";
$postData = array(
    'number' => '+989355071113',  // Specify the recipient's number (NOT the gateway number) here.
    'message' => 'Have a nice day! Loving you:)'  // FIXME
);
$headers = array(
    'Content-Type: application/json',
    'X-WM-CLIENT-ID: '.$CLIENT_ID,
    'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);
$url = 'http://api.whatsmate.net/v1/telegram/single/message/0';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
$response = curl_exec($ch);
echo "Response: ".$response;
curl_close($ch);
?>