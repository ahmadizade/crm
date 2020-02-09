<?php
$connect = mysqli_connect("localhost", "root", "", "payload");
if(isset($_POST["design_user"], $_POST["job_list"], $_POST["conditions"], $_POST["date_registration"], $_POST["queue"], $_POST["admin_desc"], $_POST["user_desc"]))
{
    $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
    $query = "INSERT INTO user(first_name, last_name) VALUES('$first_name', '$last_name')";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Inserted';
    }
}
?>
