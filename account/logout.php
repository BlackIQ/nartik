<?php

session_start();

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

$getip = "SELECT * FROM development";
$res = mysqli_query($conn, $getip);

while ($row = mysqli_fetch_assoc($res)) {
    $ip = $row['ip'];
}

session_destroy();

header("Location: http://$ip/NarTik");