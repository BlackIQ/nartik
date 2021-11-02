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
    <style>
        .errordiv {
            direction: rtl;
            text-align: right;
            font-size: 15px;
            width:25%
        }
    </style>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <?php
    if (count($errors) > 0) {
        ?>
        <div class="errordiv">
            <div class="alert alert-danger" role="alert">
                <?php
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 half overflow-auto">
                <div style="display: block;" id="create-user">
                    <form action="index.php" method="POST">
                        <h1>ساخت حساب جدید</h1>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="fname">نام</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="نام">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="lname">نام خانوادگی</label>
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="نام خانوادگی">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="phone">شماره همراه</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="شماره همراه">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">ایمیل</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="ایمیل">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="username">نام کاربری</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="نام کاربری">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="id">کد ملی</label>
                                <input type="text" id="id" name="id" class="form-control" placeholder="کد ملی">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="password">رمز</label>
                                <input type="password" id="password" name="pass" class="form-control" placeholder="رمز">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="conpass">تایید رمز</label>
                                <input type="password" id="conpass" name="conpass" class="form-control" placeholder="تایید رمز">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" id="company">انتخاب شرکت</label>
                                <select id="company" name="company" class="form-control">
                                    <option selected>انتخاب شرکت</option>
                                    <?php
                                    if (mysqli_num_rows($resc) > 0) {
                                        while ($row = mysqli_fetch_assoc($resc)) {
                                            ?>
                                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" name="create_user" class="btn xbtn">ساخت حساب</button>
                        </div>
                        <hr>
                        <div class="hints">
                            <a onclick="return show('login-user', 'create-user');" class="nlink">ورود به عنوان کاربر</a>
                            <br>
                            <a onclick="return show('login-support', 'create-user');" class="nlink">ورود به عنوان پشتیبان</a>
                        </div>
                    </form>
                </div>
                <div style="display: none;" id="login-user">
                    <form action="index.php" method="POST">
                        <h1>ورود کاربران</h1>
                        <br>
                        <label class="form-label" for="id">کد ملی</label>
                        <input type="text" id="id" name="id" class="form-control" placeholder="کد ملی">
                        <br>
                        <label class="form-label" for="password">رمز حساب</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="رمز حساب">
                        <br>
                        <div>
                            <button type="submit" name="login_user" class="btn xbtn">ورود</button>
                        </div>
                        <hr>
                        <div class="hints">
                            <a onclick="return show('login-support', 'login-user');" class="nlink">ورود به عنوان پشتیبان</a>
                            <br>
                            <a onclick="return show('create-user', 'login-user');" class="nlink">ساخت حساب کاربری</a>
                        </div>
                    </form>
                </div>
                <div style="display: none;" id="login-support">
                    <form action="index.php" method="POST">
                        <h1>ورود پشتیبان</h1>
                        <br>
                        <label class="form-label" for="username">نام کاربری</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="نام کاربری">
                        <br>
                        <label class="form-label" for="password">رمز حساب</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="رمز ورود">
                        <br>
                        <div>
                            <button type="submit" name="login_support" class="btn xbtn">ورود</button>
                        </div>
                        <hr>
                        <div class="hints">
                            <a onclick="return show('login-user', 'login-support');" class="nlink">ورود به عنوان کاربر</a>
                            <br>
                            <a onclick="return show('create-user', 'login-support');" class="nlink">ساخت حساب کاربری</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="pack/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</html>