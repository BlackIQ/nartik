<?php

date_default_timezone_set('Iran');
    
$hour = date("H");

if (hour <= 24 && $hour >= 6) {
    if ($_SESSION['status'] == true) {
        $who = $_SESSION["who"];
        header("Location: http://127.0.0.1/NarTik/$who");
    }
    else {
        header("Location: http://127.0.0.1/NarTik/home");
    }
}
else {
    include("pack/close.php");
}