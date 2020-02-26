<?php
require_once 'common.php';
//session_start ();
//if (isset( $_SESSION['display_name'] )) {
//    $login_user = $_SESSION['login_user'];
//    $userid = $_SESSION['userid'];
//    $Colleague = $userid;
////    echo ('Username = ' . $login_user) . '<br>';
////    echo ('Userid = ' . $userid) . '<br>';
////    echo ('Colleague = ' . $Colleague) . '<br>';
//}
session_start ();
if (isset( $_SESSION['login_user'] )) {
    $login_user = $_SESSION['login_user'];
    $userid = $_SESSION['userid'];
    $display_name = $_SESSION['display_name'];
//    echo("session login user is : " . $login_user);
    $Colleague = $userid;
} else if (isset( $_COOKIE['rememberme'] )) {
    // Decrypt cookie variable value
    $cookie_data = json_decode ( $_COOKIE['rememberme'], true );
//    print_h($cookie_data);
    $login_user = $cookie_data[0];
    $display_name = $cookie_data[1];
    $userid = $cookie_data[2];
    $Colleague = $userid;
//    echo("cookie login user is : " . $login_user);
} else if (!isset( $_SESSION['login_user'] )) {
    if (!isset( $_COOKIE['rememberme'] )) {
        $login_user = "";
        $display_name = "";
        $userid = "";
    }
}
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "asdasd";
$dbName = "payload";
$conn = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$conn) {
    die( 'Hamidreza,Could not Connect MySql:' . $mysqli->error );
} else {
//    echo "Successfull connect to database<br><br>";
}
$mysqli = new mysqli( $dbHost, $dbUser, $dbPass );
if (!$mysqli->select_db ( $dbName )) {
    echo "Hamidreza,probleme in selecting data base";
    exit( 0 );
}
if ($mysqli->connect_errno) {
    printf ( "Hamidreza,connect failed: %s/n", $mysqli->connect_error );
    exit();
}
$admin_group = array("admin", "akbarpour");
