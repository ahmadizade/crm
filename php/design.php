<?php
require "../php/common.php";
require "../php/config.php";
?>
<!doctype html>
<html dir="rtl" lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Design&Graphic</title>
    <link rel="stylesheet" href="../bs/css/bootstrap.css">
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/style.css">
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">-->
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../bs/js/bootstrap.js"></script>
    <script src="../jquery-tabledit-1.2.3/jquery.tabledit.js"></script>
</head>
<body>
<?php
//include "../includes/header.php";
//include "../includes/sidebar.php";
//?>
<section class="section-top">
    <div class="to_do_table">
        <div class="container">
            <div class="row">
                <div class="table-responsive" style="font-family: font-family: arial sans-serif !important;">
                    <?php
//                    $sql = "SELECT * FROM `design` WHERE DATE (date_registration)=CURDATE();";
                    $sql = "SELECT * FROM `design` ORDER BY `design_user` ASC;";
                    $respon = $mysqli->query ( $sql );
                    $res = mysqli_fetch_array ( $respon );         // response to array
                    //print_h($res);
                    $number = mysqli_num_rows ( $respon );                 //number of Results
                    //echo($number);
                    if (mysqli_num_rows ( $respon ) == 0) {
                        echo "موردی یافت نشد";
                    } else {
                        echo '<table id="editable-table" class="table table-bordered table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">' . "ID" . '</th>';
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
                        while ($result = mysqli_fetch_array ( $respon )) {
                            echo '
                                <tr>
                                    <td>' . $result["id"] . '</td>
                                    <td>' . $result["design_user"] . '</td>
                                    <td>' . $result["job_list"] . '</td>
                                    <td>' . $result["conditions"] . '</td>
                                    <td>' . $result["date_registration"] . '</td>
                                    <td>' . $result["queue"] . '</td>
                                    <td>' . $result["admin_desc"] . '</td>
                                    <td>' . $result["user_desc"] . '</td>
                                </tr>
                            ';
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
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        $('#editable-table').Tabledit({-->
<!--            url: '../jquery-tabledit-1.2.3/example.php',-->
<!--            columns: {-->
<!--                identifier: [0, 'id'],-->
<!--                editable: [[3, 'conditions'], [5, 'queue'], [6, 'admin_desc']]-->
<!--            },-->
<!--            restoreButton: false,-->
<!--            onSuccess: function (data,textStatus, jqXHR) {-->
<!--                if (data.action == 'delete') {-->
<!--                    $('#' + data.id).remove();-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script>
    $(document).ready(function () {
        $('#editable-table').Tabledit({
            // url: '../jquery-tabledit-1.2.3/example.php',
            url: 'example.php',
            columns: {
                identifier: [0, 'id'],
                editable: [[3, 'conditions'], [5, 'queue'], [6, 'admin_desc']]
            },
            onSuccess: function(data, textStatus, jqXHR) {
             console.log("ANJAM SHOD");
            }
        });

    });
</script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../bs/js/bootstrap.js"></script>
<script src="../jquery-tabledit-1.2.3/jquery.tabledit.js"></script>

</body>
</html>