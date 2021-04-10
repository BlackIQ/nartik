<?php

session_start();

$ip = "127.0.0.1";

if ($_SESSION['status'] == true) {
    header("Location: http://$ip/NarTik/dashboard");
}
else {
    header("Location: http://$ip/NarTik/account");
}

?>