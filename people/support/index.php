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

$_pending = "SELECT * FROM people WHERE type='pending' ORDER BY row DESC";
$_penresult = mysqli_query($connection, $_pending);

$_tickets = "SELECT * FROM tiks WHERE answer = 'ny' ORDER BY row DESC";
$_tikresult = mysqli_query($connection, $_tickets);

$get_nartik = "SELECT * FROM nartiks WHERE company = '$company'";
$tikres = mysqli_query($connection, $get_nartik);

function get_company($company_id, $conection) {
    $get_company_q = "SELECT * FROM company WHERE id = '$company_id'";
    $get_company_r = mysqli_query($conection, $get_company_q);
    $row_company = mysqli_fetch_assoc($get_company_r);
    return $row_company["name"];
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
            padding: 5%;
            background: #f6f6f6;
        }

        .bar {
            padding: 1%;
        }

        textarea {
            resize: none;
            text-align: right;
        }

        input {
            text-align: right;
        }

        .link {
            text-decoration: none;
        }

        .dialog {
            padding: 3%;
            /*border: solid 1px green;*/
            border-radius: 0px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            background: white;
        }

        .dialog .head {
            color: green;
        }

        .dialog hr {
            border: solid 1px green;
        }

        .dialog .inp {
            border-color: green;
        }

        .dialog .tbl {
            border-color: green;
        }

        .one {
            background: white;
            padding: 2%;
            text-align: center;
            color: green;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نارتیک - پشتیبان</title>
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
                    $guc = "SELECT count(*) as total FROM people WHERE type='user'";
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
                    $gpc = "SELECT count(*) as total FROM people WHERE type='pending'";
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
                    $gtc = "SELECT count(*) as total FROM tiks";
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
                    $gac = "SELECT count(*) as total FROM tiks WHERE answer != 'ny'";
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
                                <table class="table table-bordered table-hover inp">
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
                                            <td class=""><a class="link" href="index.php?user=<?php echo $_rowser['id']; ?>"><?php echo $_rowser['firstname'] . " " . $_rowser['lastname']; ?></a></td>
                                            <td class=""><?php echo get_company($_rowser['company'], $connection); ?></td>
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
                                    <h4><?php echo get_company($prop[0]['company'], $connection); ?> شرکت</h4>
                                    <br>
                                    <h4><?php echo $prop[0]['phone']; ?> شماره همراه</h4>
                                    <h4><?php echo $prop[0]['email']; ?> ایمیل</h4>
                                    <br>
                                    <p><?php echo $prop[0]['dt']; ?> ارسال شده در</p>
                                    <br>
                                    <button class="btn btn-success"><a class="link" style="color: white;" href="index.php?confirm=<?php echo $prop[0]['id']; ?>">تایید فرد</a></button>
                                    &nbsp;
                                    <button class="btn btn-danger"><a class="link" style="color: white;" href="index.php?reject=<?php echo $prop[0]['id']; ?>">رد کردن درخواست</a></button>
                                    &nbsp;
                                    <button class="btn btn-secondary"><a class="link" style="color: white;" href="index.php">خروج</a></button>
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
                                <table class="table table-bordered table-hover tbl">
                                    <thead>
                                    <tr>
                                        <td class=""><b>موضوع</b></td>
                                        <td class=""><b>شرکت</b></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($_rowtik = mysqli_fetch_assoc($_tikresult)) {
                                        ?>
                                        <tr>
                                            <td class=""><b><a class="link" href="index.php?ticket=<?php echo $_rowtik['tikid']; ?>"><?php echo $_rowtik['title']; ?></a></b></td>
                                            <td class=""><?php echo get_company($_rowtik['company'], $connection); ?></td>
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
                                    <h3><?php echo $tik[0]['title']; ?></h3>
                                    <p>
                                        <?php echo $tik[0]['explane']; ?>
                                    </p>
                                    <br>
                                    <p><?php echo $name; ?></p>
                                    <br>
                                    <p><?php echo $tik[0]['dt']; ?> ارسال شده در</p>
                                    <p><?php echo $tik[0]['tikid']; ?> شماره تیکت</p>
                                    <hr>
                                    <h4>پاسخ دادن به این تیکت</h4>
                                    <br>
                                    <div>
                                        <form method="post" action="index.php">
                                            <div>
                                                <input class="form-control inp" name="answer" type="text" placeholder="جواب">
                                                <br>
                                                <button name="ans" class="btn btn-success">ارسال جواب</button>
                                                &nbsp;
                                                <button class="btn btn-danger" type="reset"><span style="color: white;">ریست کردن</span></button>
                                                &nbsp;
                                                <button class="btn btn-secondary"><a class="link" style="color: white;" href="index.php">خروج</a></button>
                                            </div>
                                        </form>
                                    </div>
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
            <div class="col-md-6">
                <div class="dialog">
                    <h4 class="head">افزودن شرکت جدید</h4>
                    <hr>
                    <div>
                        <form class="" method="post" action="index.php">
                            <label class="form-label" for="company">نام شرکت</label>
                            <input type="text" class="form-control inp" id="company" name="company" aria-describedby="company" placeholder="نام شرکت">
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
                        $get_all = "SELECT * FROM company";
                        $res_all = mysqli_query($connection, $get_all);

                        if (mysqli_num_rows($res_all) > 0) {
                            ?>
                            <table class="table table-bordered table-hover tbl">
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
                                    $com = $row["id"];
                                    ?>
                                    <tr>
                                        <td class="">
                                            <?php
                                            $get_all_tikets = "SELECT count(*) as total FROM tiks WHERE company = '$com'";
                                            $gat = mysqli_query($connection, $get_all_tikets);
                                            $gatr = mysqli_fetch_assoc($gat);
                                            echo $gatr['total'];
                                            ?>
                                        </td>
                                        <td class="">
                                            <?php
                                            $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$com' AND type = 'pending'";
                                            $gap = mysqli_query($connection, $get_all_people);
                                            $gapr = mysqli_fetch_assoc($gap);
                                            echo $gapr['total'];
                                            ?>
                                        </td>
                                        <td class="">
                                            <?php
                                            $get_all_people = "SELECT count(*) as total FROM people WHERE company = '$com' AND type = 'user'";
                                            $gap = mysqli_query($connection, $get_all_people);
                                            $gapr = mysqli_fetch_assoc($gap);
                                            echo $gapr['total'];
                                            ?>
                                        </td>
                                        <td class=""><?php echo $com; ?></td>
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
                            echo "<p style='text-align: right;'>شما هم اکنون با هیچ شرکتی قرارداد ندارید</p>";
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
