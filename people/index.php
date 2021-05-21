<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location : http://127.0.0.1/NarTik/people/$who");
}
else {
    header("Location : http://127.0.0.1/NarTik");
}