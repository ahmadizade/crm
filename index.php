<?php
require "./php/common.php";
session_start ();
if (isset( $_SESSION['login_user'] )) {
    $login_user = $_SESSION['login_user'];
    $userid = $_SESSION['userid'];
    $display_name = $_SESSION['display_name'];
//    echo("session login user is : " . $login_user);
} else if (isset( $_COOKIE['rememberme'] )) {
    // Decrypt cookie variable value
    $cookie_data = json_decode ( $_COOKIE['rememberme'], true );
//    print_h($cookie_data);
    $login_user = $cookie_data[0];
    $display_name = $cookie_data[1];
    $userid = $cookie_data[2];
//    echo("cookie login user is : " . $login_user);
} else if (!isset( $_SESSION['login_user'] )) {
    if (!isset( $_COOKIE['rememberme'] )) {
        $login_user = "";
        $display_name = "";
        $userid = "";
        header ( "Location: http://localhost/crm/login.php" );
    }
}
$admin_group = array("admin", "akbarpour");

//++++++++++++++++++++++++++++++++++++++++++++++++salem bedune coockie
//session_start ();
//if (isset( $_SESSION['login_user'] )) {
//    $login_user = $_SESSION['login_user'];
//    $userid = $_SESSION['userid'];
//} else {
//    $login_user = "";
//}
//if ($_SESSION['login_user'] == '') {
//    header ( "Location: http://10.0.23.95/crm/login.php" );
//} else {
//    $login_user = $_SESSION['login_user'];
//}
//++++++++++++++++++++++++++++++++++++++++++++++++salem bedune coockie
//$admin_group = array("admin", "akbarpour");
//$keys = in_array("$login_user",$admin_group);
//print_h ('<p>' . $keys. '</p>');
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
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/hover.css">
    <!--    <link rel="stylesheet" href="./aos-master/dist/aos.css">-->
    <!--    <link rel="stylesheet" href="./css/sequencejs.css">-->
    <link href="fonts/stylesheet.css" rel="stylesheet">
    <link href="./css/fonts.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<?php
include "./includes/header.php";
?>


<section class="main">
    <div class="head">
        <!--            <div class="our-services">-->
        <!--                <p class="animated zoomInRight delay-6s">Iran accommodation</p>-->
        <!--                <p class="animated zoomInRight delay-7s">Transfer Services</p>-->
        <!--                <p class="animated zoomInRight delay-8s">tailor-made tour</p>-->
        <!--                <p class="animated zoomInRight delay-9s">Visa</p>-->
        <!--            </div>-->
        <div class="headline text-center mb-5">
            <h5><b class="animated fadeInDown delay-4s">سامانه مدیریت پایگاه داده آژانس هواپیمایی ستاره ونک</b></h5>
            <p class="animated fadeInDown delay-5s">هر جای ایران ، همه جای جهان</p>
            <div class="animated fadeInDown delay-6s setareh-icon">
                <a href="#">
                    <img src="img/logo.png">
                </a>
            </div>
            <p class="animated fadeInDown delay-7s">88880000</p>

            <!--                <div id="sequence" class="animate-in">-->
            <!--                    <div id="demo" class="info letter-container">-->
            <!--                        <h2 class="animated fadeInUp">SepandParvaz Application</h2>-->
            <!--                    </div>-->
            <!--                </div>-->
        </div>
    </div>

    <div class="information_table">
        <!--        <div class="container">-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-12 d-flex align-items-center justify-content-center">-->
        <div class="data-table">
            <form class="mt-2" id="form" name="form" action="">
                <div class="row p15 form-group mb-1">
                    <div class="group-row">
                        <input id="rate0" class="check-object" type="radio" title="کاربر طلایی" name="rate"
                               value="1">
                        <label for="rate0" class="form-check-label font-weight-bold gold mr-2">طلایی</label>
                    </div>
                    <div class="group-row">
                        <input id="rate1" class="check-object" type="radio" title="کاربر نقره ای"
                               name="rate"
                               value="2">
                        <label for="rate1" class="form-check-label font-weight-bold silver mr-2">نقره ای</label>
                    </div>
                    <div class="group-row">
                        <input id="rate2" class="check-object" type="radio" title="کاربر برنزی" name="rate"
                               value="3">
                        <label for="rate2" class="form-check-label font-weight-bold bronze mr-2">برنز</label>
                    </div>
                </div>
                <div class="row p15 form-group">
                    <div class="group">
                        <label class="font-weight-bold" for="user_name">نام</label>
                        <input class="input" title="نام" type="text" name="user_name" id="user_name"
                               placeholder="enter your name">
                    </div>
                    <div class="group">
                        <label class="font-weight-bold" for="family">نام خانوادگی</label>
                        <input class="input" title="نام خانوادگی" type="text" name="family" id="family"
                               placeholder="enter your family">
                    </div>
                    <div class="group">
                        <label class="font-weight-bold" for="email">رایانامه</label>
                        <input class="input" title="رایانامه" type="email" name="email" id="email"
                               placeholder="enter your email">
                    </div>
                </div>
                <div class="row p15 form-group d-flex align-items-center">
                    <div class="group">
                        <label class="font-weight-bold" for="mobile">شماره تماس</label>
                        <input class="input" title="شماره تماس" type="text" name="mobile" id="mobile"
                               placeholder="mobile number">
                    </div>
                    <!--                            <div class="group">-->
                    <!--                                <label class="font-weight-bold" for="date">تاریخ</label>-->
                    <!--                                <input class="input" title="میلادی" name="date" type="date">-->
                    <!--                            </div>-->
                    <div class="group">
                        <button class="data-table-button hvr-float-shadow" id="submit" type="button" value="Submit">
                            ذخیره
                            سازی
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <div class="container">
        <div class="row">
            <div class="fancybox_platform" id="fancybox">
                <div class="fancybox">
                    <div class="fancybox_header text-center">
                        <img src="img/logo.png">
                    </div>
                    <div class="fancybox_main text-center mt-4">
                        <p id="fancy_result"/p>
                    </div>
                    <div class="fancybox_footer text-center mt-4">
                        <span id="fancy_btn"></span>
                        <!--                        <span id="fancy_btn" onclick="window.location.reload();"></span>-->
                    </div>
                </div>
            </div>
            <span class="fancy_background" id="fancy_back"></span>
        </div>
    </div>
</section>
<!--<div class="null"></div>-->
<!--<div class="null"></div>-->
<!--<div class="null"></div>-->
<section class="trust">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="content-box">
                    <div>
                        <div class="myrate">

                            <b>تعداد ثبت های من</b>
                            <p>
                                <small>دیروز</small>
                            </p>
                            <p id="deput"></p>
                        </div>
                    </div>
                    <div>
                        <div class="myrate">
                            <b>تعداد ثبت های من</b>
                            <p>
                                <small>امروز</small>
                            </p>
                            <p id="emput"></p>
                        </div>
                    </div>
                    <div>
                        <div class="myrate">
                            <b>تعداد ثبت های من</b>
                            <p>
                                <small>در سال</small>
                            </p>
                            <p id="output"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cat" class="cat">
    <div class="cat-flex">
        <div class="accordion1">


            <div class="accordion_header1">
                <p>Accounting Server A</p>
            </div>
            <div class="accordion_footer1 show">
                <p>Accounting Server : OK</p>
                <p>Transmited : 83,Mbps</p>
                <p>Ping : 8Ms</p>
            </div>

            <div class="accordion_header1">
                <p>Accounting Server B</p>
            </div>
            <div class="accordion_footer1">
                <p>Accounting Server : OK</p>
                <p>Transmited : 69,Mbps</p>
                <p>Ping : 8Ms</p>
            </div>

            <div class="accordion_header1">
                <p>Accounting Server Airarabia</p>
            </div>
            <div class="accordion_footer1">
                <p>Accounting Server : OK</p>
                <p>Transmited : 75,Mbps</p>
                <p>Ping : 4Ms</p>
            </div>


        </div>
        <div class="center_platform">
            <form method="GET" class="mt-2" id="design_form" name="design_form" action="">
                <div class="data-table mb-3">
                    <form class="mt-2" id="form" name="form" action="">
                        <div class="row p15 form-group mb-1">
                            <div class="group">
                                <input id="design_user" name="design_user" type="hidden" value="$login_user">
                                <label class="font-weight-bold" for="job_list">Job Name</label>
                                <input class="input" title="Job_List" type="text" name="job_list" id="job_list"
                                       placeholder="For Example : Catalog">
                            </div>
                            <button class="design-table-button hvr-float-shadow" id="design_submit" type="button"
                                    value="Submit">
                                ارسال درخواست
                            </button>
                        </div>
                        <div class="row p15 form-group mb-1">
                            <div class="group">
                                <label class="font-weight-bold" for="user_desc">توضیحات</label>
                                <textarea placeholder="برای مثال سایز عکس 1024 * 800" maxlength="256" wrap="hard" rows="4" cols="50" id="user_desc" name="user_desc" form="design_form">
                            </textarea>
                            </div>
                        </div>
                        <p class="text-center text-white mt-1">فرم درخواست طراحی</p>
                </div>
            </form>
            <form>
                <div class="search_platform mb-5">
                    <div class="form-group mt-2 text-center">
                        <form action="./php/search.php" method="GET">
                            <p>جستجو بر اساس نام و نام خانوادگی</p>
                            <input class="form-control" title="بر اساس نام خانوادگی" type="text" name="query"
                                   placeholder="Enter Family for search">
                            <button class="btn btn-warning mt-2" type="submit" value="Search">Search</button>
                    </div>
            </form>
        </div>
    </div>
    <div class="accordion2">
        <div class="accordion_header2">
            <p>درخواست طراحی</p>
        </div>
        <div class="accordion_footer2 show">
            <p>Arman Server : OK</p>
            <p>Transmited : 99,Mbps</p>
            <p>Ping : 2Ms</p>
        </div>

        <div class="accordion_header2">
            <p>Artiman/Itour</p>
        </div>
        <div class="accordion_footer2">
            <p>Artiman Server : OK</p>
            <p>Transmited : 49,Mbps</p>
            <p>Ping : 12Ms</p>
        </div>

        <div class="accordion_header2">
            <p>Virtualization VMWare</p>
        </div>
        <div class="accordion_footer2">
            <p>VMWare Server : OK</p>
            <p>Transmited : 29,Mbps</p>
            <p>Ping : 2Ms</p>
        </div>
    </div>
    </div>
    </div>
</section>


<script src="js/jquery-3.4.1.js"></script>
<script src="js/jqueryapp.js"></script>
<script src="./js/app.js"></script>
<script src="./bs/js/bootstrap.js"></script>

<!--<script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<!--<script src="./js/jquery.lettering.js"></script>-->
<!--<script src="./js/sequence.js"></script>-->
<!--<script src="./js/sequencejs-options.sliding-horizontal-parallax.js"></script>-->
<!--<script src="./aos-master/dist/aos.css"</script>-->
</body>
</html>