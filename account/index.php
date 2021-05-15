<?php

include('action.php');

if ($_SESSION['status'] == true) {
    header("Location: http://office.narbon.ir:4488/NarTik");
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
            @font-face {
                font-family: 'nazanin';
                src: url('../../nazanin.TTF');
                font-style: normal;
            }
            
            body {
                padding: 56px;
                font-family: 'nazanin';
                background-color: gray;
            }
            
            * {
                color: white;
            }
            
            .mform {
                border: solid 1px white;
                border-radius: 10px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="mform">
                        <h1 class="display-6 text-white">ساخت حساب جدید</h1>
                        <hr class="border-white border">
                        <br>
                        <form action="index.php" method="post">
                            <?php include('error.php'); ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="fname" class="form-control border-white" placeholder="نام"
                                           aria-label="نام">
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" class="form-control border-white"
                                           placeholder="نام خانوادگی" aria-label="نام خانوادگی">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="phone" class="form-control border-white"
                                           placeholder="شماره همراه" aria-label="شماره همراه">
                                </div>
                                <div class="col">
                                    <input type="text" name="email" class="form-control border-white" placeholder="ایمیل"
                                           aria-label="ایمیل">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="username" class="form-control border-white" placeholder="نام کاربری"
                                           aria-label="نام کاربری">
                                </div>
                                <div class="col">
                                    <input type="text" name="id" class="form-control border-white"
                                           placeholder="کد ملی" aria-label="کد ملی">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="password" name="pass" class="form-control border-white" placeholder="رمز"
                                           aria-label="رمز">
                                </div>
                                <div class="col">
                                    <input type="password" name="conpass" class="form-control border-white"
                                           placeholder="تایید رمز" aria-label="تایید رمز">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <select name="company" class="form-control border-white">
                                        <option selected>انتخاب شرکت</option>
                                        <option value="Narbon">ناربن</option>
                                        <option value="Milad">میلاد</option>
                                        <option value="Microsoft">مایکروسافت</option>
                                        <option value="Apple">اپل</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" id="reg_user" name="reg_user" class="btn btn-primary">ساخت حساب</button>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="mform">
                        <h1 class="display-6 text-white">ورود به حساب کاربری</h1>
                        <hr class="border-white border">
                        <br>
                        <form action="index.php" method="post">
                            <?php include('error.php'); ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="id" class="form-control border-white" placeholder="کد ملی"
                                           aria-label="کد ملی">
                                </div>
                                <div class="col">
                                    <input type="password" name="password" class="form-control border-white"
                                           placeholder="رمز حساب" aria-label="رمز جساب">
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="login_user" class="btn btn-primary">ورود</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
