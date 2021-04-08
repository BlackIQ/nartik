<?php include('action.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>مدریت جساب کاربری</title>
    <style>
        .f {
            background-color: #f1f1f1;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
</head>
<body class="f" dir="rtl">


<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-4">
            <h1 class="display-6 text-primary">ساخت حساب جدید</h1>
            <hr class="border-primary border">
            <br>
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control border-primary text-primary" placeholder="نام"
                               aria-label="نام">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control border-primary text-primary"
                               placeholder="نام خانوادگی" aria-label="نام خانوادگی">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control border-primary text-primary"
                               placeholder="شماره همراه" aria-label="شماره همراه">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control border-primary text-primary" placeholder="ایمیل"
                               aria-label="ایمیل">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="password" class="form-control border-primary text-primary" placeholder="رمز"
                               aria-label="رمز">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control border-primary text-primary"
                               placeholder="تایید رمز" aria-label="تایید رمز">
                    </div>
                </div>
                <br>
                <button type="submit" name="reg_user" class="btn btn-primary">ساخت حساب</button>
            </form>
        </div>

        <div class="col-md-2"></div>

        <div class="col-md-4">
            <h1 class="display-6 text-primary">ورود به حساب کاربری</h1>
            <hr class="border-primary border">
            <br>
            <form action="index.php" method="post">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control border-primary text-primary" placeholder="ایمیل"
                               aria-label="ایمیل">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control border-primary text-primary"
                               placeholder="رمز حساب" aria-label="رمز جساب">
                    </div>
                </div>
                <br>
                <button type="submit" name="login_user" class="btn btn-primary">ورود</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
