<?php
include "./common.php";

function sendMessage() {

    $base = "https://api.telegram.org/bot1020117375:AAFH-vEUBmS57jovAlB07e7LsTpJHnxmaPs/sendMessage?chat_id=-1001191311509&text=";
    $body = $_GET['u'];

    $url = $base.$body;


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
    ));
    $result = curl_exec($ch);
    curl_close($ch);


}

sendMessage();
// initialise variables here
//$chat_id =99487246;
//// path to the picture,
//$text = 'your text goes here';
//// following ones are optional, so could be set as null
//$disable_web_page_preview = null;
//$reply_to_message_id = null;
//$reply_markup = null;
//
//$data = array(
//    'chat_id' => urlencode($chat_id),
//    'text' => urlencode($text),
//    'disable_web_page_preview' => urlencode($disable_web_page_preview),
//    'reply_to_message_id' => urlencode($reply_to_message_id),
//    'reply_markup' => urlencode($reply_markup)
//);
//
//$url = "https://api.telegram.org/bot1020117375:AAFH-vEUBmS57jovAlB07e7LsTpJHnxmaPs/sendMessage";
//
////  open connection
//$ch = curl_init();
////  set the url
//curl_setopt($ch, CURLOPT_URL, $url);
////  number of POST vars
//curl_setopt($ch, CURLOPT_POST, count($data));
////  POST data
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
////  To display result of curl
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
////  execute post
//$result = curl_exec($ch);
////  close connection
//curl_close($ch);
