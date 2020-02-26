<?php
//fetch.php
require "../php/common.php";
//$connect = mysqli_connect("localhost", "root", "", "payload");
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "asdasd";
$dbName = "payload";
$connect = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$connect) {
    die( 'Could not Connect My Sql:' . $mysqli->error );
} else {
//    echo "Successfull connect to database<br><br>";
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

$columns = array('design_user', 'job_list', 'conditions', 'date_registration', 'queue', 'admin_desc', 'user_desc');

$query = "SELECT * FROM design ";

if(isset($_POST["search"]["value"]))
{
    $query .= '
 WHERE design_user LIKE "%'.$_POST["search"]["value"].'%" 
 OR job_list LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))       //  ریزالت را آرایه کرده و به row میریزد و مثل آرایه ها به اجزای آن دسترسی خواهیم داشت.
{
    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="design_user">' . $row["design_user"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="job_list">' . $row["job_list"] . '</div>';
    if ($row["conditions"] == 1){
        $row["conditions"] = "اتمام کار";
    }elseif ($row["conditions"] == 2){
        $row["conditions"] = "تایید نشد";
    }elseif ($row["conditions"] == 3){
        $row["conditions"] = "در حال ویرایش";
    }else {
        $row["conditions"] = "وضعیتی ثبت نشده";
    }
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="conditions">' . $row["conditions"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="date_registration">' . $row["date_registration"] . '</div>';
    if (!$row["queue"] == "") {
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="queue">' . "شما نفر " .$row["queue"]. " از صف انتظار می باشید" . '</div>';
    }else {
        $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="queue">' ."هنوز در صف قرار نگرفته اید" . '</div>';
    }
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="admin_desc">' . $row["admin_desc"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="user_desc">' . $row["user_desc"] . '</div>';
    $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM design";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);

?>
