<?php
require_once './common.php';
require_once './mysql.php';
$message = "";
if (count ( $_POST ) > 0) {
    $conn = mysqli_connect ( "localhost", "root", "", "payload" );
    $result = mysqli_query ( $conn, "SELECT * FROM users WHERE username='" . $_POST["userName"] . "' and password = '" . $_POST["password"] . "'" );
    //print_r ($result);
    $count = mysqli_num_rows ( $result );
    if ($count == 0) {
        $message = "Invalid Username or Password!";
    } else {
        $message = "You are successfully authenticated!";
        session_start ();
        // Store Session Data
        $_SESSION['login_user'] = $_POST["userName"];           //ذخیره یوزر در سشن
        //print_r ($_SESSION['login_user']);
        header ( "Location: http://localhost/crm/index.php" );
    }
}
//++++++++++++++++++++++++++++++++++ DISPLAY NAME +++++++++++++++++++++++++++++++++++++++

$login_user = $_SESSION['login_user'];
//echo (@$login_user);
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$conn = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$conn) {
    die( 'Could not Connect My Sql:' . $mysqli->error );
} else {
    //echo "Successfull.<br><br>";
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
//print_h ($display_name);
$display_name =$display_name[0][0];
//echo($display_name);
$_SESSION['display_name'] = $display_name;
?>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<form name="frmUser" method="post" action="">
    <div class="message"><?php if ($message != "") {
            echo $message;
        } ?></div>
    <table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
        <tr class="tableheader">
            <td align="center" colspan="2">Enter Login Details</td>
        </tr>
        <tr class="tablerow">
            <td>
                <input type="text" name="userName" placeholder="User Name" class="login-input"></td>
        </tr>
        <tr class="tablerow">
            <td>
                <input type="password" name="password" placeholder="Password" class="login-input"></td>
        </tr>
        <tr class="tableheader">
            <td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
        </tr>
    </table>
</form>
</body>
</html>