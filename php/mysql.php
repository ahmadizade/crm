<?php
require_once 'common.php';
session_start();
if(isset($_SESSION['display_name'])) {
    $login_user = $_SESSION['login_user'];
}



//echo ($login_user);
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "setareh";
$conn = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$conn) {
    die( 'Could not Connect My Sql:' . $mysqli->error );
} else {
//    echo "Successfull.<br><br>";
}
$mysqli = new mysqli( $dbHost, $dbUser, $dbPass );
if (!$mysqli->select_db ( $dbName )) {
    echo "probleme in selecting data base";
    exit( 0 );
}
if ($mysqli->connect_errno) {
    printf ( "connect failed: %s/n", $mysqli->connect_error );
    exit();
}
if (isset( $_GET['show'] )) {
    $sql = "SELECT  * FROM $login_user;";
    $result = $mysqli->query ( $sql );
//    echo('Number Of Data = ' . $result->num_rows);
    print_h ( $result->fetch_all () );
}

//if (isset($_GET['count'])) {
//    $sql = "SELECT  * FROM $login_user;";
//    $result = $mysqli->query($sql);
//    rowcount($result);
//}


//if (isset($_GET['yesterday'])) {
//    $sql = "select count(*) from $login_user where date(clock)=date(date_sub(now(),interval 1 day));";       // نمایش تعداد ثبت شده های دیروز
//    $result = $mysqli->query($sql);
//    print_h($result->fetch_row());
//}

if (isset( $_GET['last_week'] )) {
    $sql = "select count(*) from $login_user where date(clock)=date(date_sub(now(),interval 1 week));";
//    $sql = "SELECT * FROM $login_user WHERE clock > date_sub(now(), interval 1 week);";                    //  نمایش ثبت شده های هفته قبل
    $result = $mysqli->query ( $sql );
    print_h ( $result->fetch_row () );
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


if (isset( $_GET['count'] )) {          //sql_1
    if (isset( $_GET['yesterday'] )) {          //sql_2
        if (isset( $_GET['today'] )) {              //sql_3
            $sql_1 = "SELECT  * FROM $login_user;";
            $result_1 = $mysqli->query ( $sql_1 );                                   // نمایش تعداد ثبت شده های کلی
            $sql_2 = "SELECT * FROM $login_user WHERE DATE(clock) = DATE(NOW()- INTERVAL 1 DAY);";   // نمایش تعداد ثبت شده های دیروز
            $result_2 = $mysqli->query( $sql_2 );
            $sql_3 = "select * FROM $login_user WHERE DATE (clock)=CURDATE();";       // نمایش تعداد ثبت شده های امروز
            $result_3 = $mysqli->query ( $sql_3 );
            $res = array(mysqli_num_rows ( $result_1 ), mysqli_num_rows ( $result_2 ), mysqli_num_rows ( $result_3 ));
            echo json_encode ( $res );
        }
    }
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if (isset( $_GET['save'] )) {
    $user_name = $_GET['user_name'];
    //echo 'first name :' . $user_name . '<br>';
    $family = $_GET['family'];
    //echo 'Last name :' . $family . '<br>';
    $email = $_GET['email'];
    //echo 'Email :' . $email . '<br>';
    $phone = $_GET['phone'];
    //echo 'phone number :' . $phone . '<br>';
    $rate = $_GET['rate'];
    //echo 'User-Rate :' . $rate . '<br>';
    if (!$mysqli->query ( "INSERT INTO $login_user (user_name,family,email,phone,rate) VALUES ('$user_name','$family','$email','$phone','$rate')" )) {
        if ($mysqli->errno == 1062)
//            echo ("  ایمیل وارد شده تکراری میباشد  <br>" . "Error Number = " . $mysqli->errno);
            echo json_encode ( 1062 );
    } else if ($mysqli->errno == 0) {
//        echo "اطلاعات با موفقیت ارسال شد";
            echo json_encode ( 1000 );
    }
}

