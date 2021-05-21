<?php

session_start();

include('action.php');

if ($ansary[0] == true) {
    ?>
        <script>
            window.alert("پاسخ داده شد");
        </script>
    <?php
}

$server = "localhost";
$user = "narbon";
$passwd = "narbon";
$db = "nartik";

$conn = mysqli_connect($server, $user, $passwd, $db);

$mail = $_SESSION['email'];

$getdata = "SELECT * FROM admin WHERE email = '$mail'";
$resdata = mysqli_query($connection, $getdata);

if (mysqli_num_rows($resdata) > 0) {
    while ($row = mysqli_fetch_assoc($resdata)) {
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $phone = $row['phone'];
        $email = $row['email'];
        $username = $row['username'];
        $userid = $row['userid'];
    }
}

$_pending = "SELECT * FROM people WHERE type='pending'";
$_penresult = mysqli_query($conn, $_pending);

$_tickets = "SELECT * FROM tiks WHERE answer = 'ny' ORDER BY row DESC";
$_tikresult = mysqli_query($conn, $_tickets);

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('http://127.0.0.1/NarTik/pack/nazanin.TTF');
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
    <title>نارفیرم - داشبورد</title>
    <link href="http://127.0.0.1/NarTik/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/datepicker3.css" rel="stylesheet">
    <link href="http://127.0.0.1/NarTik/pack/css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://127.0.0.1/NarTik/pack/js/html5shiv.js"></script>
    <script src="http://127.0.0.1/NarTik/pack/js/respond.min.js"></script>
    <![endif]-->
</head>
<body style="text-align: right;">
    
    <nav class="navbar bg-success navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../support">نارتیک</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-success" href="../account/logout.php">
                            <em class="fa fa-sign-out"></em>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<div class="col-sm-offset-0 col-lg-offset-0 col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href=".">
                <em class="fa fa-home text-success"></em>
            </a></li>
            <li class="active">داشبورد</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">داشبورد</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
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
                        <div class="text-muted">کاربران</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-user-plus color-orange"></em>
                        <div class="large">
                            <?php
                                $gpc = "SELECT count(*) as total FROM people WHERE type='pending'";
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
                                $gtc = "SELECT count(*) as total FROM tiks";
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
                                $gac = "SELECT count(*) as total FROM tiks where answer != 'ny'";
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
                                echo "<h2>هنوز کسی در صف تایید نیست</h2>";
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
                                echo "<h2>تیکت جدیدی یافت نشد</h2>";
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
            <p class="back-link"><a class="text-success" href="../">NarFirm</a></p>
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
    
</div>    <!--/.main-->

<script src="http://127.0.0.1/NarTik/pack/js/jquery-1.11.1.min.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/bootstrap.min.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/chart.min.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/chart-data.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/easypiechart.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/easypiechart-data.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/bootstrap-datepicker.js"></script>
<script src="http://127.0.0.1/NarTik/pack/js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>
