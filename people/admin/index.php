<?php

session_start();

include("../../pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    if ($who != "admin") {
        ?>
        <script>
            window.location.replace("../../")
        </script>
        <?php
    }
    else {
        ?>
        <script>
            window.location.replace("../<?php echo $who; ?>")
        </script>
        <?php
    }
}
else {
    ?>
    <script>
        window.location.replace("../../")
    </script>
    <?php
}

include('action.php');

$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$conn = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

$get_nartik = "SELECT * FROM nartiks WHERE answer = 'ny'";
$tikres = mysqli_query($conn, $get_nartik);

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('../../pack/fonts/nazanin.TTF');
            font-style: normal;
        }

        * {
            font-family: "nazanin";
        }

        textarea {
            resize: none;
            text-align: right;
        }

        input {
            text-align: right;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نارتیک - ادمین</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../../pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../pack/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../pack/css/datepicker3.css" rel="stylesheet">
    <link href="../../pack/css/styles.css" rel="stylesheet">
</head>
<body style="text-align: right;">
<nav class="navbar bg-danger navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../support">نارتیک</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-danger" href="account/logout.php">
                        <em class="fa fa-sign-out"></em>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-sm-offset-0 col-lg-offset-0 col-sm-12 col-lg-12 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" dir="rtl">داشبورد ادمین</h1>
        </div>
    </div>
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
                        <div class="large">
                            <?php
                            $guc = "SELECT count(*) as total FROM people WHERE type='user'";
                            $gucr = mysqli_query($conn, $guc);
                            $gucrd = mysqli_fetch_assoc($gucr);
                            echo $gucrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تعداد کاربر ها</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-envelope color-orange"></em>
                        <div class="large">
                            <?php
                            $gpc = "SELECT count(*) as total FROM tiks";
                            $gpcr = mysqli_query($conn, $gpc);
                            $gpcrd = mysqli_fetch_assoc($gpcr);
                            echo $gpcrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تعداد تیکت ها</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-bank color-teal"></em>
                        <div class="large">
                            <?php
                            $gtc = "SELECT count(*) as total FROM admin";
                            $gtcr = mysqli_query($conn, $gtc);
                            $gtcrd = mysqli_fetch_assoc($gtcr);
                            echo $gtcrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تعداد شرکت ها</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    تیکت ها
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <?php
                        if (mysqli_num_rows($tikres) > 0) {
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class=""><b>تاریخ</b></td>
                                    <td class=""><b>موضوع</b></td>
                                    <td class=""><b>شرکت</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($_rowtik = mysqli_fetch_assoc($tikres)) {
                                    $company = $_rowtik['company'];

                                    $get_company = "SELECT * FROM admin WHERE uid = '$company'";
                                    $result_company = mysqli_query($conn, $get_company);

                                    if (mysqli_num_rows($result_company) > 0) {
                                        while ($company_row = mysqli_fetch_assoc($result_company)) {
                                            $com = $company_row["company"];
                                        }
                                    }

                                    ?>
                                    <tr>
                                        <td class=""><?php echo $_rowtik['dt']; ?></td>
                                        <td class=""><b><a
                                                        href="index.php?ticket=<?php echo $_rowtik['tikid']; ?>"><?php echo $_rowtik['title']; ?></a></b>
                                        </td>
                                        <td class=""><?php echo $com; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<h2 style='text-align: right;'>تیکت جدیدی یافت نشد</h2>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    نمایش تیکت
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <?php

                        if (count($tik) > 0) {
                            if ($tik[0] == false) {
                                echo '<h2>تیکت پیدا نشد</h2>';
                            }
                            else {
                                $company = $tik['company'];

                                $get_company = "SELECT * FROM admin WHERE uid = '$company'";
                                $result_company = mysqli_query($conn, $get_company);

                                if (mysqli_num_rows($result_company) > 0) {
                                    while ($company_row = mysqli_fetch_assoc($result_company)) {
                                        $com = $company_row["company"];
                                    }
                                }
                                ?>
                                <div>
                                    <h3><b><?php echo $tik[0]['title']; ?></b></h3>
                                    <h3><?php echo $tik[0]['explane']; ?></h3>
                                    <br>
                                    <h4><?php echo $com; ?></h4>
                                    <br>
                                    <p><?php echo $tik[0]['dt']; ?> ارسال شده در</p>
                                    <p><?php echo $tik[0]['tikid']; ?>شماره تیکت </p>
                                    <hr>
                                    <h4>پاسخ دادن به این تیکت</h4>
                                    <div>
                                        <form method="post" action="index.php">
                                            <div>
                                                <input class="form-control" name="answer" type="text" placeholder="جواب">
                                                <br>
                                                <button name="ans" class="btn btn-success">ارسال جواب</button>
                                                &nbsp;
                                                <button class="btn btn-danger" type="reset"><span style="color: white;">ریست کردن</span></button>
                                                &nbsp;
                                                <button class="btn btn-defult"><a style="color: black;" href="index.php">خروج</a></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else {
                            echo '<h2>یک تیکت را برای نمایش انتخاب کنید</h2>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    افزودن شرکت
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                </div>
                <div class="panel-body">
                    <div>
                        <form class="" method="post" action="index.php">
                            <div class="form-group">
                                <label for="company">نام شرکت</label>
                                <input type="text" class="form-control" id="company" name="company"
                                       aria-describedby="company" placeholder="نام شرکت">
                                <br>
                                <label for="eid">کد ورودی</label>
                                <input type="text" class="form-control" id="eid" name="eid"
                                       aria-describedby="کد ورودی" placeholder="کد ورودی">
                                <br>
                                <label for="eid">رمز ورود</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       aria-describedby="رمز ورود" placeholder="رمز ورود">
                            </div>
                            <button type="submit" name="addcompany" class="btn btn-danger">افزودن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="">
        <div class="container-fluid">
            <p class="back-link"><a class="text-danger" href="../">NarTik</a></p>
            <p class="back-link">Created by <a class="text-danger" href="https://www.github.com/BlackIQ">Amirhossein
                    Mohammadi</a></p>
            <p class="back-link">Powered By <a class="text-danger" href="https://www.linkedin.com/company/neotrinost">Neotrinost</a>
                <i class="fa fa-copyright"></i> <?php echo date("Y"); ?></p>
            <p class="back-link">
                <i class="fa fa-lg fa-linkedin-square text-info"></i>
                &nbsp;
                <i class="fa fa-lg fa-github"></i>
                &nbsp;
                <i class="fa fa-lg fa-telegram text-primary"></i>
                &nbsp;
                <i class="fa fa-lg fa-instagram text-danger"></i>
            </p>
        </div>
    </footer>
</div>
<script src="../../pack/js/jquery-1.11.1.min.js"></script>
<script src="../../pack/js/bootstrap.min.js"></script>
<script src="../../pack/js/bootstrap-datepicker.js"></script>
<script src="../../pack/js/custom.js"></script>
</body>
</html>
