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
<!--    <link rel="stylesheet" href="../css/style.css">-->
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/hover.css">
    <!--    <link rel="stylesheet" href="./aos-master/dist/aos.css">-->
    <!--    <link rel="stylesheet" href="./css/sequencejs.css">-->
    <link href="../fonts/stylesheet.css" rel="stylesheet">
    <link href="../css/fonts.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">

</head>
<body>

<section class="answer">
    <div class="table_container" style="overflow:auto;">
        <div class="container">
            <div class="row">

                <!--            <h2>جدول کنترل داده</h2>-->
                <!--            <p>نمایش بر اساس نام و نام خانوادگی</p>-->
                <?php
                require_once 'common.php';
                require '../lib/func.php';
                session_start();
                if (isset($_SESSION['display_name'])) {
                    $login_user = $_SESSION['login_user'];
//    $userid = $_SESSION['userid'];
                }
                $dbHost = "localhost";
                $dbUser = "root";
                $dbPass = "asdasd";
                $dbName = "payload";
                $conn = mysqli_connect($dbHost, $dbUser, $dbPass, "$dbName");
                if (!$conn) {
                    die('Could not Connect My Sql:' . $mysqli->error);
                } else {
//    echo "Successfull connect to database<br><br>";
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

                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Serach Code +++++++++++++++++++++++++++++++++++++


                $query = $_GET['query'];
                // gets value sent over search form

                $min_length = 3;
                // you can set minimum length of the query if you want

                if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then

                    $query = htmlspecialchars($query);
                    // changes characters used in html to their equivalents, for example: < to &gt;

                    $query = $mysqli->real_escape_string($query);
                    // makes sure nobody uses SQL injection

                    $raw_results = $mysqli->query("SELECT * FROM `customers_log`
            WHERE (`family` LIKE '%" . $query . "%') OR (`user_name` LIKE '%" . $query . "%')") or die($mysqli->error());

                    // * means that it selects all fields, you can also write: `id`, `title`, `text`
                    // articles is the name of our table
                    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
                    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
                    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

                    if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                        echo '<table class="table table_answer table-bordered table-hover table-condensed">';
                        echo '<thead style="background-color: #1d2124;">';
                        echo '<tr>';
                        echo '<th scope="col">' . "CLOCK" . '</th>';
                        echo '<th scope="col">' . "RATE" . '</th>';
                        echo '<th scope="col">' . "EMAIL" . '</th>';
                        echo '<th scope="col">' . "MOBILE" . '</th>';
                        echo '<th scope="col">' . "FAMILY" . '</th>';
                        echo '<th scope="col">' . "NAME" . '</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while ($results = mysqli_fetch_array($raw_results)) {
                            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                            echo '<tr>';
                            echo "<td>" . ucfirst($results['clock']) . "</td>";
                            if ($results['rate'] == 1){
                                $rate = "GOLD";
                            }else if ($results['rate'] == 2) {
                                $rate = "SILVER";
                            }else {
                                $rate = "BRONZE";
                            }
                                echo "<td>" . $rate . "</td>";
                            echo "<td>" . ucfirst($results['email']) . "</td>";
                            echo "<td>" . ucfirst($results['mobile']) . "</td>";
                            echo "<td>" . ucfirst($results['family']) . "</td>";
                            echo "<td>" . ucfirst($results['user_name']) . "</td>";
                            // posts results gotten from database(title and text) you can also show id ($results['id'])
                            echo '</tr>';
                            echo '</tbody>';
                        }
                        echo '</table>';

                    } else { // if there is no matching rows do following
                        echo "No results";
                    }

                } else { // if query length is less than minimum
                    echo "Minimum length is " . $min_length;
                }
                ?>
                <!--//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Serach Code +++++++++++++++++++++++++++++++++++++-->
            </div>
        </div>
    </div>
</section>
<section class="footer_container">
    <footer>
        <div class="footer_right">
<!--            <p><i class="icon-vanak-home"></i><a href="../index.php">خانه</a></p>-->
<!--            <p><i class="icon-vanak-magnifying"></i><a href="../index.php">سایت ستاره ونک</a></p>-->
<!--            <p><i class="icon-vanak-luggage-1"></i><a href="../index.php">وب لاگ ستاره ونک</a></p>-->
<!--            <p><i class="icon-customer-service"></i><a href="../index.php">اطلاع رسانی مشکلات</a></p>-->
        </div>
        <div class="footer_center text-center">
            <p>Setareh Vanak Travel Agency</p>
<!--            <img src="../img/logo.png">-->
        </div>
        <div class="footer_left">
<!--            <p><i class="icon-instagram"></i><a href="../index.php">Instagram</a></p>-->
<!--            <p><i class="icon-vanak-facebook"></i><a href="../index.php">Facebook</a></p>-->
<!--            <p><i class="icon-spa"></i><a href="../index.php">setarehvanak.com</a></p>-->
<!--            <p><i class="icon-customer-service"></i><a href="../index.php">dooronazdik.ir</a></p>-->
        </div>
    </footer>
</section>
</body>
</html>
