<?php

session_start();

include("action.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("../<?php echo $who; ?>")
    </script>
    <?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    <title>مدریت جساب کاربری</title>
    <style>
        @font-face {
            font-family: vazir;
            src: url("../../pack/fonts/vazir/Vazir.ttf");
            font-style: normal;
        }

        body {
            padding: 56px;
        }

        * {
            font-size: 13px;
            font-family: vazir, serif;
            color: blue;
        }

        .login {
            border: solid 1px blue;
            border-radius: 10px;
            padding: 20px;
        }

        .new {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="login">
                <h1 class="display-6 text-primary">ورود کاربر</h1>
                <hr class="border-primary border">
                <br>
                <form action="account.php" method="post">
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
                    <p>
                        <a class="text-primary" style="text-decoration: none;" href="../../">
                            <i class="fa fa-home"></i>
                            برگشت به خانه
                        </a>
                    </p>
                    <p class="new">
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-primary"
                           style="text-decoration: none;">
                            <i class="fa fa-plus"></i>
                            ساخت حساب جدید
                        </a>
                    </p>
                </div>
            </div>
            <br>
            <div>
                <?php
                if (count($errors) > 0) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show alrt" role="alert">
                        <!--                                    <p><strong>Maybe something important!</strong></p>-->
                        <?php
                        foreach ($errors as $error) {
                            echo "<p>" . $error . "</p>";
                        }
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>
</html>

<!-- Modal -->
<form action="account.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت حساب جدید</h5>
                    <a href="." class="text-danger"><i class="fa fa-times text-danger"></i></a>
                </div>
                <div class="modal-body">
                    <div class="">
                        <br>

                        <div class="row">
                            <div class="col">
                                <input type="text" name="fname" class="form-control text-primary border-primary inp"
                                       placeholder="نام"
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
                                <input type="text" name="email" class="form-control text-primary border-primary inp"
                                       placeholder="ایمیل"
                                       aria-label="ایمیل">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="username" class="form-control text-primary border-primary inp"
                                       placeholder="نام کاربری"
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
                                <input type="password" name="pass" class="form-control text-primary border-primary inp"
                                       placeholder="رمز"
                                       aria-label="رمز">
                            </div>
                            <div class="col">
                                <input type="password" name="conpass"
                                       class="form-control text-primary border-primary inp"
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
                                            <option class="text-primary"
                                                    value="<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="." style="color: white; text-decoration: none;">خروج</a></button>
                    <button type="submit" id="reg_user" name="reg_user" class="btn btn-primary">ساخت حساب</button>
                </div>
            </div>
        </div>
    </div>
</form>