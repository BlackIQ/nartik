<?php
session_start();

$errors = array();

// MySQL Data
include("../../../pack/config.php");
$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "نام کاربری الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }

    if (count($errors) == 0) {
        if ($username == "admin" && $password == "admin") {
            $_SESSION['status'] = true;
            $_SESSION["who"] = "admin";
            header("location: ../");
        }
        else {
            array_push($errors, "نام کاربری یا رمز");
        }
    }
}

?>
