<?php

include("action.php");

session_start();

$mysqlserver = "localhost";
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

date_default_timezone_set('Iran');
    
$hour = date("H");

if (hour >= 24 && $hour <= 6) {
    echo "Close";
}
else {
    echo "Close";
    if ($_SESSION['status'] == true) {
        include("main.php");
    }
    else {
        header("Location: http://office.narbon.ir:4488/NarTik/account");
    }
}

?>