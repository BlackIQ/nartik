<?php

$user = $_GET['email'];

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

$sql = "SELECT * FROM pending WHERE email = '$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['firstname'];
        $lname = $row['lastnama'];
        $phone = $row['phone'];
        $email = $row['email'];
        $password = $row['password'];
        $company = $row['company'];

        $insert = "INSERT INTO users (firstname, lastnama, phone, email, password, company) VALUES ('$fname', '$lname', '$phone', '$email', '$password',$company)";
        if (mysqli_query($conn, $insert)) {
            echo 'Done';
        }
        else {
            echo mysqli_error($conn);
        }
    }
}

?>