<?php

include('action.php');

$ip = "127.0.0.1";

if ($_SESSION['status'] == true) {
    header("Location: http://$ip/NarTik/dashboard");
}

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>مدریت جساب کاربری</title>
        <style>
            body {
                padding: 56px;
                background-color: #f6f6f6;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="display-6 text-primary">ساخت حساب جدید</h1>
                    <hr class="border-primary border">
                    <br>
                    <form action="index.php" method="post">
                        <?php include('error.php'); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="fname" class="form-control border-primary text-primary" placeholder="نام"
                                       aria-label="نام">
                            </div>
                            <div class="col">
                                <input type="text" name="lname" class="form-control border-primary text-primary"
                                       placeholder="نام خانوادگی" aria-label="نام خانوادگی">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="phone" class="form-control border-primary text-primary"
                                       placeholder="شماره همراه" aria-label="شماره همراه">
                            </div>
                            <div class="col">
                                <input type="text" name="email" class="form-control border-primary text-primary" placeholder="ایمیل"
                                       aria-label="ایمیل">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="password" name="pass" class="form-control border-primary text-primary" placeholder="رمز"
                                       aria-label="رمز">
                            </div>
                            <div class="col">
                                <input type="password" name="conpass" class="form-control border-primary text-primary"
                                       placeholder="تایید رمز" aria-label="تایید رمز">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <select name="company" class="form-control border-primary text-primary">
                                    <option selected>انتخاب شرکت</option>
                                    <option value="1">Company 1</option>
                                    <option value="2">Company 2</option>
                                    <option value="3">Company 3</option>
                                    <option value="4">Company 4</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="submit" id="reg_user" name="reg_user" class="btn btn-primary">ساخت حساب</button>
                    </form>
                    <br>
                    <br>
                </div>
                
                <div class="col-md-1"></div>
                
                <div class="col-md-5">
                    <h1 class="display-6 text-primary">ورود به حساب کاربری</h1>
                    <hr class="border-primary border">
                    <br>
                    <form action="index.php" method="post">
                        <?php include('error.php'); ?>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="email" class="form-control border-primary text-primary" placeholder="ایمیل"
                                       aria-label="ایمیل">
                            </div>
                            <div class="col">
                                <input type="password" name="password" class="form-control border-primary text-primary"
                                       placeholder="رمز حساب" aria-label="رمز جساب">
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="login_user" class="btn btn-primary">ورود</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>