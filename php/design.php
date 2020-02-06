<?php
require "../php/common.php";
session_start ();
require "./config.php";
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
<section class="section-top">
    <div class="to_do_table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover design_table">
                        <thead>
                        <th>USER</th>
                        <th>لیست تمام کارها</th>
                        <th>وضعیت</th>
                        <th>روزهای هفته</th>
                        <th>وضعیت صف</th>
                        <th>توضیحات</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


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