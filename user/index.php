<?php

session_start();

// Nartik configuration
include("../../pack/configs/config.php");

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    if ($who != "user") {
        ?>
        <script>
            window.location.replace("../<?php echo $who; ?>")
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location.replace("account.php")
    </script>
    <?php
}

include("action.php");

$id = $_SESSION['id'];

$getdata = "SELECT * FROM people WHERE type='user' AND id='$id'";
$ressult = mysqli_query($connection, $getdata);
$row = mysqli_fetch_assoc($ressult);

$fname = $row['firstname'];
$lname = $row['lastname'];
$phone = $row['phone'];
$email = $row['email'];
$username = $row['username'];
$userid = $row['id'];
$company = $row['company'];
$uid = $row["uid"];

$gettiks = "SELECT * FROM tiks WHERE userid = '$userid' ORDER BY row DESC";
$tikres = mysqli_query($connection, $gettiks);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نارتیک - داشبورد</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="../../pack/css/main.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="text-align: right;">
<nav class="mnav navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="..">نارتیک</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div class="navbar-nav">
                <a class="nav-link active" href="../people/logout.php"><i class="fa fa-sign-out"></i> خروج از حساب کاربری</a>
            </div>
        </div>
    </div>
</nav>
<div class="main">
    <div class="bar">
        <div class="row">
            <div class="col-md-3 one">
                <p><i class="fa fa-bank"></i></p>
                <?php echo $company; ?>
                <br>
                <div class="text-muted">شرکت</div>
            </div>
            <div class="col-md-3 one">
                <p><i class="fa fa-paper-plane-o"></i></p>
                <?php
                $gtc = "SELECT count(*) as total FROM tiks WHERE userid = '$userid'";
                $gtcr = mysqli_query($connection, $gtc);
                $gtcrd = mysqli_fetch_assoc($gtcr);
                echo $gtcrd['total'];
                ?>
                <br>
                <div class="text-muted">تیکت های ارسال شده</div>
            </div>
            <div class="col-md-3 one">
                <p><i class="fa fa-times"></i></p>
                <?php
                $gtnc = "SELECT count(*) as total FROM tiks WHERE userid='$userid' AND answer='ny'";
                $gtncr = mysqli_query($connection, $gtnc);
                $gtncrd = mysqli_fetch_assoc($gtncr);
                echo $gtncrd['total'];
                ?>
                <br>
                <div class="text-muted">تیکت های جواب گرفته نشده</div>
            </div>
            <div class="col-md-3 one">
                <p><i class="fa fa-check"></i></p>
                <?php
                echo $gtcrd['total'] - $gtncrd['total'];
                ?>
                <br>
                <div class="text-muted">تیکت های جواب گرفته</div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="dialog">
                <h4 class="head">نمایش تیکت</h4>
                <hr>
                <div class="">
                    <?php

                    if (count($tik) > 0) {
                        if ($tik[0] == false) {
                            echo '<p>تیکت پیدا نشد</p>';
                        } else {
                            ?>
                            <div>
                                <b><?php echo $tik[0]['tikid']; ?></b>
                                <hr>
                                <h3><b><?php echo $tik[0]['title']; ?></b></h3>
                                <h3><?php echo $tik[0]['explane']; ?></h3>
                                <br>
                                <p><?php echo $tik[0]['dt'] . "&nbsp;"; ?>ارسال شده در</p>
                                <hr>
                                <h3>پاسخ</h3>
                                <p>
                                    <?php
                                    if ($tik[0]['answer'] == 'ny') {
                                        echo 'هنوز به این تیکت پاسخی داده نشده است.<br>لطفا شکیبا باشید.';
                                    } else {
                                        echo $tik[0]['answer'];
                                    }
                                    ?>
                                </p>
                                <hr>
                                <button class="btn btn-sm btn-primary">
                                    <a class="link" style="color: white;" href="index.php">
                                        بستن تیکت
                                    </a>
                                </button>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p>یک تیکت را انتخاب کنید</p>';
                    }

                    ?>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-4">
            <div class="dialog">
                <h4 class="head">تیکت های من</h4>
                <hr>
                <div style="text-align: center;">
                    <?php
                    if (mysqli_num_rows($tikres) > 0) {
                        ?>
                        <table class="table table-bordered tbl">
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
                                    <td class="">
                                        <b>
                                            <a class="link" href="index.php?ticket=<?php echo $tiks['tikid']; ?>#tikreview">
                                                <?php echo $tiks['title']; ?>
                                            </a>
                                        </b>
                                    </td>
                                    <td class="">
                                        <?php
                                        if ($tiks['answer'] != "ny") {
                                            echo "<i class='fa fa-check text-success'></i>";
                                        } else {
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
                    } else {
                        echo "<p style='text-align: right;'>در حال حاضر هیچ تیکت برای نمایش وحود ندارید</p>";
                    }
                    ?>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-4">
            <div class="dialog">
                <h4 class="head">تیکت جدید</h4>
                <hr>
                <div>
                    <?php

                    if (count($send) > 0) {
                        ?>
                        <div class="alert alert-info" role="alert">
                            <?php
                            foreach ($send as $error) {
                                echo '<p>' . $error . '</p>';
                            }
                            ?>
                        </div>
                        <?php
                    }

                    ?>
                </div>
                <div class="">
                    <form class="" method="post" action="index.php">
                        <label class="form-label" for="title">موضوع تیکت</label>
                        <input type="text" class="form-control inp" id="title" name="title" aria-describedby="title"
                               placeholder="موضوع تیکت">
                        <br>
                        <label class="form-label" for="des">توضیحات</label>
                        <textarea type="text" class="form-control inp" rows="5" name="text" id="des"
                                  aria-describedby="des" placeholder="توضیحات"></textarea>
                        <br>
                        <button type="submit" name="sendtik" class="btn btn-primary">ارسال تیکت</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="dialog">
                <h4 class="head">پروفایل</h4>
                <hr>
                <div>
                    <div>
                        <h3 class="text-success"><?php echo $fname . "&nbsp;" . $lname; ?> <i
                                    class="fa fa-user"></i></h3>
                        <h3 class="text-info"><?php echo $company; ?> <i class="fa fa-bank"></i></h3>
                        <hr>
                        <p class="text-info"><?php echo $username; ?> <i class="fa fa-user"></i></p>
                        <p class="text-muted"><?php echo $userid; ?> <i class="fa fa-id-card"></i></p>
                        <br>
                        <p class="text-primary"><?php echo $email; ?> <i class="fa fa-at"></i></p>
                        <p class="text-warning"><?php echo $phone; ?> <i class="fa fa-phone"></i></p>
                    </div>
                    <hr>
                    <div>
                        <p>
                            <a class="text-danger link" href="../people/logout.php">
                                خروج از حساب کاربری
                                <i class="fa fa-sign-out"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-6">
            <div class="dialog">
                <h4 class="head">تنظیمات</h4>
                <hr>
                <div class="">
                    <h5>تغییر رمز</h5>
                    <br>
                    <form method="post" action="index.php" class="">
                        <div class="">
                            <input type="password" name="curpass" class="form-control inp" placeholder="رمز کنونی">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="password" name="conpass" class="form-control inp"
                                        placeholder="تایید رمز جدید">
                                <br>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="newpass" class="form-control inp"
                                        placeholder="رمز جدید">
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="upass" class="btn btn-primary">تغییر رمز</button>
                    </form>
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