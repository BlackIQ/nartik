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

if (hour <= 24 && $hour >= 6) {
    if ($_SESSION['status'] == true) {
        if ($_SESSION['who'] == "user") {
            include("main.php");
        }
        elseif ($_SESSION['who'] == "support") {
            header("Location: http://127.0.0.1/NarTik/support");
        }
        else {
            header("Location: http://127.0.0.1/NarTik");
        }
    }
    else {
        header("Location: http://127.0.0.1/NarTik/user/account");
    }
}
else {
    include("../etc/close.php");
}

?>