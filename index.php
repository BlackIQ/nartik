<?php

include("action.php");

session_start();

// MySQL Data
$mysqlserver = "localhost";
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

// Create Connection
$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

if ($_SESSION['status'] == true) {
    $id = $_SESSION['id'];

    $getdata = "SELECT * FROM people WHERE type='user' AND id='$id'";
    $ressult = mysqli_query($connection, $getdata);

    if (mysqli_num_rows($ressult) > 0) {
        while ($row = mysqli_fetch_assoc($ressult)) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $username = $row['username'];
            $userid = $row['id'];
            $company = $row['company'];
        }
    }

    $gettiks = "SELECT * FROM tiks WHERE userid = '$userid' ORDER BY row DESC";
    $tikres = mysqli_query($connection, $gettiks);
}
else {
    header("Location: http://office.narbon.ir:4488/NarTik/account");
}


?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @font-face {
            font-family: 'nazanin';
            src: url('../nazanin.TTF');
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
    <title>نارتیک - داشبورد</title>
    <link href="http://office.narbon.ir:4488/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://office.narbon.ir:4488/pack/css/datepicker3.css" rel="stylesheet">
    <link href="http://office.narbon.ir:4488/pack/css/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>


    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
</head>
<body style="text-align: right;">
    
    <nav class="navbar bg-info navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href=".">نارتیک</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="modal" data-target=".bd-example-modal-sm">
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
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">داشبود</li>
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
                    <div class="row no-padding"><em class="fa fa-xl fa-bank color-blue"></em>
                        <div class="large"><?php echo $company; ?></div>
                        <br>
                        <div class="text-muted">شرکت</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-envelope color-orange"></em>
                        <div class="large">
                            <?php
                                $gtc = "SELECT count(*) as total FROM tiks WHERE userid = '$userid'";
                                $gtcr = mysqli_query($connection, $gtc);
                                $gtcrd = mysqli_fetch_assoc($gtcr);
                                echo $gtcrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تیکت های ارسال شده</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-times color-red"></em>
                        <div class="large">
                            <?php
                                $gtnc = "SELECT count(*) as total FROM tiks WHERE userid='$userid' AND answer='ny'";
                                $gtncr = mysqli_query($connection, $gtnc);
                                $gtncrd = mysqli_fetch_assoc($gtncr);
                                echo $gtncrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تیکت های جواب گرفته نشده</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-check text-success"></em>
                        <div class="large">
                            <?php
                                echo $gtcrd['total'] - $gtncrd['total'];
                            ?>
                        </div>
                        <br>
                        <div class="text-muted">تیکت های جواب گرفته</div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4" id="tikreview">
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
                        include("alerts/ticket.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    تیکت های من
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
                    <div>
                        <?php include("alerts/send.php"); ?>
                    </div>
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
                            <div class="form-group">
                                <label for="record">همراه با تیکت صدای خود را نیز برای ما ارسال کنید</label>
                                <p class="text-primary">کلیک کنید تا شروع به صبط صدا شود <i class="fa fa-microphone"></i></p>
                            </div>
                            <button type="submit" name="sendtik" class="btn btn-primary">ارسال تیکت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    پروفایل
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div style="text-align: right;">
                        <div>
                            <h3 class="text-success"><?php echo $fname . "&nbsp;" . $lname;?> <i class="fa fa-user"></i></h3>
                            <h3 class="text-info"><?php echo $company;?> <i class="fa fa-bank"></i></h3>
                            <hr>
                            <p class="text-info"><?php echo $username;?> <i class="fa fa-user"></i></p>
                            <p class="text-muted"><?php echo $userid;?> <i class="fa fa-id-card"></i></p>
                            <br>
                            <p class="text-primary"><?php echo $email;?> <i class="fa fa-at"></i></p>
                            <p class="text-warning"><?php echo $phone; ?> <i class="fa fa-phone"></i></p>
                        </div>
                        <hr>
                        <div>
                            <p><a class="text-danger" data-toggle="modal" data-target=".bd-example-modal-sm">خروج از حساب کاربری <i class="fa fa-sign-out"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    تنظیمات
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="">
                        <h3>تنظیمات پروفایل</h3>
                        <br>
                        <div>
                            <div class="form-group">
                                <form method="post" action="index.php">
                                    <input type="text" name="username" class="form-control" placeholder="<?php echo $username;?> نام کاربری کنونی شما" required>
                                    <br>
                                    <button type="submit" name="usernameupdate" class="btn btn-primary btn-sm">تغییر نام کاربری</button>
                                </form>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form method="post" action="index.php">
                                            <input type="email" name="mail" class="form-control" placeholder="<?php echo $email;?> ایمیل کنونی شما" required>
                                            <br>
                                            <button type="submit" name="emailupdate" class="btn btn-primary btn-sm">تغییر ایمیل</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form action="index.php" method="post">
                                            <input type="text" name="phone" class="form-control" placeholder="<?php echo $phone;?> شماره همراه کنونی شما" required>
                                            <br>
                                            <button type="submit" name="phoneupdate" class="btn btn-primary btn-sm">تغییر شماره همراه</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <hr>
                        </div>
                        <h3>تغییر رمز</h3>
                        <br>
                        <form method="post" action="index.php" class="">
                            <div class="form-group">
                                <input type="password" name="curpass" class="form-control" placeholder="رمز کنونی">
                                <small>رمز<b> کنونی خود </b> را ورد کنید</small>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="conpass" class="form-control" placeholder="تایید رمز جدید">
                                        <small>رمر<b> جدید خود </b> را دوباره تکرار کنید</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="newpass" class="form-control" placeholder="رمز جدید">
                                        <small>رمز<b> حدید خود </b> را وار کنید</small>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="upass" class="btn btn-primary">تغییر رمز</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <footer class="">
        <div class="container-fluid">
            <p class="back-link"><a href=".">NarTik</a></p>
            <p class="back-link">Created by <a href="https://www.github.com/BlackIQ">Amirhossein Mohammadi</a></p>
            <p class="back-link">Powered By <a href="https://www.linkedin.com/company/neotrinost">Neotrinost</a> <i class="fa fa-copyright"></i> <?php echo date("Y"); ?></p>
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

<script src="http://office.narbon.ir:4488/pack/js/jquery-1.11.1.min.js"></script>
<script src="http://office.narbon.ir:4488/pack/js/bootstrap.min.js"></script>
<!--<script src="http://office.narbon.ir:4488/pack/js/chart.min.js"></script>-->
<!--<script src="http://office.narbon.ir:4488/pack/js/chart-data.js"></script>-->
<!--<script src="http://office.narbon.ir:4488/pack/js/easypiechart.js"></script>-->
<!--<script src="http://office.narbon.ir:4488/pack/js/easypiechart-data.js"></script>-->
<!--<script src="http://office.narbon.ir:4488/pack/js/bootstrap-datepicker.js"></script>-->
<script src="http://office.narbon.ir:4488/pack/js/custom.js"></script>
<!--<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>-->

</body>
</html>

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="float: left;" class="modal-title text-danger" id="exampleModalLongTitle">خروج از حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h1><i class="fa fa-sign-out text-danger"></i></h1>
                <br>
                <h3 class="text-danger">آیا شما میخواهید از حسابتان خارج شوید</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span style="color: black;">بستن</span></button>
                <button type="button" class="btn btn-danger"><a class="text-white" href="account/logout.php"><span style="color: white;">حروج</span></a></button>
            </div>
        </div>
    </div>
</div>
