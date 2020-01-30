<?php
require_once 'common.php';
require '../lib/func.php';
session_start ();
if (isset( $_SESSION['display_name'] )) {
    $login_user = $_SESSION['login_user'];
//    $userid = $_SESSION['userid'];
}
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "payload";
$conn = mysqli_connect ( $dbHost, $dbUser, $dbPass, "$dbName" );
if (!$conn) {
    die( 'Could not Connect My Sql:' . $mysqli->error );
} else {
//    echo "Successfull connect to database<br><br>";
}
$mysqli = new mysqli( $dbHost, $dbUser, $dbPass );
if (!$mysqli->select_db ( $dbName )) {
    echo "probleme in selecting data base";
    exit( 0 );
}
if ($mysqli->connect_errno) {
    printf ( "connect failed: %s/n", $mysqli->connect_error );
    exit();
}
if (isset( $_GET['show'] )) {
    $sql = "SELECT  * FROM $login_user;";
    $result = $mysqli->query ( $sql );
    echo ('Number Of Data = ' . $result->num_rows);
    print_h ( $result->fetch_all () );
}


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Serach Code +++++++++++++++++++++++++++++++++++++


$query = $_GET['query'];
// gets value sent over search form

$min_length = 3;
// you can set minimum length of the query if you want

if (strlen ( $query ) >= $min_length) { // if query length is more or equal minimum length then

    $query = htmlspecialchars ( $query );
    // changes characters used in html to their equivalents, for example: < to &gt;

    $query = $mysqli->real_escape_string ( $query );
    // makes sure nobody uses SQL injection

    $raw_results = $mysqli->query ( "SELECT * FROM customers_log
            WHERE (`family` LIKE '%" . $query . "%') OR (`user_name` LIKE '%" . $query . "%')" ) or die( $mysqli->error () );

    // * means that it selects all fields, you can also write: `id`, `title`, `text`
    // articles is the name of our table

    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

    if (mysql_num_rows ( $raw_results ) > 0) { // if one or more rows are returned do following

        while ($results = mysql_fetch_array ( $raw_results )) {
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

            echo "<p><h3>" . $results['title'] . "</h3>" . $results['text'] . "</p>";
            // posts results gotten from database(title and text) you can also show id ($results['id'])
        }

    } else { // if there is no matching rows do following
        echo "No results";
    }

} else { // if query length is less than minimum
    echo "Minimum length is " . $min_length;
}
?>


<!--//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Serach Code +++++++++++++++++++++++++++++++++++++-->