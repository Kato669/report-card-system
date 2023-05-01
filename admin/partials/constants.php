<?php
//start session
session_start();
//constants
define('SITEURL', 'http://localhost/rmss/admin/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'report-card');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$dbname = mysqli_select_db($conn, DB_NAME);

function print_array($params){
    echo "<pre>";
    print_r($params);
    echo "</pre>";
}
?>