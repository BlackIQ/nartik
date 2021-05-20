<?php

session_start();

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

if ($_SESSION['status'] == true) {
    header("Location: http://127.0.0.1/NarFirm/admin");
}
else {
    header("Location: http://127.0.0.1/NarFirm/account");
}

?>