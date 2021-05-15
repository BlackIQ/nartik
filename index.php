<?php

include("action.php");

session_start();

$mysqlserver = "localhost";
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

date_default_timezone_set('Iran');
    
$hour = date("H");

if (hour <= 24 && $hour >= 6) {
    echo "Close";
}
else {
    if ($_SESSION['status'] == true) {
        $id = $_SESSION['id'];

        $getdata = "SELECT * FROM people WHERE type='user' AND id='$id'";
        $ressult = mysqli_query($connection, $getdata);

        if (mysqli_num_rows($ressult) > 0) {
            while ($row = mysqli_fetch_assoc($ressult)) {
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $phone = $row['phone'];
                $email = $row['email'];
                $username = $row['username'];
                $userid = $row['id'];
                $company = $row['company'];
            }
        }
        
        include("main.php");

        $gettiks = "SELECT * FROM tiks WHERE userid = '$userid' ORDER BY row DESC";
        $tikres = mysqli_query($connection, $gettiks);
    }
    else {
        header("Location: http://office.narbon.ir:4488/NarTik/account");
    }
}

?>