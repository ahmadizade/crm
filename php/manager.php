<!doctype html>
<html dir="rtl" lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../bs/css/bootstrap.css">
    <link rel="stylesheet" href="../css/search.css">
    <link href="../fonts/stylesheet.css" rel="stylesheet">
    <link href="../css/fonts.css" rel="stylesheet">
</head>
<body>
<section class="answer">
    <div class="table_container" style="overflow:auto;">
        <div class="container">
            <div class="row">
                <?php
                require_once 'common.php';
                require 'mysql.php';
                if (isset( $_GET['manager_count'] )) {
                    $sql_1 = "SELECT * FROM `users`;";
                    $result_1 = $mysqli->query ( $sql_1 );
                    $res_row = array(mysqli_num_rows ( $result_1 ));    //نمایش تعداد یوزرها در دیتابیس
                    $res = array(mysqli_fetch_all ( $result_1 ));
//                    print_h ( "تعداد یوزرها در جدول یوزر: " . $res_row[0] );
                    $count_row = $res_row[0];
                    $sql_2 = "SELECT `Colleague` FROM `customers_log`;";
                    $result_2 = $mysqli->query ( $sql_2 );
                    $res2 = array(mysqli_fetch_all ( $result_2 ));
                    $res2_row = array(mysqli_num_rows ( $result_2 ));   //نمایش تعداد ردیف های ثبت شده درون دیتابیس
//                    print_h ( "تعداد ثبت شده ها در جدول کاستومرز : " . $res2_row[0] );
                    $count_row2 = $res2_row[0];
                    echo '<table class="table table_answer table-bordered table-hover table-condensed text-center">';
                    echo '<thead style="background-color: #1d2124;">';
                    echo '<tr>';
                    echo '<th scope="col">' . "UserName" . '</th>';
                    echo '<th scope="col">' . "ADD_COUNT" . '</th>';
                    echo '</tr>';
//                    echo '<tfoot>';
//                    echo '<th>';
//                    print_h ( "تعداد مشتریان ثبت شده : " . $res2_row[0] );
//                    echo '</th>';
//                    echo '<th>';
//                    print_h ( "تعداد همکاران: " . $res_row[0] );
//                    echo '</th>';
//                    echo '</tfoot>';
                    echo '</thead>';
                    echo '<tbody>';
                    $user_add_count = 0;
                    for ($i = 0; $i < $count_row; $i++) {
                        echo '<tr>';
                        echo "<td>" . ucfirst ( $res[0][$i][3] ) . "</td>";
//        print_h ( $res[0][$i][0] . ") " . $res[0][$i][3] ); //نمایش یوزر آی دی و نام تمام یوزرها
                        for ($j = 0; $j < $count_row2; $j++) {
//            print_h ($res2[0][$j][0]); //نمایش یوزر آی دی و نام تمام یوزره
                            if ($res[0][$i][0] == $res2[0][$j][0]) {
                                $user_add_count += 1;
                            }
                        }
//                        print_h ($res[0][$i][3] . " = " . $user_add_count );
                        echo "<td>" . ucfirst ( $user_add_count ) . "</td>";
                        echo '</tr>';
                        $user_add_count = 0;
                    }
                    echo '</tbody>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="result_header">
        <div class="result_header_box_1">
            <p>
                <?php
                echo ( "تعداد همکاران ثبت شده : " . $res_row[0] );
                ?>
            </p>
        </div>
        <div class="result_header_box_1">
            <p>
                <?php
                echo ( "تعداد مشتریان ثبت شده : " . $res2_row[0] );
                ?>
            </p>
        </div>
</section>
</body>
</html>