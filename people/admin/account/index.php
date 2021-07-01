<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("../../<?php echo $who; ?>")
    </script>
    <?php
}

$errors = array();

include("../../../pack/config.php");
$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

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
            ?>
            <script>
                window.location.replace("../")
            </script>
            <?php
        }
        else {
            array_push($errors, "نام کاربری یا رمز");
        }
    }
}

?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    <title>Login</title>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('../../../pack/fonts/nazanin.TTF');
            font-style: normal;
        }

        body {
            padding: 56px;
            font-family: 'nazanin';
        }

        * {
            color: red;
        }

        .login {
            border: solid 1px red;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-white">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="login">
                <h1 class="display-6 text-danger">ورود</h1>
                <hr class="border-danger border">
                <br>
                <form action="index.php" method="post">
                    <?php  if (count($errors) > 0) : ?>
                        <div class="alert alert-danger border-danger" role="alert">
                            <?php foreach ($errors as $error) : ?>
                                <h4 style="color: red;"><?php echo $error ?></h4>
                            <?php endforeach ?>
                        </div>
                        <br>
                    <?php  endif ?>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="username" class="form-control bg-white border-danger text-danger"
                                   placeholder="نام کاربری"
                                   aria-label="نام کاربری">
                            <br>
                            <input type="password" name="password"
                                   class="form-control bg-white border-danger text-danger"
                                   placeholder="رمز" aria-label="رمز">
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="login_user" class="btn btn-danger text-white">ورود</button>
                </form>
                <br>
                <hr class="border-danger border">
                <div>
                    <p><a class="text-danger" style="text-decoration: none;" href="../../../"><i class="fa fa-home"></i> برگشت به خانه</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>
</html>