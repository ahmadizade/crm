<?php
require_once './lib/func.php';
session_start ();
if ($_SESSION['login_user'] == '') {
    header ( "Location: http://localhost/crm/login.php" );
} else {
    $login_user = $_SESSION['login_user'];
}
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
</head>
<body>
<span class="fancy_background" id="fancy_back"></span>
<section class="header">
    <div class="row">
        <div class="col-md-12">
            <div class="site-header">
                <div class="mini-header">
                    <div class="container">
                        <div class="mini-header-center">
                            <div class="small-nav-phone">
                                <div class="user_display mt-1">
                                    <?php
                                    echo ('<a href="login.php">' . ucfirst ( $_SESSION['display_name'] ) . '</a>') . ' ' . "<i class='icon-user'></i>";
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

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WAVE-->


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WAVE-->
<section class="main">
    <div class="row">
        <div class="container">
            <div class="headline text-center mt-5 mb-5">
                <h5><b>سامانه مدیریت پایگاه داده آژانس هواپیمایی ستاره ونک</b></h5>
                <p>هر جای ایران ، همه جای جهان</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="data-table">
                    <form class="mt-2" id="form" name="form">
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
                        <span id="fancy_btn" onclick="window.location.reload();"></span>
                    </div>
                </div>
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

<script src="js/jquery-3.4.1.js"></script>
<script src="js/jqueryapp.js"></script>
<script src="./js/app.js"></script>
</body>
</html>