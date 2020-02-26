<?php
$connect = mysqli_connect("localhost", "root", "asdasd", "payload");

if(isset($_GET["id"]))
{
    $idget = $_GET["id"];
//    echo "ID Resid = " . $idget;
//    $query = "DELETE FROM user WHERE id = '".$_GET["id"]."'";
    $query = "DELETE FROM design WHERE id =$idget;";
    if(mysqli_query($connect, $query))
    {
        echo 'Data Deleted';
    }
}
?>
