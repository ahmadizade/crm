<?php
require "../php/common.php";
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
                    <?php
                    $sql = "SELECT * FROM `design` WHERE DATE (date_registration)=CURDATE();";
                    $respon = $mysqli->query($sql);
                    $res = mysqli_fetch_array($respon);         // response to array
                    //print_h($res);
                    $number = mysqli_num_rows($respon);                 //number of Results
                    //echo($number);
                    if (mysqli_num_rows($respon) == 0) {
                        echo "موردی یافت نشد";
                    } else {
                        echo '<table class="table table-bordered table-hover design_table">';
                        echo '<thead style="background-color: #1d2124;">';
                        echo '<tr>';
                        echo '<th scope="col">' . "کاربر" . '</th>';
                        echo '<th scope="col">' . "Job_List" . '</th>';
                        echo '<th scope="col">' . "وضعیت" . '</th>';
                        echo '<th scope="col">' . "تاریخ ثبت" . '</th>';
                        echo '<th scope="col">' . "نوع درخواست" . '</th>';
                        echo '<th scope="col">' . "توضیحات من" . '</th>';
                        echo '<th scope="col">' . "توضیحات کاربر" . '</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while ($result = mysqli_fetch_array($respon)) {
                            //        print_h($result);
                            // $result = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                            echo '<tr>';
                            echo "<td>" . ucfirst($result['design_user']) . "</td>";
                            echo "<td>" . ucfirst($result['job_list']) . "</td>";
                            if ($result['conditions'] == 1) {
                                $conditions = "انجام شد";
                            } else if ($result['conditions'] == 2) {
                                $conditions = "در حال انجام";
                            } else if ($result['conditions'] == 3) {
                                $conditions = "ویرایش";
                            } else if ($result['conditions'] == 4) {
                                $conditions = "لغو درخواست";
                            } else {
                                $conditions = "در حال بررسی";
                            }
                            echo "<td>" . $conditions . "</td>";
                            echo "<td>" . ucfirst($result['date_registration']) . "</td>";

                            if ($result['queue'] == 1) {
                                $queue = "ستاره دار";
                            } else if ($result['queue'] == 2) {
                                $queue = "عادی";
                            } else {
                                $queue = "فعلا هیچ کاری انجام نمی شود";
                            }
                            echo "<td>" . $queue . "</td>";
                            echo "<td>" . ucfirst($result['admin_desc']) . "</td>";
                            echo "<td>" . ucfirst($result['user_desc']) . "</td>";

                            // posts results gotten from database(title and text) you can also show id ($result['id'])
                            echo '</tr>';
                            echo '</tbody>';
                        }
                        echo '</table>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jqueryapp.js"></script>
<script src="../js/app.js"></script>
<script src="../bs/js/bootstrap.js"></script>
</body>
</html>