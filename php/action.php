<?php
header('Content-Type: application/json');

require "./common.php";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");

$input = filter_input_array(INPUT_POST);

$design_user = mysqli_real_escape_string($connect, $input["design_user"]);
$conditions = mysqli_real_escape_string($connect, $input["conditions"]);
$queue = mysqli_real_escape_string($connect, $input["queue"]);

if ($input["action"] === 'edit') {
    $query = "
        UPDATE design
        SET design_user = '" . $design_user . "',
        conditions = '" . $conditions . "',
        queue = '" . $queue . "',
        WHERE id = '" . $input["id"] . "'
    ";
    mysqli_query($connect, $query);
}

if ($input["action"] === 'delete') {
    $query = "
        DELETE design
        WHERE id = '" . $input["id"] . "'
    ";
    mysqli_query($connect, $query);
}
echo json_encode($input);