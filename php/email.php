<?php
require "./common.php";
// برای ارسال ایمسل ابتدا باید تنظیمات php.ini انجام شود.

//$to = "hr.ahmadi6722@gmail.com";
//$subject = "This Is TEST EMAIL";
//
//$message = "<b>This is HTML message. (HAMIDREZA)</b>";
//$message .= "<h1>This is headline.</h1>";
//
//$header = "From:hr.ahmadi@setarehvanak.com \r\n";
//$header .= "Cc:hr.ahmadi689@yahoo.com \r\n";
//$header .= "MIME-Version: 1.0\r\n";
//$header .= "Content-type: text/html\r\n";
//
//$check = mail ($to,$subject,$message,$header);
//
//if( $check == true ) {
//    echo "Message sent successfully...";
//}else {
//    echo "Message could not be sent...";
//}


// برای ارسال ایمسل ابتدا باید تنظیمات php.ini انجام شود.
if (isset( $_GET["send"] )) {

    $email_name = $_GET["email_name"];
    echo ($email_name);
    $email_family = $_GET["email_family"];
    print_h ( $email_family );
    $email_desc = $_GET["email_desc"];
    print_h ( $email_desc );


    $to = "hr.ahmadi6722@gmail.com";
    $subject = "Site About us MSG";

    $message = $email_name . "   " . $email_family . "   نام و نام خانوادگی    ";
    $message .= "<h3>متن پیام</h3>";
    $message .= "<b>" . $email_desc . "</b>";
    $header = "From:mailer@setarehvanak.com \r\n";
    $header .= "Cc:hr.ahmadi689@yahoo.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $check = mail ( $to, $subject, $message, $header );

    if ($check == true) {
//    echo "Message sent successfully...";
        json_encode ( 1001 );
    } else {
//    echo "Message could not be sent...";
        json_encode ( 1002 );
    }
}