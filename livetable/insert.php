<?php
$connect = mysqli_connect("localhost", "root", "asdasd", "payload");

//if(isset($_GET["design_user"], $_GET["job_list"], $_GET["conditions"], $_GET["date_registration"], $_GET["queue"], $_GET["admin_desc"], $_GET["user_desc"]))
if (isset( $_GET['design'] ))
{
//echo "Request Recived";       // چک می کند که آیا دیتا رسیده به این صفحه یا خیر

//    var design_dataString = '&job_list=' + job_list + '&user_desc=' + user_desc + '&design_user=' + design_user + "&design=";


    $design_user = mysqli_real_escape_string($connect, $_GET["design_user"]);
    $job_list = mysqli_real_escape_string($connect, $_GET["job_list"]);
    $conditions = mysqli_real_escape_string($connect, $_GET["conditions"]);
    $queue = mysqli_real_escape_string($connect, $_GET["queue"]);
    $admin_desc = mysqli_real_escape_string($connect, $_GET["admin_desc"]);
    $user_desc = mysqli_real_escape_string($connect, $_GET["user_desc"]);
    $query = "INSERT INTO design(design_user, job_list, conditions, queue, admin_desc, user_desc) VALUES ('$design_user', '$job_list', '$conditions', '$queue', '$admin_desc', '$user_desc');";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Inserted';
    }
}
?>
