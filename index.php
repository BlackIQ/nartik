<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("people/<?php echo $who; ?>");
    </script>
    <?php
}

?>

<!doctype html>
<html>
<head>
    <style>
        body {
            user-select: none;
        }
        
        @font-face {
            font-family: vazir;
            src: url("pack/fonts/vazir/Vazir.ttf");
        }

        * {
            font-family: vazir, sans-serif;
        }

        .main {
            /*background: url('https://wallpapercave.com/wp/wp3797593.jpg') no-repeat center center;*/
            background: url('https://wallpapercave.com/wp/wp8272239.jpg') no-repeat center center;
            text-align: right;
            direction: rtl;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            height: 100vh;
            padding: 5%;
            color: white;
        }

        .text {
            color: white;
            text-align: right;
        }

        .mbtn {
            width: 25%;
        }

        .center {
            direction: rtl;
            text-align: right;
        }
    </style>
    <title>نارتیک</title>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <div class="text">
        <h1>به سامانه ثبت درخواست سرویس شرکت ناربن خوش آمدید</h1>
        <br>
        <br>
        <br>
        <button type="button" class="btn btn-primary mbtn" data-bs-toggle="modal" data-bs-target="#loginuser">
            ورود کاربر
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-info mbtn" style="color: white" data-bs-toggle="modal"
                data-bs-target="#create">
            ساخت حساب کاربری
        </button>
        <br>
        <br>
        <button type="button" class="btn btn-success mbtn" data-bs-toggle="modal" data-bs-target="#loginsupport">
            ورود پشتیبان
        </button>
        <br>
        <br>
        <br>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</html>

<form method="post" action="index.php">
    <div class="modal fade" id="loginuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود کاربر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body center">
                    <label class="form-label" for="id">کد ملی</label>
                    <input type="text" id="id" name="id" class="form-control border-primary text-primary"
                           placeholder="کد ملی">
                    <br>
                    <label class="form-label" for="password">رمز حساب</label>
                    <input type="password" id="password" name="password"
                           class="form-control border-primary text-primary"
                           placeholder="رمز حساب">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
                    <button type="submit" name="login_user" class="btn btn-primary">ورود</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="index.php">
    <div class="modal fade" id="loginsupport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود پشتیبان</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body center">
                    <label class="form-label" for="username">نام کاربری</label>
                    <input type="text" name="username" id="username" class="form-control border-success text-success" placeholder="نام کاربری">
                    <br>
                    <label class="form-label" for="password">رمز حساب</label>
                    <input type="password" name="password" id="password" class="form-control border-success text-success"
                           placeholder="رمز ورود">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
                    <button type="submit" name="login_support" class="btn btn-success text-white">ورود</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="index.php">
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ساخت حساب کاربری جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body center">
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
<!--                    <br>-->
<!--                    <div class="row">-->
<!--                        <div class="col">-->
<!--                            <select name="company" class="form-control border-primary text-primary inp sel">-->
<!--                                <option selected>انتخاب شرکت</option>-->
<!--                                --><?php
//                                if (mysqli_num_rows($resc) > 0) {
//                                    while ($row = mysqli_fetch_assoc($resc)) {
//                                        ?>
<!--                                        <option class="text-primary"-->
<!--                                                value="--><?php //echo $row["id"]; ?><!--">--><?php //echo $row["id"]; ?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
                    <button type="submit" name="create_user" class="btn btn-info text-white" style="color: white">ورود</button>
                </div>
            </div>
        </div>
    </div>
</form>