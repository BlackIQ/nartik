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

include('pack/configs/config.php');
include('pack/configs/forms.php');

$getc = "SELECT * FROM company";
$resc = mysqli_query($connection, $getc);

?>

<!doctype html>
<html>
<head>
    <title>نارتیک</title>
    <link href="pack/css/index.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <div class="text">
        <span style="font-size: 75px; font-weight: bold; color: white">نارتیک</span>
        <br>
        <span style="font-size: 25px; font-weight: bold; color: #fff;">سامانه ثبت درخواست سرویس شرکت ناربن</span>
        <br>
        <br>
        <br>
        <button type="button" class="btn mbtn" data-bs-toggle="modal" data-bs-target="#loginuser">
            ورود کاربر
        </button>
        <br>
        <br>
        <button type="button" class="btn mbtn"" data-bs-toggle="modal"
                data-bs-target="#create">
            ساخت حساب کاربری
        </button>
        <br>
        <br>
        <button type="button" class="btn mbtn" data-bs-toggle="modal" data-bs-target="#loginsupport">
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
                        <div class="col-md-6">
                            <label class="form-label" for="fname">نام</label>
                            <input type="text" id="fname" name="fname" class="form-control text-primary border-primary" placeholder="نام">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="lname">نام خانوادگی</label>
                            <input type="text" id="lname" name="lname" class="form-control text-primary border-primary" placeholder="نام خانوادگی">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="phone">شماره همراه</label>
                            <input type="text" id="phone" name="phone" class="form-control text-primary border-primary" placeholder="شماره همراه">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">ایمیل</label>
                            <input type="text" id="email" name="email" class="form-control text-primary border-primary" placeholder="ایمیل">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="username">نام کاربری</label>
                            <input type="text" id="username" name="username" class="form-control text-primary border-primary" placeholder="نام کاربری">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="id">کد ملی</label>
                            <input type="text" id="id" name="id" class="form-control text-primary border-primary" placeholder="کد ملی">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="password">رمز</label>
                            <input type="password" id="password" name="pass" class="form-control text-primary border-primary" placeholder="رمز">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="conpass">تایید رمز</label>
                            <input type="password" id="conpass" name="conpass" class="form-control text-primary border-primary" placeholder="تایید رمز">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" id="company">انتخاب شرکت</label>
                            <select id="company" name="company" class="form-control border-primary text-primary">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">خروج</button>
                    <button type="submit" name="create_user" class="btn btn-primary text-white" style="color: white">ساخت حساب</button>
                </div>
            </div>
        </div>
    </div>
</form>