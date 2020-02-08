<?php
header('Content-Type: application/json');
require "../php/common.php";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");

$input = filter_input_array(INPUT_POST);

$design_user = mysqli_real_escape_string($connect, $input["design_user"]);
echo $design_user;
print_h ($design_user);
$conditions = mysqli_real_escape_string($connect, $input["conditions"]);
$queue = mysqli_real_escape_string($connect, $input["queue"]);

if ($input["action"] == 'edit') {
    $query = "
        UPDATE design
        SET design_user = '" . $design_user . "',
        conditions = '" . $conditions . "',
        queue = '" . $queue . "',
        WHERE design.id = '" . $input["id"] . "'
    ";
    mysqli_query($connect, $query);
}

if ($input["action"] == 'delete') {
    $query = "
        DELETE design
        WHERE id = '" . $input["id"] . "'
    ";
    mysqli_query($connect, $query);
}
echo json_encode($input);



http://localhost/crm/jquery-tabledit-1.2.3/example.php?&id=7&conditions=2&queue=3&admin_desc=hamidreza&action=edit


//if ($input['action'] == 'edit') {
//    $mysqli->query("UPDATE users SET username='" . $input['username'] . "', email='" . $input['email'] . "', avatar='" . $input['avatar'] . "' WHERE id='" . $input['id'] . "'");
//} else if ($input['action'] == 'delete') {
//    $mysqli->query("UPDATE users SET deleted=1 WHERE id='" . $input['id'] . "'");
//} else if ($input['action'] == 'restore') {
//    $mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
//}
//
//mysqli_close($mysqli);
//
//echo json_encode($input);
