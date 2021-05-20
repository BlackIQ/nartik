<?php

session_start();

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

if (hour <= 24 && $hour >= 6) {
    if ($_SESSION['status'] == true) {
        if ($_SESSION['who'] == "support") {
            include("main.php");
        }
        else {
            header("Location: http://127.0.0.1/NarTik");
        }
    }
    else {
        header("Location: http://127.0.0.1/NarTik");
    }
}
else {
    include("../etc/close.php");
}

?>