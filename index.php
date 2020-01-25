<?php
session_start ();
if (isset( $_SESSION['login_user'] )) {
    $login_user = $_SESSION['login_user'];
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
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="fonts/stylesheet.css" rel="stylesheet">
    <link href="./css/fonts.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
</head>
<body>
<span class="fancy_background" id="fancy_back"></span>
<section class="header">
    <div class="row">
        <div class="col-md-12">
            <div class="site-header">
                <div class="mini-header">
                    <div class="logout">
                        <?php
                        if (isset( $_SESSION['display_name'] )) {
//                        if (!$_SESSION['display_name'] == "") {
                            echo ('<a href="?&logout">' . "LOGOUT" . '</a>');
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
                            <div class="small-nav-phone">
                                <div class="user_display mt-1">
                                    <?php
                                    if (!isset( $_SESSION['display_name'] )) {
//                                    if ($_SESSION['display_name'] == "") {
                                        echo ('<a href="login.php">' . "LOGIN" . '</a>');
                                    } else {
                                        echo ('<a href="login.php">' . ucfirst ( $_SESSION['display_name'] ) . '</a>') . ' ' . "<i class='icon-user'></i>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <ul class="small-nav">
                                <li><a id="phone_company" href="#" title="همکاران"> داخلی ها</a></li>
                                <li><a href="#" title="اضافه کاری"> شیفت ها</a></li>
                                <li><a href="#" title="تقویم میلادی"> تقویم</a></li>
                                <li><a href="#" title="تماس با مدیریت"> مدیریت</a></li>
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


<section class="side">
    <div class="side-menu">
        <div class="side-menu-header">
            <a href="#" class="gold"><i class="icon-vanak-grid"></i></a>
            <p>HOME</p>
            <a href="#" class="gold"><i class="icon-search-flight"></i></a>
            <p>search</p>
            <a href="#" class="gold"><i class="icon-envelope"></i></a>
            <p>Leter</p>
            <a href="#" class="gold"><i class="icon-vanak-user"></i></a>
            <p>User</p>
            <a href="#" class="gold"><i class="icon-vanak-thunderbolt"></i></a>
            <p>HOME</p>
        </div>
        <div class="side-menu-main">
            <p class="btn w-100"><a class="txt-gold " href="http://localhost/crm/mysql.php?show">
                    پایگاه داده</a></p>
            <p class="btn w-100"><a href="http://localhost/crm/mysql.php?show">SHOW DATABASE</a></p>
            <p class="btn w-100"><a href="http://localhost/crm/mysql.php?show">SHOW DATABASE</a></p>
        </div>
        <div class="side-menu-footer">

        </div>
    </div>
</section>

<section class="main">


    <div class="wave2">

    </div>

    <div class="row">


        <div class="container">
            <div class="headline text-center mt-5 mb-5">
                <h5><b class="animated fadeInDown delay-2s">سامانه مدیریت پایگاه داده آژانس هواپیمایی ستاره ونک</b></h5>
                <p>هر جای ایران ، همه جای جهان</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="data-table">
                    <form class="mt-2" id="form" name="form" action="">
                        <div class="row p15 form-group mb-1">
                            <div class="group-row">
                                <input id="rate0" class="check-object" type="radio" title="کاربر طلایی" name="rate"
                                       value="gold">
                                <label class="form-check-label font-weight-bold f12 mr-2">طلایی</label>
                            </div>
                            <div class="group-row">
                                <input id="rate1" class="check-object" type="radio" title="کاربر نقره ای" name="rate"
                                       value="silver">
                                <label class="form-check-label font-weight-bold f12 mr-2">نقره ای</label>
                            </div>
                            <div class="group-row">
                                <input id="rate2" class="check-object" type="radio" title="کاربر برنزی" name="rate"
                                       value="bronze">
                                <label class="form-check-label font-weight-bold f12 mr-2">برنز</label>
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
                                <label class="font-weight-bold" for="phone">شماره تماس</label>
                                <input class="input" title="شماره تماس" type="text" name="phone" id="phone"
                                       placeholder="phone number">
                            </div>
                            <!--                            <div class="group">-->
                            <!--                                <label class="font-weight-bold" for="date">تاریخ</label>-->
                            <!--                                <input class="input" title="میلادی" name="date" type="date">-->
                            <!--                            </div>-->
                            <div class="group">
                                <button class="data-table-button" id="submit" type="button" value="Submit">ذخیره سازی
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wave">
    <div class="wave position-relative">
        <!--    &lt;!&ndash;&lt;!&ndash;+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WAVE WAVE WAVE WAVE WAVE WAVE+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++&ndash;&gt;&ndash;&gt;-->
        <!--left wave-decoration start -->

<!--        <div class="wave-decoration is-bottom is-white-light">-->
<!--            <!-- wave start -->-->
<!--            <svg width="100%" height="128" version="1.1" xmlns="http://www.w3.org/2000/svg"-->
<!--                 xmlns:xlink="http://www.w3.org/1999/xlink" x="2000" y="128" viewBox="0 0 2000 128"-->
<!--                 enable-background="new 0 0 2000 128" xml:space="preserve">-->
<!--                                  <path opacity="0.2" fill="#f7f7f7"-->
<!--                                        d="M1999.5,22.2c-346-0.6-524.6-4.7-878.8,4.4c-286.6,7.4-442.3,54-608.1,51.2C307.3,74.3,202.5,5-0.5,28.1v100.4l2000-0.5V22.2z"></path>-->
<!--                <path opacity="0.2" fill="#f7f7f7"-->
<!--                      d="M-0.3,46.1C251,15.3,440.9,84.7,499.6,98.4c54.7,12.8,122.5,12,186.7-5.3c154.2-41.6,315.5-70.9,475.2-67.5s324.6,22.4,484.3,19.7c133-2.3,302.8,1.7,352.8,3.7c0,21.3,0,80,0,80H-0.5L-0.3,46.1z"></path>-->
<!--                <path opacity="0.4" fill="#f7f7f7"-->
<!--                      d="M2000,41.2c-139.8-12.7-219.9-10.8-360.2-11.2c-285.5-0.8-487.5,18-736.2,51.1C647,115.4,546.7,116.4,199.2,53.6C140.3,43,59.5,45.6-0.5,52.3V130h2000L2000,41.2z"></path>-->
<!--                <path fill="#f7f7f7"-->
<!--                      d="M1634.6,50.1c-193.8,11.9-366.9,24.9-569,50c-110.2,13.7-221.2,21.5-332.3,19.6c-187-3.3-344.5-29.7-560.9-69.8c-122.2-22.6-172.8-4-172.8-4V130h1998V46C1997.5,46,1831,38.1,1634.6,50.1z"></path>-->
<!--                              </svg>-->
<!--            <!-- wave end -->-->
<!--        </div>-->

        <!--left wave-decoration end -->
        <!-- right wave-decoration start -->

        <!-- right wave-decoration end -->


        <!--    &lt;!&ndash;    &lt;!&ndash;+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WAVE WAVE WAVE WAVE WAVE WAVE+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++&ndash;&gt;&ndash;&gt;-->
    </div>
    </div>
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
        </div>
    </div>
</section>
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WEATHER-->
<div class="weather">
    <select id="citySelect">
        <option value="Select">Select</option>
        <option value="tehran,ir">Tehran</option>
        <option value="5391959">San Francisco</option>
        <option value="London,uk">London</option>
        <option value="1275339">Mumbai</option>
        <option value="8199396">Santa Lucia</option>
    </select>
    <button id="submit2">Submit</button>
    <div id="message"></div>

    <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WEATHER-->










</section>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jqueryapp.js"></script>
<script src="./js/app.js"></script>
</body>
</html>