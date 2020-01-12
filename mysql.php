<?php
require_once 'common.php';

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "setareh";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");
if (!$conn) {
    die('Could not Connect My Sql:' . $mysqli->error);
} else {
//    echo "Successfull.<br><br>";
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
    $sql = "SELECT  * FROM ahmadi;";
    $result = $mysqli->query($sql);
//    echo('Number Of Data = ' . $result->num_rows);
    print_h($result->fetch_all());
}
if (isset($_GET['count'])) {
    $sql = "SELECT  * FROM ahmadi;";
    $result = $mysqli->query($sql);
    rowcount($result);
}
if (isset($_GET['save'])) {
    $user_name = $_GET['user_name'];
    echo 'first name :' . $user_name . '<br>';
    $family = $_GET['family'];
    echo 'Last name :' . $family . '<br>';
    $email = $_GET['email'];
    echo 'Email :' . $email . '<br>';
    $phone = $_GET['phone'];
    echo 'phone number :' . $phone . '<br>';
    $rate = $_GET['rate'];
    echo 'User-Rate :' . $rate . '<br>';
    $date_thr = $_GET['date'];
    echo 'Date :' . $date_thr . '<br>';
    if (!$mysqli->query("INSERT INTO ahmadi (user_name,family,email,phone,date_thr,rate) VALUES ('$user_name','$family','$email','$phone','$date_thr','$rate')")) {
        if ($mysqli->errno == 1062)
            echo("  ایمیل وارد شده تکراری میباشد  <br>" . "Error Number = " . $mysqli->errno);
    } else if ($mysqli->errno == 0) {
        echo "اطلاعات با موفقیت ارسال شد";
    }


}

