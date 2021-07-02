<?php

session_start();

if ($_SESSION['status'] == true) {
    $who = $_SESSION['who'];
    ?>
    <script>
        window.location.replace("../../<?php echo $who; ?>")
    </script>
    <?php
}

$errors = array();

include("../../../pack/config.php");
$mysqlserver = $ip;
$mysqluser = "narbon";
$mysqlpassword = "narbon";
$mysqldatabase = "nartik";

$connection = mysqli_connect($mysqlserver, $mysqluser, $mysqlpassword, $mysqldatabase);

if (isset($_POST['login_user'])) {
    $eid = mysqli_real_escape_string($connection, $_POST['eid']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $company = mysqli_real_escape_string($connection, $_POST['company']);

    if (empty($eid)) {
        array_push($errors, "کد ورود الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }
    if (empty($company)) {
        array_push($errors, "شرکت الزامیست");
    }

    if (count($errors) == 0) {
        $select_company = "SELECT * FROM admin WHERE uid = '$company'";
        $rescompany = mysqli_query($connection, $select_company);

        if (mysqli_num_rows($rescompany) == 1) {
            $row = mysqli_fetch_assoc($rescompany);

            $company_name = $row["company"];
        }

        $query = "SELECT * FROM admin WHERE id = '$eid' AND password = '$password' AND company = '$company_name'";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['eid'] = $eid;
            $_SESSION["who"] = "support";
            $_SESSION["uid"] = $company;
            $_SESSION['company'] = $company_name;
            ?>
            <script>
                window.location.replace("../")
            </script>
            <?php
        }
        else {
            array_push($errors, "ایمیل با رمز اشتباه است");
        }
    }
}

if (isset($_GET['logout'])) {
    $logout = $_GET['logout'];
    if ($logout == true) {
        session_destroy();
        ?>
        <script>
            window.location.replace("../../../")
        </script>
        <?php
    }
}

$getc = "SELECT * FROM admin";
$resc = mysqli_query($connection, $getc);

?>

<!doctype html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
        <title>Login</title>
        <style>
            @font-face {
                font-family: 'nazanin';
                src: url('../../../pack/fonts/nazanin.TTF');
                font-style: normal;
            }
            body {
                padding: 56px;
                font-family: 'nazanin';
            }
            * {
                color: darkgreen;
            }
            .login {
                border: solid 1px darkgreen;
                border-radius: 10px;
                padding: 20px;
            }
        </style>
    </head>
    <body class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="login">
                        <h1 class="display-6 text-success">ورود به حساب</h1>
                        <hr class="border-success border">
                        <br>
                        <form action="index.php" method="post">
                            <?php  if (count($errors) > 0) : ?>
                                <div class="alert alert-danger border-danger" role="alert">
                                    <?php foreach ($errors as $error) : ?>
                                        <h4 style="color: red;"><?php echo $error ?></h4>
                                    <?php endforeach ?>
                                </div>
                                <br>
                            <?php  endif ?>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="eid" class="form-control bg-white border-success text-success" placeholder="کد ورودی"
                                           aria-label="کد ورود">
                                    <br>
                                    <input type="password" name="password" class="form-control bg-white border-success text-success"
                                           placeholder="رمز حساب" aria-label="رمز جساب">
                                </div>
                                <div>
                                    <br>
                                    <select name="company" class="form-control bg-white border-success text-success">
                                        <option selected>انتخاب شرکت</option>
                                        <?php
                                            if (mysqli_num_rows($resc) > 0) {
                                                while ($row = mysqli_fetch_assoc($resc)) {
                                                    ?>
                                                        <option class="text-success" value="<?php echo $row["uid"]; ?>"><?php echo $row["company"]; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="login_user" class="btn btn-success text-white">ورود</button>
                        </form>
                        <br>
                        <hr class="border-success border">
                        <div>
                            <p><a class="text-success" style="text-decoration: none;" href="../../../"><i class="fa fa-home"></i> برگشت به خانه</a></p>
                            <p><a class="text-success" style="text-decoration: none;"  href="../../user"><i class="fa fa-user"></i> ورود به عنوان کاربر</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>