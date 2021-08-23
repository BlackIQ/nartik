<?php

session_start();

include("../../pack/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    if ($who != "support") {
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
        window.location.replace("account.php")
    </script>
    <?php
}

include('action.php');

$company = $_SESSION["uid"];

$_pending = "SELECT * FROM people WHERE type='pending' AND uid = '$company' ORDER BY row DESC";
$_penresult = mysqli_query($connection, $_pending);

$_tickets = "SELECT * FROM tiks WHERE answer = 'ny' AND uid = '$company' ORDER BY row DESC";
$_tikresult = mysqli_query($connection, $_tickets);

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
            font-family: vazir;
            src: url("../../pack/fonts/vazir/Vazir.ttf");
            font-style: normal;
        }

        * {
            font-size: 13px;
            font-family: vazir, serif;
        }

        .main {
            padding: 56px;
            background: #f5f5f5;
            color: green;
        }
        .bar {
            padding: 1%;
        }
        .mnav {
            color: green;
        }

        textarea {
            resize: none;
            text-align: right;
        }

        input {
            text-align: right;
        }

        .dialog {
            color: green;
            padding: 3%;
            background: #f2f2f2;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 5px;
        }
        .one {
            border: solid 1px #ddd;
            padding: 2%;
            text-align: center;
            background: #eee;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نارتیک - <?php echo $company_name; ?></title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="text-align: right;">
    <nav class="mnav navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../">نارتیک</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div class="navbar-nav">
                    <a class="nav-link active" href="../../pack/logout.php"><i class="fa fa-sign-out"></i> خروج از حساب کاربری</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="main">
        <div class="bar">
            <div class="row">
                <div class="col-md-3 one">
                    <p><i class="fa fa-check"></i></p>
                    <?php
                    $guc = "SELECT count(*) as total FROM people WHERE type='user' AND uid = '$company'";
                    $gucr = mysqli_query($connection, $guc);
                    $gucrd = mysqli_fetch_assoc($gucr);
                    echo $gucrd['total'];
                    ?>
                    <br>
                    <div class="text-muted">کاربران</div>
                </div>

                <div class="col-md-3 one">
                    <p><i class="fa fa-users"></i></p>
                    <?php
                    $gpc = "SELECT count(*) as total FROM people WHERE type='pending' AND uid = '$company'";
                    $gpcr = mysqli_query($connection, $gpc);
                    $gpcrd = mysqli_fetch_assoc($gpcr);
                    echo $gpcrd['total'];
                    ?>
                    <br>
                    <div class="text-muted">افراد در صف</div>
                </div>

                <div class="col-md-3 one">
                    <p><i class="fa fa-envelope"></i></p>
                    <?php
                    $gtc = "SELECT count(*) as total FROM tiks WHERE uid = '$company'";
                    $gtcr = mysqli_query($connection, $gtc);
                    $gtcrd = mysqli_fetch_assoc($gtcr);
                    echo $gtcrd['total'];
                    ?>
                    <br>
                    <div class="text-muted">تمام تیکت ها</div>
                </div>

                <div class="col-md-3 one">
                    <p><i class="fa fa-check"></i></p>
                    <?php
                    $gac = "SELECT count(*) as total FROM tiks WHERE answer != 'ny' AND uid = '$company'";
                    $gacr = mysqli_query($connection, $gac);
                    $gacrd = mysqli_fetch_assoc($gacr);
                    echo $gacrd['total'];
                    ?>
                    <br>
                    <div class="text-muted">تیکت های جواب داده شده</div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">افراد در صف</h4>
                    <hr>
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
                                echo "<p style='text-align: right;'>شخصی در صف تایید نیست</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">نمایش فرد</h4>
                    <hr>
                    <div class="">
                        <?php

                        if (count($prop) > 0) {
                            if ($prop[0] == false) {
                                echo '<p>شخص پیدا نشد</p>';
                            }
                            else {
                                ?>
                                <div>
                                    <h2><?php echo $prop[0]['firstname'] . "&nbsp;" . $prop[0]['lastname'] ?></h2>
                                    <h5><?php echo $prop[0]['id']; ?> کد ملی</h5>
                                    <hr>
                                    <h4><?php echo $prop[0]['company']; ?> شرکت</h4>
                                    <br>
                                    <h4><?php echo $prop[0]['phone']; ?> شماره همراه</h4>
                                    <h4><?php echo $prop[0]['email']; ?> ایمیل</h4>
                                    <br>
                                    <p><?php echo $prop[0]['dt']; ?> ارسال شده در</p>
                                    <br>
                                    <button class="btn btn-success"><a style="color: white;" href="index.php?confirm=<?php echo $prop[0]['id']; ?>">تایید فرد</a></button>
                                    &nbsp;
                                    <button class="btn btn-danger"><a style="color: white;" href="index.php?reject=<?php echo $prop[0]['id']; ?>">رد کردن درخواست</a></button>
                                    &nbsp;
                                    <button class="btn btn-defult"><a style="color: black;" href="index.php">خروج</a></button>
                                </div>
                                <?php
                            }
                        }
                        else {
                            echo '<p>یک شخص را برای نمایش انتخاب کنید</p>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">تیکت ها</h4>
                    <hr>
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
                                echo "<p style='text-align: right;'>تیکت جدیدی یافت نشد</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">نمایش تیکت</h4>
                    <hr>
                    <div class="">
                        <?php

                        if (count($tik) > 0) {
                            if ($tik[0] == false) {
                                echo '<p>تیکت پیدا نشد</p>';
                            }
                            else {
                                $person = $tik[0]['userid'];
                                $getname = "SELECT * FROM people WHERE id = '$person'";
                                if ($result = mysqli_query($connection, $getname)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $name = $row['firstname'] . " " . $row["lastname"];
                                        }
                                    }
                                }

                                ?>
                                <div>
                                    <h2 dir="rtl" id="exp"></h2>
                                    <hr>
                                    <h3><b><?php echo $tik[0]['title']; ?></b></h3>
                                    <h3><?php echo $tik[0]['explane']; ?></h3>
                                    <br>
                                    <h4><?php echo $company; ?></h4>
                                    <h4><?php echo $name; ?></h4>
                                    <br>
                                    <p><?php echo $tik[0]['dt']; ?> ارسال شده در</p>
                                    <p><?php echo $tik[0]['dl']; ?> اتمام در</p>
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

                                    <script>
                                        // Set the date we're counting down to
                                        var countDownDate = new Date("<?php echo $tik[0]['dl']; ?>").getTime();

                                        // Update the count down every 1 second
                                        var x = setInterval(function() {

                                            // Get today's date and time
                                            var now = new Date().getTime();

                                            // Find the distance between now and the count down date
                                            var distance = countDownDate - now;

                                            // Time calculations for days, hours, minutes and seconds
                                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                            // Display the result in the element with id="demo"
                                            document.getElementById("exp").innerHTML = hours + " ساعت " + minutes + " دقیقه " + seconds + " ثانیه ";

                                            // If the count down is finished, write some text
                                            if (distance < 0) {
                                                clearInterval(x);
                                                document.getElementById("exp").innerHTML = "تمام شده است";
                                            }
                                        }, 1000);
                                    </script>
                                </div>
                                <?php
                            }
                        }
                        else {
                            echo '<p>یک تیکت را برای نمایش انتخاب کنید</p>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="dialog">
                    <h4 class="head">نمایش تیکت شرکت</h4>
                    <hr>
                    <div class="">
                        <?php

                        if (count($com_tik) > 0) {
                            if ($com_tik[0] == false) {
                                echo '<p>تیکت پیدا نشد</p>';
                            }
                            else {
                                ?>
                                <div>
                                    <b><?php echo $com_tik[0]['tikid']; ?></b>
                                    <hr>
                                    <h3><b><?php echo $com_tik[0]['title']; ?></b></h3>
                                    <h3><?php echo $com_tik[0]['explane']; ?></h3>
                                    <br>
                                    <p><?php echo $com_tik[0]['dt'] . "&nbsp;"; ?>ارسال شده در</p>
                                    <hr>
                                    <h3>پاسخ</h3>
                                    <p>
                                        <?php
                                        if ($com_tik[0]['answer'] == 'ny') {
                                            echo 'هنوز به این تیکت پاسخی داده نشده است.<br>لطفا شکیبا باشید.';
                                        }
                                        else {
                                            echo $com_tik[0]['answer'];
                                        }
                                        ?>
                                    </p>
                                    <hr>
                                    <button class="btn btn-defult"><a style="color: black;" href="index.php">بستن تیکت</a></button>
                                </div>
                                <?php
                            }
                        }
                        else {
                            echo '<p>یک تیکت را انتخاب کنید</p>';
                        }

                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h4 class="head">تیکت های شرکت</h4>
                    <hr>
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
                                        <td class=""><b><a href="index.php?comtik=<?php echo $tiks['tikid']; ?>#tikreview"><?php echo $tiks['title']; ?></a></b></td>
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
                            echo "<p style='text-align: right;'>در حال حاضر هیچ تیکت برای نمایش وحود ندارید</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h4 class="head">تیکت جدید</h4>
                    <hr>
                    <div class="">
                        <?php

                        if (count($send) > 0) {
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?php
                                foreach ($send as $error) {
                                    echo '<h4>' . $error . '</h4>';
                                }
                                ?>
                            </div>
                            <?php
                        }

                        ?>
                        <div class="">
                            <form class="" method="post" action="index.php">
                                <label class="form-label" for="title">موضوع تیکت</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="موضوع تیکت">
                                <br>
                                <label class="form-label" for="des">توضیحات</label>
                                <textarea class="form-control" rows="5" name="text" id="des" aria-describedby="des" placeholder="توضیحات"></textarea>
                                <br>
                                <button type="submit" name="sendtik" class="btn btn-success">ارسال تیکت</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">افزودن شرکت جدید</h4>
                    <hr>
                    <div>
                        <form class="" method="post" action="index.php">
                            <label class="form-label" for="company">نام شرکت</label>
                            <input type="text" class="form-control" id="company" name="company" aria-describedby="company" placeholder="نام شرکت">
                            <br>
                            <button type="submit" name="addcompany" class="btn btn-success">افزودن</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">طرف قرارداد ها</h4>
                    <hr>
                    <div style="text-align: center;">
                        <?php
                        $get_all = "SELECT * FROM company WHERE uid = '$company'";
                        $res_all = mysqli_query($connection, $get_all);

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
                                            $gat = mysqli_query($connection, $get_all_tikets);
                                            $gatr = mysqli_fetch_assoc($gat);
                                            echo $gatr['total'];
                                            ?>
                                        </td>
                                        <td class="">
                                            <?php
                                            $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$name' AND type = 'pending'";
                                            $gap = mysqli_query($connection, $get_all_people);
                                            $gapr = mysqli_fetch_assoc($gap);
                                            echo $gapr['total'];
                                            ?>
                                        </td>
                                        <td class="">
                                            <?php
                                            $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$name' AND type = 'user'";
                                            $gap = mysqli_query($connection, $get_all_people);
                                            $gapr = mysqli_fetch_assoc($gap);
                                            echo $gapr['total'];
                                            ?>
                                        </td>
                                        <td class=""><?php echo $row['id']; ?></td>
                                        <td class=""><b><?php echo $row['company']; ?></b></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
</body>
</html>
