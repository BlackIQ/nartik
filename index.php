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

if ($_SESSION['status'] == true) {
    if ($_SESSION['person'] == "admin") {
        header("Location: http://$ip/NarTik/admin");
    }
    else {
        header("Location: http://$ip/NarTik/dashboard");
    }
}
else {
    header("Location: http://$ip/NarTik/account");
}

?>