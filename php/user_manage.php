<?php
require_once './common.php';
require_once './mysql.php';
$login_user = $_SESSION['login_user'];
echo (@$login_user);
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$conn = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$conn) {
    die( 'Could not Connect My Sql:' . $mysqli->error );
} else {
    echo "Successfull.<br><br>";
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

$sql = "SELECT displayname FROM `users` WHERE username='$login_user';";
$result = $mysqli->query ( $sql );
$display_name = $result->fetch_all();
print_h ($display_name);
$display_name =$display_name[0][0];
echo($display_name);
$_SESSION['display_name'] = $display_name;