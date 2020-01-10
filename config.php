<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "setareh";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");
if (!$conn) {
    die('Could not Connect My Sql:' . $mysqli -> error);
}

?>

