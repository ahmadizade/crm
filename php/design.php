<?php
require "../php/common.php";
session_start ();
if (isset( $_SESSION['login_user'] )) {
    $login_user = $_SESSION['login_user'];
    $userid = $_SESSION['userid'];
    $display_name = $_SESSION['display_name'];
//    echo("session login user is : " . $login_user);
}else if(isset($_COOKIE['rememberme'] )) {
    // Decrypt cookie variable value
    $cookie_data = json_decode($_COOKIE['rememberme'], true);
//    print_h($cookie_data);
    $login_user = $cookie_data[0];
    $display_name = $cookie_data[1];
    $userid = $cookie_data[2];
//    echo("cookie login user is : " . $login_user);
}else if ( !isset($_SESSION['login_user'])) {
    if (!isset($_COOKIE['rememberme'])) {
        $login_user = "";
        $display_name = "";
        $userid = "";
        header ( "Location: http://localhost/crm/login.php" );
    }
}
$admin_group = array("admin", "akbarpour");
?>
<!doctype html>
<html dir="rtl" lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--    <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="../bs/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/hover.css">
    <!--    <link rel="stylesheet" href="./aos-master/dist/aos.css">-->
    <!--    <link rel="stylesheet" href="./css/sequencejs.css">-->
    <link href="../fonts/stylesheet.css" rel="stylesheet">
    <link href="../css/fonts.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>


</head>
<body>
<?php
include "../includes/header.php";
include "../includes/sidebar.php";
?>
















<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jqueryapp.js"></script>
<script src="../js/app.js"></script>
<script src="../bs/js/bootstrap.js"></script>

<!--<script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<!--<script src="./js/jquery.lettering.js"></script>-->
<!--<script src="./js/sequence.js"></script>-->
<!--<script src="./js/sequencejs-options.sliding-horizontal-parallax.js"></script>-->
<!--<script src="./aos-master/dist/aos.css"</script>-->
</body>
</html>