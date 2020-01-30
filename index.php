<?php
session_start ();
if (isset( $_SESSION['login_user'] )) {
    $login_user = $_SESSION['login_user'];
    $userid = $_SESSION['userid'];
} else {
    $login_user = "";
}
//if ($_SESSION['login_user'] == '') {
//    header ( "Location: http://localhost/crm/login.php" );
//} else {
//    $login_user = $_SESSION['login_user'];
//}
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
</head>
<body>
<section class="header">
    <div class="row">
        <div class="col-md-12">
            <div class="site-header">
                <div class="mini-header">
                    <div class="logout">
                        <?php
                        if (isset( $_SESSION['display_name'] )) {
//                        if (!$_SESSION['display_name'] == "") {
                            echo ('<a href="?&logout" class="hvr-buzz-out text-decoration-none">' . "LOGOUT" . '</a>');
                        }
                        if (isset( $_GET['logout'] )) {
                            session_destroy ();
                            unset( $_SESSION['login_user'] );
                            header ( 'location:login.php' );
                        }
                        ?>
                    </div>
                    <div class="container">
                        <div class="mini-header-center">
                            <div class="small-nav-mobile">
                                <div class="user_display mt-1">
                                    <?php
                                    if (!isset( $_SESSION['display_name'] )) {
//                                    if ($_SESSION['display_name'] == "") {
                                        echo ('<a href="login.php" class="hvr-bob">' . "LOGIN" . '</a>');
                                    } else {
                                        echo ('<a href="login.php">' . ($_SESSION['display_name']) . " / " . $userid . '</a>') . ' ' . "<i class='icon-user'></i>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <ul class="small-nav">
                                <li><a class="hvr-underline-from-center" id="mobile_company" href="#" title="همکاران">
                                        داخلی ها</a></li>
                                <li><a class="hvr-underline-from-center" href="#" title="اضافه کاری"> شیفت ها</a></li>
                                <li><a class="hvr-underline-from-center" href="#" title="تقویم میلادی"> تقویم</a></li>
                                <li><a class="hvr-underline-from-center" href="#" title="تماس با مدیریت"> مدیریت</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--                +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="mini-header-toggle" id="mini-header-toggle">
                </div>
                <div class="big-header">
                    <div class="setareh-icon">
                        <a href="#">
                            <img src="img/logo.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--<section class="side">-->
<!--    <div class="side-menu">-->
<!--        <div class="side-menu-header">-->
<!--            <a href="#" class="gold"><i class="icon-vanak-grid"></i></a>-->
<!--            <p>HOME</p>-->
<!--            <a href="#" class="gold"><i class="icon-search-flight"></i></a>-->
<!--            <p>search</p>-->
<!--            <a href="#" class="gold"><i class="icon-envelope"></i></a>-->
<!--            <p>Leter</p>-->
<!--            <a href="#" class="gold"><i class="icon-vanak-user"></i></a>-->
<!--            <p>User</p>-->
<!--            <a href="#" class="gold"><i class="icon-vanak-thunderbolt"></i></a>-->
<!--            <p>HOME</p>-->
<!--        </div>-->
<!--        <div class="side-menu-main">-->
<!--            <p class="btn w-100"><a class="txt-gold " href="http://localhost/crm/mysql.php?show">-->
<!--                    پایگاه داده</a></p>-->
<!--            <p class="btn w-100"><a href="http://localhost/crm/mysql.php?show">SHOW DATABASE</a></p>-->
<!--            <p class="btn w-100"><a href="http://localhost/crm/mysql.php?show">SHOW DATABASE</a></p>-->
<!--        </div>-->
<!--        <div class="side-menu-footer">-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

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

    <div class="search_platform">
        <form action="./php/search.php" method="GET">
            <input title="بر اساس نام خانوادگی" type="text" name="query" placeholder="Enter Family for search...">
            <input type="submit" value="Search"/>
        </form>
    </div>





</section>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jqueryapp.js"></script>
<script src="./js/app.js"></script>
<!--<script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<!--<script src="./js/jquery.lettering.js"></script>-->
<!--<script src="./js/sequence.js"></script>-->
<!--<script src="./js/sequencejs-options.sliding-horizontal-parallax.js"></script>-->
<!--<script src="./aos-master/dist/aos.css"</script>-->
</body>
</html>