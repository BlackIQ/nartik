<?php

session_start();

if ($_SESSION['status'] == true) {
    header('location: http://office.narbon.ir:4488/NarTik/dashboard');
}
else {
    echo 'Login first !';
}

?>