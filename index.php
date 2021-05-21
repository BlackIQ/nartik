<?php

date_default_timezone_set('Iran');
    
$hour = date("H");

if (hour <= 24 && $hour >= 6) {
    if ($_SESSION['status'] == true) {
        if ($_SESSION["who"] == "user") {
            header("Location: http://127.0.0.1/NarTik/user");
        }
        elseif ($_SESSION["who"] == "support") {
            header("Location: http://127.0.0.1/NarTik/support");
        }
    }
    else {
        header("Location: http://127.0.0.1/NarTik/home");
    }
}
else {
    include("etc/close.php");
}