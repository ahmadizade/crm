<?php
require_once 'common.php';
require '../lib/func.php';
session_start();
if (isset($_SESSION['display_name'])) {
    $login_user = $_SESSION['login_user'];
    $userid = $_SESSION['userid'];
    echo ($login_user).'<br>';
    echo ($userid).'<br>';
}
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");
if (!$conn) {
    die('Could not Connect My Sql:' . $mysqli->error);
} else {
    echo "Successfull connect to database<br><br>";
}
$mysqli = new mysqli($dbHost, $dbUser, $dbPass);
if (!$mysqli->select_db($dbName)) {
    echo "probleme in selecting data base";
    exit(0);
}
if ($mysqli->connect_errno) {
    printf("connect failed: %s/n", $mysqli->connect_error);
    exit();
}
if (isset($_GET['show'])) {
    $sql = "SELECT  * FROM $login_user;";
    $result = $mysqli->query($sql);
    echo('Number Of Data = ' . $result->num_rows);
    print_h($result->fetch_all());
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

//if (isset($_GET['last_week'])) {
//    $sql = "select count(*) from $login_user where date(clock)=date(date_sub(now(),interval 1 week));";
////    $sql = "SELECT * FROM $login_user WHERE clock > date_sub(now(), interval 1 week);";                    //  نمایش ثبت شده های هفته قبل
//    $result = $mysqli->query($sql);
//    print_h($result->fetch_row());
//}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


if (isset($_GET['count'])) {          //sql_1
    if (isset($_GET['yesterday'])) {          //sql_2
        if (isset($_GET['today'])) {              //sql_3
            $sql_1 = "SELECT  * FROM customers_log;";
            $result_1 = $mysqli->query($sql_1);                                   // نمایش تعداد ثبت شده های کلی
            $sql_2 = "SELECT * FROM customers_log WHERE DATE(clock) = DATE(NOW()- INTERVAL 1 DAY);";   // نمایش تعداد ثبت شده های دیروز
            $result_2 = $mysqli->query($sql_2);
            $sql_3 = "select * FROM customers_log WHERE DATE (clock)=CURDATE();";       // نمایش تعداد ثبت شده های امروز
            $result_3 = $mysqli->query($sql_3);
            $res = array(mysqli_num_rows($result_1), mysqli_num_rows($result_2), mysqli_num_rows($result_3));
            echo json_encode($res);
        }
    }
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  (از تابع test_inpute استفاده شده)

if (isset($_GET['save'])) {
//    $user_name = $_GET['user_name'];

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++NAME VALIDATE
    $uname = test_input($_GET['user_name']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $uname)) {
        echo json_encode(3000);
    } else {
        $user_name = $uname;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++FAMILY VALIDATE
        $ufamily = $_GET['family'];
        if (!preg_match("/^[a-zA-Z ]*$/", $ufamily)) {
            echo json_encode(4000);
        } else {
            $family = $ufamily;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++EMAIL VALIDATE
            $uemail = test_input($_GET["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(5000);
            } else {
                $email = $uemail;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++mobile VALIDATE 0912.......
                $umobile = $_GET['mobile'];
                if (!preg_match("/^09[0-9]{9}$/", $umobile)) {
                    echo json_encode(6000);
                } else {
                    $mobile = $umobile;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ RATE Do not needed

                    $rate = $_GET['rate'];
                    //echo 'User-Rate :' . $rate . '<br>';


                    if (!$mysqli->query("INSERT INTO customers_log (name,family,email,mobile,rate) VALUES ('$user_name','$family','$email','$mobile','$rate')")) {
                        if ($mysqli->errno == 1062)
//            echo ("  ایمیل وارد شده تکراری میباشد  <br>" . "Error Number = " . $mysqli->errno);
                            echo json_encode(1062);
                    } else if ($mysqli->errno == 0) {
//        echo "اطلاعات با موفقیت ارسال شد";
                        echo json_encode(1000);
                    }
                }
            }
        }
    }
}