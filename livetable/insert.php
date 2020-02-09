<?php
$connect = mysqli_connect("localhost", "root", "", "payload");
if(isset($_POST["design_user"], $_POST["job_list"], $_POST["conditions"], $_POST["date_registration"], $_POST["queue"], $_POST["admin_desc"], $_POST["user_desc"]))
{
//    $id = mysqli_real_escape_string($connect, $_POST["id"]);
    $id = mysqli_real_escape_string($connect, $_POST["id"]);
    $design_user = mysqli_real_escape_string($connect, $_POST["design_user"]);
    $job_list = mysqli_real_escape_string($connect, $_POST["job_list"]);
    $conditions = mysqli_real_escape_string($connect, $_POST["conditions"]);
    $date_registration = mysqli_real_escape_string($connect, $_POST["date_registration"]);
    $queue = mysqli_real_escape_string($connect, $_POST["queue"]);
    $admin_desc = mysqli_real_escape_string($connect, $_POST["admin_desc"]);
    $user_desc = mysqli_real_escape_string($connect, $_POST["user_desc"]);
    $query = "INSERT INTO user(design_user, job_list, conditions, date_registration, queue, admin_desc, user_desc) VALUES('$design_user', '$job_list', '$conditions', '$date_registration', '$queue', '$admin_desc', '$user_desc')";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Inserted';
    }
}
?>
