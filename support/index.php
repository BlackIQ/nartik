<?php

session_start();

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

date_default_timezone_set('Iran');
    
$hour = date("H");

if (hour <= 24 && $hour >= 6) {
    if ($_SESSION['status'] == true) {
        if ($_SESSION['who'] == "support") {
            include("main.php");
        }
        elseif ($_SESSION['who'] == "user") {
            header("Location: http://127.0.0.1/NarTik/user");
        }
        else {
            header("Location: http://127.0.0.1/NarTik");
        }
    }
    else {
        header("Location: http://127.0.0.1/NarTik/support/account");
    }
}
else {
    include("../pack/close.php");
}
?>