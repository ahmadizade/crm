<?php
require_once './php/common.php';
require_once './php/config.php';
//++++++++++++++++++++++++++++++++++ connect to mysql +++++++++++++++++++++++++++++++++++++++
$message = "";
if (count ( $_POST ) > 0) {
    $conn = mysqli_connect ( "localhost", "root", "asdasd", "payload" );
    $result = mysqli_query ( $conn, "SELECT * FROM users WHERE username='" . $_POST["userName"] . "' and password = '" . $_POST["password"] . "'" );
//    print_r ($result);
    $count = mysqli_num_rows ( $result );
    if ($count == 0) {
        $message = "نام کاربری و یا رمز عبور نامعتبر است";
        $try = "لطفا مجددا تلاش کنید";
    } else {
//        $message = "You are successfully authenticated!";
        session_start ();
        // Store Session Data
        $_SESSION['login_user'] = mysqli_real_escape_string($conn, $_POST["userName"]);
        $login_user = $_SESSION['login_user'];
//ذخیره یوزر در سشن
        //print_r ($_SESSION['login_user']);
        $sql = "SELECT displayname FROM `users` WHERE username='$login_user';";
        $sql2 = "SELECT userid FROM `users` WHERE username='$login_user';";
        $result = $mysqli->query ( $sql );
        $result2 = $mysqli->query ( $sql2 );
        $display_name = $result->fetch_all ();
        $userid = $result2->fetch_all ();
//print_h ($display_name);
//print_h ($userid);
        $display_name = $display_name[0][0];
        $userid = $userid[0][0];
//        echo($display_name).'<br>';
//        echo($userid);
        $_SESSION['display_name'] = $display_name;                      //ساخت سشن برای اعلام یوزر به صفحه ها
        $_SESSION['userid'] = $userid;                      //ساخت سشن برای اعلام یوزر آی دی به صفحه ها
        $cookie_data = array($login_user, $display_name, $userid);

        if (isset( $_POST['rememberme'] )) {
            // Set cookie variables
            $days = 30;
//            $value = encryptCookie($userid);
            $value = $cookie_data;
            setcookie ( "rememberme", json_encode ( $value ), time () + ($days * 24 * 60 * 60 * 1000) );
        }
        header ( "Location: http://localhost/crm/index.php" );
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
    <link href="./bs/css/bootstrap.css" rel="stylesheet">
</head>
<body class="body-picture">
<!--<div class="row">-->
<!--    <div class="container">-->
<!--        <div class="col-md-12">-->
<!--            <div class="head-text text-center">-->
<!--                <p class="animated fadeIn delay-1s" id="text-1">آژانس هواپیمایی ستاره ونک</p>-->
<!--                <p class="animated fadeIn delay-2s" id="text-2">بسیار سفر باید کرد تا پخته شود خامی</p>-->
<!--                <p class="animated fadeIn delay-3s" id="text-3">هر جای ایران ، همه جای جهان</p>-->
<!--                <p class="animated fadeIn delay-4s" id="text-4">با آژانس هواپیمایی ستاره ونک</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div id="error-holder-container" class="text-center error-holder-container">
    <div id="message">
        <?php
        if ($message != "") {
            echo ("<div id='error-holder' class='animated zoomInUp delay-1s error-holder'>" . "</div>");
            echo ("<p id='error' class='animated fadeInDown delay-2s'>" . $message . "</p>");
            echo ("<p id='try' class='animated fadeInDown delay-3s'>" . $try . "</p>");
        }
        ?>
    </div>
</div>
<div class="form_platform">
    <div class="form-container">
        <div class="form-container-header">
            <p id="text1" class="animated fadeInDown delay-2s f-12">آژانس هواپیمایی ستاره ونک</p>
            <p id="text2" class="animated fadeInDown delay-3s f-12">سامانه مدیریت پایگاه داده</p>

        </div>

        <div class="form-container-main">
            <form class="form_plate" name="frmUser" method="post">
                <div class="group-column mt-5">
                    <input id="login-input" type="text" name="userName" placeholder="User Name" class="login-input">
                    <input id="login-password" type="password" name="password" placeholder="Password"
                           class="login-input">
                    <div class="group-row mb-2 ">
                        <label for="rememberme" class="mr-2 f-12 form-check-label text-white"> &nbsp;Remember Me  </label>
                        <input type="checkbox" name="rememberme" id="rememberme">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btnSubmit">
                </div>
            </form>
        </div>

        <!--        <div class="form-container-footer">-->
        <!--            <p id="text3" class="animated fadeInDown delay-4s f-12">هر جای ایران ، همه جای جهان</p>-->
        <!--        </div>-->
    </div>
</div>
</div>
</div>

<script src="./js/jquery-3.4.1.js"></script>
<script src="./js/jqueryapp.js"></script>
</body>
</html>