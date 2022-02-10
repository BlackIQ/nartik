<?php

session_start();

include("../resources/config/config.php");
include("../resources/routes/routes.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header('location:' . $path . '/' . $who);
}
else {
    header('location:' . $path);
}

?>