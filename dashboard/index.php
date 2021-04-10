<?php

session_start();

$ip = "127.0.0.1";

if ($_SESSION['status'] == true) {
    echo $_SESSION['email'];
}
else {
    header("Location: http://$ip/NarTik/account");
}

?>