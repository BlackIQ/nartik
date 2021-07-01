<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location: http://$serverip/NarTik/people/$who");
}

$errors = array();

include("../../../pack/config.php");
$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

function sendpending ($user) {
    echo 'This is a function for $user';
}

if (isset($_POST['reg_user'])) {
    $name = mysqli_real_escape_string($connection, $_POST['fname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = mysqli_real_escape_string($connection, $_POST['pass']);
    $conpass = mysqli_real_escape_string($connection, $_POST['conpass']);
    $company = mysqli_real_escape_string($connection, $_POST['company']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    if (empty($name)) {
        array_push($errors, "نام الزامیست");
    }
    if (empty($lastname)) {
        array_push($errors, "نام خانوادگی الزامیست");
    }
    if (empty($phone)) {
        array_push($errors, "شماره همراه الزامیست");
    }
    if (empty($email)) {
        array_push($errors, "ایمیل الزامیست");
    }
    if (empty($username)) {
        array_push($errors, "نام کاربری الزامیست");
    }
    if (empty($id)) {
        array_push($errors, "شماره ملی الزامیست");
    }
    if (empty($pass)) {
        array_push($errors, "رمز الزامیست");
    }
    if (empty($conpass)) {
        array_push($errors, "تایید رمز الزامیست");
    }
    if (empty($company)) {
        array_push($errors, "لطفا یک شرکت را انتخاب کنید");
    }

    if ($pass != $conpass) {
        array_push($errors, "رمز ها با هم تفاوت دارند");
    }

    if (count($errors) == 0) {
        $dt = date("M , d , Y");

        $select_company = "SELECT * FROM company WHERE id = '$company'";
        $rescompany = mysqli_query($connection, $select_company);

        if (mysqli_num_rows($rescompany) == 1) {
            $row = mysqli_fetch_assoc($rescompany);

            $company_name = $row["name"];
            $uid = $row['uid'];
        }

        $query = "INSERT INTO people (id, firstname, lastname, phone, email, username, dt, company, uid, password, type) VALUES ('$id', '$name', '$lastname', '$phone', '$email', '$username', '$dt', '$company_name', '$uid', '$pass', 'pending')";
        if (mysqli_query($connection, $query)) {
            ?>
            <script>
                window.alert("درخواست شما با موفقیت ثبت شد");
                window.location.replace("../../")
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace("../../");
            </script>
            <?php
        }
    }
}

if (isset($_POST['login_user'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($id)) {
        array_push($errors, "لطفا کد ملی را وارد کنید");
    }
    if (empty($password)) {
        array_push($errors, "لطفا رمز را وارد کنید");
    }

    if (count($errors) == 0) {
//            $password = md5($password);
        $query = "SELECT * FROM people WHERE type='user' AND id='$id' AND password='$password'";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['who'] = "user";
            $_SESSION['id'] = $id;
            $_SESSION['directory'] = 'nartik';
            ?>
            <script>
                window.location.replace("../")
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("کد ملی یا رمز عبور اشتباه است");
                window.location.replace("../account");
            </script>
            <?php
        }
    }
}

$getc = "SELECT * FROM company";
$resc = mysqli_query($connection, $getc);

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>مدریت جساب کاربری</title>
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('http://<?php echo $serverip; ?>/NarTik/pack/fonts/nazanin.TTF');
                font-style: normal;
            }

            body {
                padding: 56px;
                font-family: 'nazanin';
            }

            * {
                color: blue;
            }

            .login {
                border: solid 1px blue;
                border-radius: 10px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="login">
                        <h1 class="display-6 text-primary">ساخت حساب جدید</h1>
                        <hr class="border-primary border">
                        <br>
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="fname" class="form-control text-primary border-primary inp" placeholder="نام"
                                           aria-label="نام">
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" class="form-control text-primary border-primary inp"
                                           placeholder="نام خانوادگی" aria-label="نام خانوادگی">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="phone" class="form-control text-primary border-primary inp"
                                           placeholder="شماره همراه" aria-label="شماره همراه">
                                </div>
                                <div class="col">
                                    <input type="text" name="email" class="form-control text-primary border-primary inp" placeholder="ایمیل"
                                           aria-label="ایمیل">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="username" class="form-control text-primary border-primary inp" placeholder="نام کاربری"
                                           aria-label="نام کاربری">
                                </div>
                                <div class="col">
                                    <input type="text" name="id" class="form-control text-primary border-primary inp"
                                           placeholder="کد ملی" aria-label="کد ملی">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="password" name="pass" class="form-control text-primary border-primary inp" placeholder="رمز"
                                           aria-label="رمز">
                                </div>
                                <div class="col">
                                    <input type="password" name="conpass" class="form-control text-primary border-primary inp"
                                           placeholder="تایید رمز" aria-label="تایید رمز">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <select name="company" class="form-control border-primary text-primary inp sel">
                                        <option selected>انتخاب شرکت</option>
                                        <?php
                                        if (mysqli_num_rows($resc) > 0) {
                                            while ($row = mysqli_fetch_assoc($resc)) {
                                                ?>
                                                <option class="text-primary" value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" id="reg_user" name="reg_user" class="btn btn-primary">ساخت حساب</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="login">
                        <h1 class="display-6 text-primary">ورود کاربر</h1>
                        <hr class="border-primary border">
                        <br>
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="id" class="form-control bg-white border-primary text-primary"
                                           placeholder="کد ملی"
                                           aria-label="کد ملی">
                                </div>
                                <br>
                                <div class="col">
                                    <input type="password" name="password"
                                           class="form-control bg-white border-primary text-primary"
                                           placeholder="رمز حساب" aria-label="رمز حساب">
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="login_user" class="btn btn-primary">ورود</button>
                        </form>
                        <br>
                        <hr class="border-primary border">
                        <div>
                            <p><a class="text-primary" style="text-decoration: none;" href="../../../"><i class="fa fa-home"></i> برگشت به خانه</a></p>
                            <p><a class="text-primary" style="text-decoration: none;"  href="../../support"><i class="fa fa-support"></i> ورود به عنوان پشتیبان</a></p>
                        </div>
                    </div>
                    <br>
                    <div>
                        <?php  if (count($errors) > 0) : ?>
                            <div class="alert alert-danger border-danger" role="alert">
                                <?php foreach ($errors as $error) : ?>
                                    <h4 style="color: red;"><?php echo $error ?></h4>
                                <?php endforeach ?>
                            </div>
                            <br>
                        <?php  endif ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
