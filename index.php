<?php

if ($_SESSION['status'] == true) {
    header("Location: http://192.168.1.6/NarTik/dashboard");
}
else {
    header("Location: http://192.168.1.6/NarTik/account");
}

?>