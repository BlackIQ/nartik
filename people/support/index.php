<?php

session_start();

include("../../pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    if ($who == "support") {
        
    }
    else {
        header("Location: http://$serverip/NarTik/people/$who");
    }
}
else {
    header("Location: http://$serverip/NarTik/people/support/account");
}

include('action.php');

$company = $_SESSION["uid"];

if ($ansary[0] == true) {
    ?>
        <script>
            window.alert("پاسخ داده شد");
        </script>
    <?php
}

$server = "localhost";
$user = $dbuser;
$passwd = $dbpassword;
$db = $dbname;

$conn = mysqli_connect($server, $user, $passwd, $db);

$_pending = "SELECT * FROM people WHERE type='pending' AND uid = '$company' ORDER BY row DESC";
$_penresult = mysqli_query($conn, $_pending);

$_tickets = "SELECT * FROM tiks WHERE answer = 'ny' AND uid = '$company' ORDER BY row DESC";
$_tikresult = mysqli_query($conn, $_tickets);

$select_company = "SELECT * FROM admin WHERE uid = '$company'";
$rescompany = mysqli_query($connection, $select_company);

$get_nartik = "SELECT * FROM nartiks WHERE company = '$company'";
$tikres = mysqli_query($connection, $get_nartik);

if (mysqli_num_rows($rescompany) == 1) {
    $row = mysqli_fetch_assoc($rescompany);

    $company_name = $row["company"];
}

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('http://<?php echo $serverip; ?>/NarTik/pack/fonts/nazanin.TTF');
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
    <title>نارتیک - <?php echo $company_name; ?></title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/datepicker3.css" rel="stylesheet">
    <link href="http://<?php echo $serverip; ?>/NarTik/pack/css/styles.css" rel="stylesheet">
</head>
<body style="text-align: right;">
    <nav class="navbar bg-success navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../support">نارتیک</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-success" href="account/logout.php">
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
                <h1 class="page-header" dir="rtl">داشبورد شرکت <?php echo $company_name; ?></h1>
            </div>
        </div>
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
                            <div class="large">
                                <?php
                                    $guc = "SELECT count(*) as total FROM people WHERE type='user' AND uid = '$company'";
                                    $gucr = mysqli_query($conn, $guc);
                                    $gucrd = mysqli_fetch_assoc($gucr);
                                    echo $gucrd['total'];
                                ?>
                            </div>
                            <br>
                            <div class="text-muted">کاربران</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-user-plus color-orange"></em>
                            <div class="large">
                                <?php
                                    $gpc = "SELECT count(*) as total FROM people WHERE type='pending' AND uid = '$company'";
                                    $gpcr = mysqli_query($conn, $gpc);
                                    $gpcrd = mysqli_fetch_assoc($gpcr);
                                    echo $gpcrd['total'];
                                ?>
                            </div>
                            <br>
                            <div class="text-muted">در صف تایید</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-envelope color-teal"></em>
                            <div class="large">
                                <?php
                                    $gtc = "SELECT count(*) as total FROM tiks WHERE uid = '$company'";
                                    $gtcr = mysqli_query($conn, $gtc);
                                    $gtcrd = mysqli_fetch_assoc($gtcr);
                                    echo $gtcrd['total'];
                                ?>
                            </div>
                            <br>
                            <div class="text-muted">تمام تیکت ها</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-check text-success"></em>
                            <div class="large">
                                <?php
                                    $gac = "SELECT count(*) as total FROM tiks WHERE answer != 'ny' AND uid = '$company'";
                                    $gacr = mysqli_query($conn, $gac);
                                    $gacrd = mysqli_fetch_assoc($gacr);
                                    echo $gacrd['total'];
                                ?>
                            </div>
                            <br>
                            <div class="text-muted">تیکت های جواب داده شده</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        افراد در صف
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div style="text-align: center;">
                            <?php
                                if (mysqli_num_rows($_penresult) > 0) {
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td class=""><b>درخواست</b></td>
                                            <td class=""><b>نام کامل</b></td>
                                            <td class=""><b>شرکت</b></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($_rowser = mysqli_fetch_assoc($_penresult)) {
                                            ?>
                                            <tr>
                                                <td class=""><?php echo $_rowser['dt']; ?></td>
                                                <td class=""><a href="index.php?user=<?php echo $_rowser['id']; ?>"><?php echo $_rowser['firstname'] . " " . $_rowser['lastname']; ?></a></td>
                                                <td class=""><?php echo $_rowser['company']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                                else {
                                    echo "<h2 style='text-align: right;'>هنوز کسی در صف تایید نیست</h2>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        نمایش فرد
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <?php
                            include("review/user.php");
                            ?>
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
                                if (mysqli_num_rows($_tikresult) > 0) {
                                    ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td class=""><b>انقضا</b></td>
                                            <td class=""><b>موضوع</b></td>
                                            <td class=""><b>شرکت</b></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($_rowtik = mysqli_fetch_assoc($_tikresult)) {
                                            ?>
                                            <tr>
                                                <td class=""><?php echo $_rowtik['dl']; ?></td>
                                                <td class=""><b><a href="index.php?ticket=<?php echo $_rowtik['tikid']; ?>"><?php echo $_rowtik['title']; ?></a></b></td>
                                                <td class=""><?php echo $_rowtik['company']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                                else {
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
                            include("review/ticket.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" id="tikreview">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        نمایش تیکت شرکت
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                                <em class="fa fa-toggle-up"></em>
                            </span>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <?php include("review/nartik.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        تیکت های شرکت
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
                                        <td class=""><b>وضعیت</b></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($tiks = mysqli_fetch_assoc($tikres)) {
                                        ?>
                                        <tr>
                                            <td class=""><?php echo $tiks['dt']; ?></b></td>
                                            <td class=""><b><a href="index.php?ticket=<?php echo $tiks['tikid']; ?>#tikreview"><?php echo $tiks['title']; ?></a></b></td>
                                            <td class="">
                                                <?php
                                                if ($tiks['answer'] != "ny") {
                                                    echo "<i class='fa fa-check text-success'></i>";
                                                }
                                                else {
                                                    echo "<i class='fa fa-times text-danger'></i>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            else {
                                echo "<h2 style='text-align: right;'>در حال حاضر هیچ تیکت برای نمایش وحود ندارید</h2>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        تیکت جدید
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                                <em class="fa fa-toggle-up"></em>
                            </span>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <form class="" method="post" action="index.php">
                                <div class="form-group">
                                    <label for="title">موضوع تیکت</label>
                                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="موضوع تیکت">
                                </div>
                                <div class="form-group">
                                    <label for="des">توضیحات</label>
                                    <textarea type="text" class="form-control" rows="5" name="text" id="des" aria-describedby="des" placeholder="توضیحات"></textarea>
                                </div>
                                <button type="submit" name="sendtik" class="btn btn-success">ارسال تیکت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        افزودن شرکت جدید
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <form class="" method="post" action="index.php">
                                <div class="form-group">
                                    <label for="company">نام شرکت</label>
                                    <input type="text" class="form-control" id="company" name="company" aria-describedby="company" placeholder="نام شرکت">
                                </div>
                                <button type="submit" name="addcompany" class="btn btn-success">افزودن</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        طرف قرارداد ها
                        <span class="pull-right clickable panel-toggle panel-button-tab-left">
                            <em class="fa fa-toggle-up"></em>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div style="text-align: center;">
                            <?php
                            $get_all = "SELECT * FROM company WHERE uid = '$company'";
                            $res_all = mysqli_query($conn, $get_all);

                            if (mysqli_num_rows($res_all) > 0) {
                                ?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class=""><b>تیکت ها</b></td>
                                        <td class=""><b>در صف</b></td>
                                        <td class=""><b>کاربر ها</b></td>
                                        <td class=""><b>کد شرکت</b></td>
                                        <td class=""><b>شرکت</b></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res_all)) {
                                        $name = $row["name"];
                                        ?>
                                        <tr>
                                            <td class="">
                                                <?php
                                                $get_all_tikets = "SELECT count(*) as total FROM tiks WHERE company = '$name'";
                                                $gat = mysqli_query($conn, $get_all_tikets);
                                                $gatr = mysqli_fetch_assoc($gat);
                                                echo $gatr['total'];
                                                ?>
                                            </td>
                                            <td class="">
                                                <?php
                                                $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$name' AND type = 'pending'";
                                                $gap = mysqli_query($conn, $get_all_people);
                                                $gapr = mysqli_fetch_assoc($gap);
                                                echo $gapr['total'];
                                                ?>
                                            </td>
                                            <td class="">
                                                <?php
                                                $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$name' AND type = 'user'";
                                                $gap = mysqli_query($conn, $get_all_people);
                                                $gapr = mysqli_fetch_assoc($gap);
                                                echo $gapr['total'];
                                                ?>
                                            </td>
                                            <td class=""><?php echo $row['id']; ?></td>
                                            <td class=""><b><?php echo $row['name']; ?></b></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            else {
                                echo "<h2 style='text-align: right;'>شما هم اکنون با هیچ شرکتی قرارداد ندارید</h2>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="">
            <div class="container-fluid">
                <p class="back-link"><a class="text-success" href="../">NarTik</a></p>
                <p class="back-link">Created by <a class="text-success" href="https://www.github.com/BlackIQ">Amirhossein Mohammadi</a></p>
                <p class="back-link">Powered By <a class="text-success" href="https://www.linkedin.com/company/neotrinost">Neotrinost</a> <i class="fa fa-copyright"></i> <?php echo date("Y"); ?></p>
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
    <script src="http://<?php echo $serverip; ?>/NarTik/pack/js/jquery-1.11.1.min.js"></script>
    <script src="http://<?php echo $serverip; ?>/NarTik/pack/js/bootstrap.min.js"></script>
    <script src="http://<?php echo $serverip; ?>/NarTik/pack/js/bootstrap-datepicker.js"></script>
    <script src="http://<?php echo $serverip; ?>/NarTik/pack/js/custom.js"></script>
</body>
</html>
