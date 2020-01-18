<?php
require_once './php/common.php';
require_once './php/mysql.php';
require_once './lib/func.php';


//++++++++++++++++++++++++++++++++++ connect to mysql +++++++++++++++++++++++++++++++++++++++

//echo (@$login_user);
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");
if (!$conn) {
    die('Could not Connect My Sql:' . $mysqli->error);
} else {
    //echo "Successfull.<br><br>";
}
$mysqli = new mysqli($dbHost, $dbUser, $dbPass);
if (!$mysqli->select_db($dbName)) {
    echo "probleme in selecting data base";
    exit(0);
}
if ($mysqli->connect_errno) {
    printf("connect failed: %s/n", $mysqli->connect_error);
    exit();
}


//++++++++++++++++++++++++++++++++++ connect to mysql +++++++++++++++++++++++++++++++++++++++



$message = "";
if (count($_POST) > 0) {
    $conn = mysqli_connect("localhost", "root", "", "payload");
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='" . $_POST["userName"] . "' and password = '" . $_POST["password"] . "'");
    //print_r ($result);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $message = "نام کاربری و یا رمز عبور نامعتبر است";
        session_destroy();
    } else {
//        $message = "You are successfully authenticated!";
        session_start();
        // Store Session Data
        $_SESSION['login_user'] = $_POST["userName"];
        $login_user = $_SESSION['login_user'];
//ذخیره یوزر در سشن
        //print_r ($_SESSION['login_user']);
        $sql = "SELECT displayname FROM `users` WHERE username='$login_user';";
        $result = $mysqli->query($sql);
        $display_name = $result->fetch_all();
//print_h ($display_name);
        $display_name = $display_name[0][0];
//echo($display_name);
        $_SESSION['display_name'] = $display_name;                      //ساخت سشن برای اعلام یوزر به صفحه ها

        header("Location: http://localhost/crm/index.php");
    }
}



?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++HTML-->

<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" href="./css/style.css">
    <link href="fonts/stylesheet.css" rel="stylesheet">
    <link href="./css/fonts.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">

</head>
<body class="body-picture">

<div class="form_platform">
    <div class="form-container">
        <div class="form-container-header">
            <p class="animated flip delay-2s">آژانس هواپیمایی ستاره ونک</p>
            <div class="message">

                <?php
                if ($message != "") {
                    echo $message;
                }
                ?>

            </div>
        </div>

        <div class="form-container-main">
            <form class="form_plate" name="frmUser" method="post" action="">
                <div class="group-column">
                    <input type="text" name="userName" placeholder="User Name" class="login-input">
                    <input type="password" name="password" placeholder="Password" class="login-input">
                    <input type="checkbox" value="0" name="remember">Remember Me
                    <input type="submit" name="submit" value="Submit" class="btnSubmit">
                </div>
            </form>
        </div>

        <div class="form-container-footer">
            <p class="animated flip delay-2s">هر جای ایران ، همه جای جهان</p>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>