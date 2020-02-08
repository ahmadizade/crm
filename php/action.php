<?php
header('Content-Type: application/json');

//require "./common.php";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");

$input = filter_input_array(INPUT_POST);

$design_user = mysqli_real_escape_string($connect, $input["design_user"]);
$conditions = mysqli_real_escape_string($connect, $input["conditions"]);
$queue = mysqli_real_escape_string($connect, $input["queue"]);

if ($input['action'] == 'edit') {
    $mysqli->query("UPDATE design SET conditions='" . $input['conditions'] . "', queue='" . $input['queue'] . "', admin_desc='" . $input['admin_desc'] . "' WHERE id='" . $input['id'] . "'");
} else if ($input['action'] == 'delete') {
    $mysqli->query("DELETE FROM design WHERE id='" . $input['id'] . "'");
}
mysqli_close($mysqli);

echo json_encode($input);
