<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    header("Location: http://127.0.0.1/NarTik/people/$who");
}

include('action.php');

// MySQL Data
$mysqlserver = "localhost";
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

$getc = "SELECT * FROM company";
$resc = mysqli_query($connection, $getc);

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>مدریت جساب کاربری</title>
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('http://127.0.0.1/NarTik/pack/nazanin.TTF');
                font-style: normal;
            }
            
            body {
                padding: 15px;
                font-family: 'nazanin';
                background-color: #f1f1f1;
            }
            
            .mform {
                border: solid 1px black;
                border-radius: 50px;
                padding: 20px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 0px;
/*                box-shadow:
                    0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                    0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                    0 12.5px 10px rgba(0, 0, 0, 0.06),
                    0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                    0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                    0 100px 80px rgba(0, 0, 0, 0.12)
                ;*/
                box-shadow: rgba(0, 0, 0, 0.4) 0px 15px 45px;
            }
            .inp {
                border: solid 1px black;
                border-radius: 10px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 0px;
                color: black;
            }
            .inp:hover {
                box-shadow: rgba(0, 0, 0, 0.4) 0px 3px 9px;
            }
            .blk {
                color: black;
                background: #f1f1f1;
                border: solid 1px black;
                border-radius: 10px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 0px;
            }
            .blk:hover {
                box-shadow: rgba(0, 0, 0, 0.4) 0px 3px 9px;
            }
            .sel {
                color: black;
            }
            .alrt {
                background-color: #f44336;
                color: white;
                padding: 15px;
                text-align: right;
                border-radius: 40px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 0px;
                border: solid 2px red;
            }
            
            .all {
                border: solid 1px white;
                border-radius: 50px;
                padding: 50px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 0px;
                box-shadow: rgba(0, 0, 0, 0.4) 0px 15px 45px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="all border-primary">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mform border-primary">
                            <h1 class="display-6 text-primary"><span style="font-size: 25px;"><i class="fa fa-user-plus"></i></span> ساخت حساب کاربری</h1>                            <hr class="border-primary border">
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
                                <button type="submit" id="reg_user" name="reg_user" class="btn text-primary blk border-primary">ساخت حساب</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <br>
                        <br>
                    </div>
                    <div class="col-md-5">
                        <div class="mform border-primary">
                            <h1 class="display-6 text-primary"><span style="font-size: 25px;"><i class="fa fa-sign-in"></i></span> ورود به حساب کاربری</h1>
                            <hr class="border-primary border">
                            <br>
                            <form action="index.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="id" class="form-control text-primary border-primary inp" placeholder="کد ملی"
                                               aria-label="کد ملی">
                                    </div>
                                    <div class="col">
                                        <input type="password" name="password" class="form-control text-primary border-primary inp"
                                               placeholder="رمز حساب" aria-label="رمز جساب">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="login_user" class="btn text-primary blk border-primary">ورود</button>
                            </form>
                        </div>
                        <br>
                        <div class="">
                            <?php include('error.php'); ?>
                        </div>
                        <br>
                        <hr class="border-success border">
                        <div>
                            <p><a class="text-success" style="text-decoration: none;" href="/NarTik">برگشت به خانه <i class="fa fa-home"></i></a></p>
                            <p><a class="text-success" style="text-decoration: none;"  href="/NarTik/people/support">ورود به عنوان پشتیبان <i class="fa fa-support"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
