<?php

include('action.php');

if ($_SESSION['status'] == true) {
    header("Location: http://127.0.0.1/NarTik");
}

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>Login</title>
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('http://127.0.0.1/NarTik/pack/nazanin.TTF');
                font-style: normal;
            }
            body {
                padding: 56px;
                font-family: 'nazanin';
            }
            * {
                color: darkgreen;
            }
            .login {
                border: solid 1px darkgreen;
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
                        <h1 class="display-6 text-success">ورود به حساب</h1>
                        <hr class="border-success border">
                        <br>
                        <form action="index.php" method="post">
                            <?php include('error.php'); ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="email" class="form-control bg-white border-success text-success" placeholder="ایمیل"
                                           aria-label="ایمیل">
                                    <br>
                                    <input type="password" name="password" class="form-control bg-white border-success text-success"
                                           placeholder="رمز حساب" aria-label="رمز جساب">
                                </div>
                                <div>
                                    <br>
                                    <select name="company" class="form-control bg-white border-success text-success">
                                        <option selected>انتخاب شرکت</option>
                                        <option class="text-success" value="Narbon">ناربن</option>
                                        <option class="text-success" value="Milad">میلاد</option>
                                        <option class="text-success" value="Microsoft">مایکروسافت</option>
                                        <option class="text-success" value="Apple">اپل</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="login_user" class="btn btn-success text-white">ورود</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>