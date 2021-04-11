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

$email = $_SESSION['email'];

if ($_SESSION['status'] == true) {
    
}
else {
    header("Location: http://$ip/NarTik/account");
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Welcome, " . $row['firstname'];
    }
}

?>