<?php

session_start();

include("../../pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    if ($who == "admin") {

    }
    else {
        header("Location: http://$serverip/NarTik/people/$who");
    }
}
else {
    header("Location: http://$serverip/NarTik/people/admin/account");
}

include('action.php');

$server = "localhost";
$user = $dbuser;
$passwd = $dbpassword;
$db = $dbname;

$conn = mysqli_connect($server, $user, $passwd, $db);

$get_nartik = "SELECT * FROM nartiks WHERE answer = 'ny'";
$tikres = mysqli_query($conn, $get_nartik);

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
    <title>نارتیک - ادمین</title>
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
            <h1 class="page-header" dir="rtl">داشبورد ادمین</h1>
        </div>
    </div>
    <div class="panel panel-container">

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
                                        <td class=""><b><a href="index.php?ticket=<?php echo $_rowtik['tikid']; ?>"><?php echo $_rowtik['title']; ?></a></b></td>
                                        <td class=""><?php echo $com; ?></td>
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
